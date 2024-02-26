<?php

namespace App\Http\Controllers;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

use Illuminate\Http\Request;

class PaypalController extends Controller
{
    public function paypal(Request $request){
        // dd($request->price);
        $price = $request->price;
        $provider = new PayPalClient;

        $provider->setApiCredentials(config('paypal'));

        $paypal_token = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment'),
                "cancel_url" => route('cancel.payment')
            ],          
             "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $price,
                    ]
                ]
             ]
        ]);

        // dd($response);

        if(isset($response['id']) && $response['id'] != null){
            foreach($response['links'] as $link){
                if($link['rel'] === 'approve'){
                    return redirect()->away($link['href']);
                }
            }
        }else{
            return redirect()->route('cancel.payment');
        }

    }

    public function success(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypal_token = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        // dd($response);
        if(isset($response['status']) && $response['status'] == 'COMPLETED'){
            return "Payment is Successful";
        }else{
            return redirect()->route('cancel.payment');
        }
    }

    public function cancel(){
        return "Payment is cancelled";
    }
}
