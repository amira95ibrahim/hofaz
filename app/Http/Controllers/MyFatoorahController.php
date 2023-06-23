<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MyFatoorah\Library\PaymentMyfatoorahApiV2;

class MyFatoorahController extends Controller {

    public $mfObj;

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * create MyFatoorah object
     */
    public function __construct() {
        $this->mfObj = new PaymentMyfatoorahApiV2(config('myfatoorah.api_key'), config('myfatoorah.country_iso'), config('myfatoorah.test_mode'));
    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Create MyFatoorah invoice
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $request->validate([
            'phone_number' => 'nullable|max:11'
        ]);

        $donation = Donation::create([
            'donor_id'  => Auth::id(),
            'amount'    => $request->amount,
            'payment_method' => 'visa',
            'status' =>'INITIATED'
        ]);

        try {
            $paymentMethodId = 0; // 0 for MyFatoorah invoice or 1 for Knet in test mode

            $curlData = $this->getPayLoadData($request->all(), $donation->id);
            $data     = $this->mfObj->getInvoiceURL($curlData, $paymentMethodId);

            $response = ['IsSuccess' => 'true', 'Message' => 'Invoice created successfully.', 'Data' => $data];
        } catch (\Exception $e) {
            $response = ['IsSuccess' => 'false', 'Message' => $e->getMessage()];
        }
        return redirect()->to($response['Data']['invoiceURL']);
    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     *
     * @param int|string $orderId
     * @return array
     */
    private function getPayLoadData($data, $orderId = null) {
        $callbackURL = route('myfatoorah.callback');

        return [
            'CustomerName'       => Auth::user()->name,
            'InvoiceValue'       => $data['amount'],
            'DisplayCurrencyIso' => 'KWD',
            'CustomerEmail'      => Auth::user()->email,
            'CallBackUrl'        => $callbackURL,
            'ErrorUrl'           => $callbackURL,
            'MobileCountryCode'  => '+965',
            'CustomerMobile'     => $data['phone_number'],
            'Language'           => 'en',
            'CustomerReference'  => $orderId,
            'SourceInfo'         => 'Hofaz ' . app()::VERSION . ' - MyFatoorah Package ' . MYFATOORAH_LARAVEL_PACKAGE_VERSION
        ];
    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Get MyFatoorah payment information
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback() {

        try {
            $paymentId = request('paymentId');
            $data      = $this->mfObj->getPaymentStatus($paymentId, 'PaymentId');
            $donation = Donation::find($data->CustomerReference);
            if ($data->InvoiceStatus == 'Paid') {
                $donation->notes = 'Invoice is paid.';
                $donation->payment_status = 'CAPTURED';
                $donation->save();
                return redirect()->route('home')->with('success', 'تم التبرع بنجاح. جزاك الله خيرا');
            } else if ($data->InvoiceStatus == 'Failed') {
                $donation->notes = 'Invoice is not paid due to ' . $data->InvoiceError;
                $donation->payment_status = 'FAILED';
                $donation->save();
                return redirect()->route('home')->with('error', 'حدث خطأ فى الدفع, يرجى المحاولة مرة اخرى');
            } else {
                $donation->notes = 'Invoice is expired.';
                $donation->payment_status = 'DECLINED';
                $donation->save();
                return redirect()->route('home')->with('error', 'حدث خطأ فى الدفع, يرجى المحاولة مرة اخرى');
            }

        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'حدث خطأ فى الدفع, يرجى المحاولة مرة اخرى');
        }
    }

//-----------------------------------------------------------------------------------------------------------------------------------------
}
