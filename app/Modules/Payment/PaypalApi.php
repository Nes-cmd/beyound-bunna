<?php

namespace App\Modules\Payment;

class PaypalApi {

    protected $url;
    protected $apiKey;
    public function __construct()
    {
        if(env('PAYPAL_MODE') == 'sandbox'){
            $this->url = 'https://api-m.sandbox.paypal.com';
            $this->apiKey = env('PAYPAL_AUTH_SANDBOX');
        }
        elseif(env('PAYPAL_MODE') == 'live'){
            $this->url = 'https://api-m.paypal.com';
            $this->apiKey = env('PAYPAL_AUTH_LIVE');
        }
        else{
            dd('unknown paypal operation mode');
        }

    }
    public function getAccess()
    {
        $url = $this->url."/v1/oauth2/token";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Content-Type: application/x-www-form-urlencoded",
            "Authorization: Basic ".$this->apiKey,
            );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = "grant_type=client_credentials";
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        //for debug only!
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        $resp = json_decode($resp);
        if(isset($resp->access_token) && $resp->access_token != null){
            return $resp->access_token;
        }
        return null;
    }
    public function createOrder($token)
    {
        $url = $this->url."/v2/checkout/orders";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Content-Type: application/json",
            "Authorization: Bearer ".$token,
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $data = [
            "intent"=> "CAPTURE",
            "purchase_units"=> [
            0 => [
                "amount"=> [
                "currency_code"=> "USD",
                "value" =>  (string)cartTotal()['discounted'],
                ],
            ],
            
            ]
        ];

        $data["application_context"] = [
            'return_url' => route('paypal.success'),
            'cancel_url' => route('paypal.cancel'),
        ];
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

        //for debug only!
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        return json_decode($resp);
        // return $resp;

    }
    public function paypalCardPrecessor($token, $id, $cardData, $billingAdress)
    {
        $url = $this->url."/v2/checkout/orders/".$id."/confirm-payment-source";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
        "Content-Type: application/json",
        "Authorization: Bearer ".$token,
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = 
        [
            "payment_source" => [
                "card" => [
                "number" => $cardData['cardNumber'],
                "expiry" => $cardData['expYear'].'-'.$cardData['expMonth'],
                "name" => $cardData['nameonCard'],
                "billing_address" => [
                    "address_line_1" => $billingAdress['addressLine1'],
                    "address_line_2" => $billingAdress['addressLine2'],
                    "admin_area_2" => $billingAdress['city_name'],
                    "admin_area_1" => $billingAdress['province_name'],
                    "postal_code" => $billingAdress['postal_code'],
                    "country_code" => $billingAdress['country_code']
                    ]
                ]
            ]
        ];
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

        $resp = curl_exec($curl);
        curl_close($curl);
        return json_decode($resp);

    }

    public function capturePayment($token, $id)
    {
        $url = $this->url."/v2/checkout/orders/".$id."/capture";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Content-Type: application/json",
            "Authorization: Bearer ".$token,
            "PayPal-Request-Id: 7b92603e-77ed-4896-8e78-5dea2050476a",
            "Content-Length: 0",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        //for debug only!
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        return json_decode($resp);
    }

    public function getOrderDetail($token, $id)
    {
        $url = $this->url."/v2/checkout/orders/".$id;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Content-Type: application/json",
            "Authorization: Bearer ".$token,
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        //for debug only!
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        return json_decode($resp);
    }

    public function receivePaymens()
    {
        $status = ['paymentCompleted' => false, 'preparedData' => null];
        $tokens = session()->get('tokens');
        $response = $this->capturePayment($tokens['access'], $tokens['id']);
        if(isset($response->id) && isset($response->status) && $response->status == 'COMPLETED'){
            $data = $this->prepareResponse($response);
            $status['paymentCompleted'] = true;
            $status['preparedData'] = $data;
        }
         return $status;
    }
    
    public function prepareResponse($response)
    {
        $data = [];
        $data['price'] = $response->purchase_units[0]->payments->captures[0]->amount->value;
        $data['status'] = $response->status;
        $data['payer_id'] = isset($response->payer)?$response->payer->payer_id:'unset';
        $data['payer_email'] = isset($response->payer)?$response->payer->email_address:'unset';
        $data['total'] = $response->purchase_units[0]->payments->captures[0]->amount->value;
        $data['transaction_id'] =  $response->purchase_units[0]->payments->captures[0]->id;
        $data['other_info'] =  json_encode($response->purchase_units[0]);
        $data['payment_fee'] = $response->purchase_units[0]->payments->captures[0]->seller_receivable_breakdown->paypal_fee->value;
        $data['currency'] = $response->purchase_units[0]->payments->captures[0]->amount->currency_code;

        return $data;
    }
}
