<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use MyFatoorah\Library\PaymentMyfatoorahApiV2;
// use Illuminate\Support\Facades\Notification;
// use App\Notifications\GiftCreatedNotification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\GiftCreatedMail;
use App\Models\periodicDonation;

class MyFatoorahController extends Controller
{

    public $mfObj;

    //-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * create MyFatoorah object
     */
    public function __construct()
    {
        $this->mfObj = new PaymentMyfatoorahApiV2(config('myfatoorah.api_key'), config('myfatoorah.country_iso'), config('myfatoorah.test_mode'));
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Create MyFatoorah invoice
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = $request->input('model');
        $model_id = $request->input('model_id');
        $marketer_id = $request->input('userId');
       // Retrieve the marketer_id, model, and notes from the query parameters
        $payment_data = [];
        $payment_data['marketer_id'] = $request->marketer_id ?? 0;
        $payment_data['amount'] = $request->amount;
        $payment_data['model'] = $model;
        $payment_data['notes'] = $request->notes;
        $payment_data['model_id'] = $model_id; // Use the updated model_id
        $payment_data['marketer_id'] = $marketer_id; // Use the updated u value
        // $request->query('userId');

        // dd($model, $model_id,$payment_data);

        $payment_data['payment_method'] = 0;
        if ($request->donor_type == 'logged') {
            $payment_data['name']           = Auth::user()->name;
            $payment_data['email']          = Auth::user()->email;
            $payment_data['phone_number']   = Auth::user()->phone_number;
            $payment_data['user_id']        = Auth::id();
        } else if ($request->donor_type == 'login') {
            $request->validate([
                'email' => 'required|email|unique:users',
                'password' => 'required'
            ]);

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $payment_data['name']           = Auth::user()->name;
                $payment_data['email']          = Auth::user()->email;
                $payment_data['phone_number']   = Auth::user()->phone_number;
                $payment_data['user_id']        = Auth::id();
            } else {
                return redirect()->back()->with('error', 'الايميل او كلمة السر خطأ');
            }
        } else if ($request->donor_type == 'signup') {
            $request->validate([
                'email'         => 'required|email|unique:users',
                'name'          => 'required|string',
                'password'      => 'required|confirmed',
                'phone_number'  => 'required'
            ]);
            $user = User::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'phone_number'  => $request->phone_number,
                'password'      => Hash::make($request->password)
            ]);
            if (Auth::attempt([$user->email, $user->password])) {
                $payment_data['name']           = $user->name;
                $payment_data['email']          = $user->email;
                $payment_data['phone_number']   = $user->phone_numebr;
                $payment_data['user_id']        = $user->id;
            }
        } else {
            $request->validate([
                'phone_number' => 'nullable|max:11'
            ]);
            switch ($request->plan) {
                case 1:
                    $payment_data['payment_method'] = 'knet';
                    break;
                case 2:
                    $payment_data['payment_method'] = 'visa';
                    break;
                case 11:
                    $payment_data['payment_method'] = 'apple-pay';
                    break;
                case 32:
                    $payment_data['payment_method'] = 'google-pay';
                    break;
                default:
                    // If the plan is not one of the specified values, set the payment method to a default value
                    $payment_data['payment_method'] = 'visa';
                    break;
            }
            $payment_data['name']           = 'فاعل خير';
            $payment_data['email']          = 'example@gmail.com';
            $payment_data['phone_number']   = $request->phone_number;
            $payment_data['user_id']        = 0;
        }


        $donation = Donation::create([
            'donor_id'  => $payment_data['user_id'],
            'amount'    => $payment_data['amount'],
            'payment_method' =>  $payment_data['payment_method'],
            'status' => 'INITIATED',
            'marketer_id' => $payment_data['marketer_id'],
            'model' => $payment_data['model'],
            'model_id' => $payment_data['model_id'],
        ]);

        // dd($donation);

        try {
            $paymentMethodId = $request->plan; // 0 for MyFatoorah invoice or 1 for Knet in test mode

            $curlData = $this->getPayLoadData($payment_data, $donation->id);


            $data     = $this->mfObj->getInvoiceURL($curlData, $paymentMethodId);

            //dd($curlData,$data);
            $response = ['IsSuccess' => 'true', 'Message' => 'Invoice created successfully.', 'Data' => $data];
        } catch (\Exception $e) {
            $response = ['IsSuccess' => 'false', 'Message' => $e->getMessage()];
        }
        //return $response;
        return redirect()->to($response['Data']['invoiceURL']);
    }

    private function getPayLoadData($data, $orderId = null)
    {
        $callbackURL = route('myfatoorah.callback');

        return [
            'CustomerName'       => $data['name'],
            'InvoiceValue'       => $data['amount'],
            'DisplayCurrencyIso' => 'KWD',
            'CustomerEmail'      => Auth::user()->email ?? 'example@gmail.com',
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
    public function callback()
    {

        try {
            $paymentId = request('paymentId');
            $data      = $this->mfObj->getPaymentStatus($paymentId, 'PaymentId');
            $donation = Donation::find($data->CustomerReference);
            if ($data->InvoiceStatus == 'Paid') {
                $donation->notes = 'Invoice is paid.';
                $donation->payment_status = 'CAPTURED';
                $donation->save();
                if (session('model') == 'gift') {
                    // $this.send_whatsapp_message();

                    $emailData = [
                        'sender' => 'Amira', //$sender,
                        'consignee' => 'leen', //$consignee,
                        'email' => 'amira95ibrahim@gmail.com', //$email,
                        'phone' => '01015414979', // $phone,
                    ];

                    $email = 'amira95ibrahim@gmail.com';

                    try {
                        // Send the email using Mail::send()
                        // Mail::send(new GiftCreatedMail($emailData), function ($message) use ($email) {
                        //     $message->to($email)->subject('Gift Created');
                        // });
                        Mail::to($email)->send(new GiftCreatedMail($emailData));
                        // Email sent successfully
                        Session::put('model', '');
                        return redirect()->back()->with('success', 'تم ارسال هديتك بنجاح. جزاك الله خيرا');
                    } catch (\Exception $e) {
                        // Email sending failed
                        return redirect()->back()->with('error', 'حدث خطأ اثناء ارسالايميل  بهديتك');
                    }
                }
                return redirect()->back()->with('success', 'تم التبرع بنجاح. جزاك الله خيرا');
            } else if ($data->InvoiceStatus == 'Failed') {
                $donation->notes = 'Invoice is not paid due to ' . $data->InvoiceError;
                $donation->payment_status = 'FAILED';
                $donation->save();
                return redirect()->back()->with('error', 'حدث خطأ فى الدفع, يرجى المحاولة مرة اخرى');
            } else {
                $donation->notes = 'Invoice is expired.';
                $donation->payment_status = 'DECLINED';
                $donation->save();
                return redirect()->back()->with('error', 'حدث خطأ فى الدفع, يرجى المحاولة مرة اخرى');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ فى الدفع, يرجى المحاولة مرة اخرى');
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
        // dd($request->duration);
        //$request->validate([
        // 'phone_number' => 'nullable|max:11'
        //]);
        $marketer_id = $request->marketer_id ??0;
        if (!empty($request->input('custom_amount'))) {
            $amount = $request->input('custom_amount');
        } else {
            $amount = $request->input('amount');
        }
        $donation = periodicDonation::create([
            'donor_id'  => Auth::id(),
            'amount'    => $amount,
            'payment_method' => 'visa',
            'status' => 'INITIATED',
            'model'=>'',
            'model_id'=>0,
            'Recurring_id'=>0,
            'marketer_id' => $marketer_id,
            'frequency'=>$request->frequency,
            'duration'=>$request->duration,
            // Add more fields specific to periodic donations, like frequency, next_payment_date, etc.
        ]);

        try {
            // Generate the list of payment dates based on the selected frequency and duration
            $paymentDates = $this->generatePaymentDates($request->frequency, $request->duration);
            // dd($paymentDates);
            // Create invoices for each payment date
            foreach ($paymentDates as $paymentDate) {
                $paymentMethodId = 2; // 0 for MyFatoorah invoice or 1 for Knet in test mode

                $curlData = $this->getPayLoadData_periodic($request->all(), $donation->id, $paymentDate);
                $data     = $this->mfObj->getInvoiceURL($curlData, $paymentMethodId);

                // dd($data);
                // Store the invoice details in the database
                $invoice = periodicDonation::create([
                    'donor_id'  => Auth::id(),
                    'donation_id' => $donation->id,
                    'amount'    => $amount,
                    'invoice_url' => $data['invoiceURL'],
                    'payment_date' => $paymentDate,
                    'marketer_id' => $marketer_id,
                    'frequency'=>$request->frequency,
                    'duration'=>$request->duration,
                    'Recurring_id'=>$data['RecurringId']??0,
                    'status' =>'CAPTURED'
                ]);
            }

            $response = ['IsSuccess' => 'true', 'Message' => 'Invoices created successfully.', 'Data' => $data];
        } catch (\Exception $e) {
            $response = ['IsSuccess' => 'false', 'Message' => $e->getMessage()];
            // Handle the exception, maybe log it or show an error message to the user
        }
        //return $response;
        return redirect()->to($response['Data']['invoiceURL']);
    }

    //-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     *
     * @param int|string $orderId
     * @return array
     */
    private function getPayLoadData_periodic($data, $orderId = null, $paymentDate = null)
    {
        $callbackURL = route('myfatoorah.callback_periodic');

        return [
            "PaymentMethodId" => 2,
            'CustomerName'       => 'test',//Auth::user()->name,
            'InvoiceValue'       => $data['amount'],
            'DisplayCurrencyIso' => 'KWD',
            'CustomerEmail'      => 'test@dd.com',// Auth::user()->email,
            'CallBackUrl'        => $callbackURL,
            'ErrorUrl'           => $callbackURL,
            'MobileCountryCode'  => '+965',
            // 'CustomerMobile'     => $data['phone_number'],
            'Language'           => 'en',
            'CustomerReference'  => $orderId,
            'SourceInfo'         => 'Hofaz ' . app()::VERSION . ' - MyFatoorah Package ' . MYFATOORAH_LARAVEL_PACKAGE_VERSION,
            // Add the payment date to the payload data
            'PaymentDate'        => $paymentDate,
            "RecurringModel" => [
                'Iteration'          => $data['frequency'],
                'RecurringType'      => $data['duration'], //Daily - Monthly -yearly -custom
                "IntervalDays"       => 1,
                // "RetryCount"  =>  2,
            ]
        ];
    }


    //-----------------------------------------------------------------------------------------------------------------------------------------
    public function send_whatsapp_message()
    {
    }
    /**
     * Get MyFatoorah payment information
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback_periodic()
    {
        try {
            $paymentId =2;// request('paymentId');
            $data      = $this->mfObj->getPaymentStatus($paymentId, 'PaymentId');
            $invoice = Donation::where('payment_id', $paymentId)->first();

            if ($data->InvoiceStatus == 'Paid') {

                $invoice->status = 'PAID';
                $invoice->payment_id = $paymentId;
                $invoice->save();

                // Update the status of the corresponding donation
                $donation = periodicDonation::find($invoice->donation_id);
                $donation->status = 'CAPTURED';
                $donation->save();
                return redirect()->back()->with('success', 'تم التبرع بنجاح. جزاك الله خيرا');
                // return redirect()->route('home')->with('success', 'Periodic donation completed successfully.');
            } else if ($data->InvoiceStatus == 'Failed') {
                $invoice->status = 'FAILED';
                $invoice->payment_id = $paymentId;
                $invoice->save();

                // Update the status of the corresponding donation
                $donation = periodicDonation::find($invoice->donation_id);
                $donation->status = 'FAILED';
                $donation->save();
                return redirect()->back()->with('error', 'حدث خطأ فى الدفع, يرجى المحاولة مرة اخرى');
                // return redirect()->route('home')->with('error', 'Payment failed for the periodic donation.');
            } else {
                $invoice->status = 'EXPIRED';
                $invoice->payment_id = $paymentId;
                $invoice->save();

                // Update the status of the corresponding donation
                $donation = periodicDonation::find($invoice->donation_id);
                $donation->status = 'DECLINED';
                $donation->save();
                return redirect()->back()->with('error', 'حدث خطأ فى الدفع, يرجى المحاولة مرة اخرى');
                // return redirect()->route('home')->with('error', 'Payment expired for the periodic donation.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ فى الدفع, يرجى المحاولة مرة اخرى');
            // return redirect()->route('home')->with('error', 'An error occurred during payment for the periodic donation.');
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
                case 'Daily':
                    $paymentDates[] = $startDate->addDay($i)->format('Y-m-d');
                    break;
                case 'Weekly':
                    $paymentDates[] = $startDate->addWeek($i)->format('Y-m-d');
                    break;
                case 'Monthly':
                    $paymentDates[] = $startDate->addMonth($i)->format('Y-m-d');
                    break;
                    // Add more cases for other frequencies like bi-weekly, bi-monthly, etc.
            }
        }

        return $paymentDates;
    }
}
