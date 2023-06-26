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
            'donor_id'  => Auth::id()??0,
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

    private function getPayLoadData($data, $orderId = null) {
        $callbackURL = route('myfatoorah.callback');

        return [
            'CustomerName'       => Auth::user()->name??'',
            'InvoiceValue'       => $data['amount'],
            'DisplayCurrencyIso' => 'KWD',
            'CustomerEmail'      => Auth::user()->email??'',
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
//------------------------------------------------------------------------------------------------------
  /**
     * Create periodic Donation
     *
     * @return \Illuminate\Http\Response
     */
public function createPeriodicDonation(Request $request)
{
    // dd($request->input('frequency'));
    $request->validate([
        'phone_number' => 'nullable|max:11'
    ]);
    $request = new \Illuminate\Http\Request();
    $request->merge([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'amount' => 100,
        'frequency' => 'daily',
        'duration' => 12,
        'phone_number' => '1234567890',
    ]);

    $donation = Donation::create([
        'donor_id'  => 0??Auth::id(),
        'amount'    => $request->amount??1,
        'payment_method' => 'visa',
        'status' =>'INITIATED',
        // Add more fields specific to periodic donations, like frequency, next_payment_date, etc.
    ]);

    try {
        // Generate the list of payment dates based on the selected frequency and duration
        $paymentDates = $this->generatePaymentDates($request->frequency, $request->duration);
        // $data=null;
        // Create invoices for each payment date
        foreach ($paymentDates as $paymentDate) {
            $paymentMethodId = 0; // 0 for MyFatoorah invoice or 1 for Knet in test mode

            $curlData = $this->getPayLoadData_periodic($request->all(), $donation->id, $paymentDate);
            $data     = $this->mfObj->getInvoiceURL($curlData, $paymentMethodId);
   echo $data; echo '<br>';
            // Store the invoice details in the database
            $invoice = Donation::create([
                'donation_id' => $donation->id,
                'invoice_url' => $data['invoiceURL'],
                'payment_date' => $paymentDate,
                // Add more fields specific to periodic invoices, like status, payment_id, etc.
            ]);
        }

        $response = ['IsSuccess' => 'true', 'Message' => 'Invoices created successfully.', 'Data' => $data];
    } catch (\Exception $e) {
        $response = ['IsSuccess' => 'false', 'Message' => $e->getMessage()];
        // Handle the exception, maybe log it or show an error message to the user
    }
return 'hi';
    // return redirect()->to($response['Data']['invoiceURL']);
}

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     *
     * @param int|string $orderId
     * @return array
     */
    private function getPayLoadData_periodic($data, $orderId = null, $paymentDate=null)
    {
        $callbackURL = route('myfatoorah.callback_periodic');

        return [
            'CustomerName'       => $data['name'],//Auth::user()->name,
            'InvoiceValue'       => $data['amount'],
            'DisplayCurrencyIso' => 'KWD',
            'CustomerEmail'      =>  $data['email'],//Auth::user()->email,
            'CallBackUrl'        => $callbackURL,
            'ErrorUrl'           => $callbackURL,
            'MobileCountryCode'  => '+965',
            'CustomerMobile'     => $data['phone_number'],
            'Language'           => 'en',
            'CustomerReference'  => $orderId,
            'SourceInfo'         => 'Hofaz ' . app()::VERSION . ' - MyFatoorah Package ' . MYFATOORAH_LARAVEL_PACKAGE_VERSION,
            // Add the payment date to the payload data
            'PaymentDate'        => $paymentDate,
        ];
    }


//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Get MyFatoorah payment information
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback_periodic()
    {
        try {
            $paymentId = request('paymentId');
            $data      = $this->mfObj->getPaymentStatus($paymentId, 'PaymentId');
            $invoice = Donation::where('payment_id', $paymentId)->first();

            if ($data->InvoiceStatus == 'Paid') {
                $invoice->status = 'PAID';
                $invoice->payment_id = $paymentId;
                $invoice->save();

                // Update the status of the corresponding donation
                $donation = Donation::find($invoice->donation_id);
                $donation->status = 'CAPTURED';
                $donation->save();

                return redirect()->route('home')->with('success', 'Periodic donation completed successfully.');
            } else if ($data->InvoiceStatus == 'Failed') {
                $invoice->status = 'FAILED';
                $invoice->payment_id = $paymentId;
                $invoice->save();

                // Update the status of the corresponding donation
                $donation = Donation::find($invoice->donation_id);
                $donation->status = 'FAILED';
                $donation->save();

                return redirect()->route('home')->with('error', 'Payment failed for the periodic donation.');
            } else {
                $invoice->status = 'EXPIRED';
                $invoice->payment_id = $paymentId;
                $invoice->save();

                // Update the status of the corresponding donation
                $donation = Donation::find($invoice->donation_id);
                $donation->status = 'DECLINED';
                $donation->save();

                return redirect()->route('home')->with('error', 'Payment expired for the periodic donation.');
            }
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'An error occurred during payment for the periodic donation.');
        }
    }


//-----------------------------------------------------------------------------------------------------------------------------------------
private function generatePaymentDates($frequency, $duration)
{
    $startDate = now();

    $paymentDates = [];

    // Generate the payment dates based on the selected frequency and duration
    for ($i = 0; $i < $duration; $i++) {
        switch ($frequency) {
            case 'daily':
                $paymentDates[] = $startDate->addDay($i)->format('Y-m-d');
                break;
            case 'weekly':
                $paymentDates[] = $startDate->addWeek($i)->format('Y-m-d');
                break;
            case 'monthly':
                $paymentDates[] = $startDate->addMonth($i)->format('Y-m-d');
                break;
            // Add more cases for other frequencies like bi-weekly, bi-monthly, etc.
        }
    }

    return $paymentDates;
}

}
