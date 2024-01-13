<?php

namespace App\Http\Controllers\PaymentApi;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaystackController extends Controller
{
    public function callback(Request $request)
    {
        //dd($request->all();
        $reference = $request->reference;

        $secret_key = env('PAYSTACK_SECRET_KEY');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/:reference".$reference,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $secret_key",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($response);
        // dd($response);

        if($response->data->status =='success'){

            $obj = new Payment;
            $obj->payment_id = $reference;
            $obj->amount = $response->data->amount / 100;
            $obj->payment_method = $response->data->channel;
            $obj->payment_status = 'success';
            $obj->save();

            return redirect()->route('success');
        }else{
            return redirect()->route('cancel');
        }
    }

    public function success()
    {
        return 'Payment successful';
    }

    public function cancel()
    {
        return 'Payment cancelled';
    }
}
