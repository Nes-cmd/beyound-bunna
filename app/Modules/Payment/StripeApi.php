<?php

namespace App\Modules\Payment;

use Cartalyst\Stripe\Stripe;
use Exception;

class StripeApi
{
    protected $key;
    public function __construct()
    {
        $this->key = env('PAYPAL_MODE') == 'live'?env('SECR_LIVE_KEY'):env('SECR_TEST_KEY');
    }
    public function paymentProcessor($cardData,$adress)
    {
        $output = ['status' => 'failed', 'transaction_id' => null, 'cause' => 'unknown', 'customer_id' => null];
        $stripe = Stripe::make($this->key);
        
        try {
            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $cardData['cardNumber'],
                    'exp_year' => $cardData['expYear'],
                    'exp_month' => $cardData['expMonth'],
                    'cvc' => $cardData['cvv'],
                ],
            ]);
            if (!isset($token['id'])) {
                // $output['cause'] = 'Stripe token is not generated';
                return ['status' => 'error', 'message' => 'Stripe token is not generated'];
            }

            $customer = $stripe->customers()->create([
                'name' => $adress['fullname'],
                'email' => $adress['email'],
                'phone' => $adress['phone'],
                'address' => [
                    // "first_name" => $request->first_name,
                    // "last_name" => $request->last_name,
                    // "address1" => $request->address1,
                    // "address2" => $request->address1,
                    // "address3" => $request->address1,
                    // "country" => $request->country,
                    // "email" => $request->email,
                ],
                'shipping' => [
                    // "first_name"=> $request->first_name,
                    // "last_name" => $request->last_name,
                    // "address1" => $request->address1,
                    // "address2" => $request->address1,
                    // "address3" => $request->address1,
                    // "country" => $request->country,
                    // "email" => $request->email,
                ],
                'source' => $token['id'],
            ]);

            $charge = $stripe->charges()->create([
                'customer' => $customer['id'],
                'currency' => 'USD',
                'amount' => cartTotal()['discounted'],
                'description' => 'Product purchase on shopkager',
            ]);
            // dd($stripe->charges()->find($customer['id']));
            $output['customer_id'] = $customer['id'];
            $output['transaction'] = $token['id'];
            $output['status'] = $charge['status'];
            $output['price'] = $charge['amount'];
            $output['currency'] = $charge['currency'];
            $output['other_info'] = ['description' => $charge['description']];
            return $output;
        } catch (Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function prepareResponse($response)
    {
        $data = [];
        $data['price'] = $response['price'];
        $data['status'] = $response['status'];
        $data['payer_id'] = $response['customer_id']?$response['customer_id']:'unset';
        $data['payer_email'] = 'not seted';
        $data['total'] = $response['price'];
        $data['transaction_id'] =  $response['transaction'];
        $data['other_info'] =  json_encode($response['other_info']);
        $data['payment_fee'] = 0.0;
        $data['currency'] = $response['currency'];

        return $data;
    }
}
