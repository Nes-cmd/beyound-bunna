<?php

namespace App\Helper;

use Cartalyst\Stripe\Stripe;
use Exception;

class StripeApi
{
    // if($request->paymentMethod == 'cards'){
    //     $request->validate([
    //         'name_on_card' => 'required',
    //         'card_number' => 'required|numeric',
    //         'exp_year' => 'required|digits:4',
    //         'exp_month' => 'required|numeric|max:12',
    //     ]);
    //     $output = $this->stripe($request);
    //     if($output['status'] == 'succeeded'){
    //         $new_data = $this->prepareData($request, $output);
    //         $order_id = uniqid();
    //         $new_data['id'] = $order_id;

    //         \DB::table('sc_shop_order')->insert([$new_data]);
    //         $this->makeOrder($order_id);
    //         $title = "Sccessfully ordered ";
    //         return redirect()->route('order.result', $title)->with('success', 'Successful order');
    //         // return view('templates.s-cart-light.screen.shop_order_success',['title' => $title]);
    //     }
    //     else{
    //         dd('Stripe error', $output);
    //     }
    // }
    public function paymentProcessor($cardData,$adress)
    {
       
        $output = ['status' => 'failed', 'transaction_id' => null, 'cause' => 'unknown', 'customer_id' => null];
        $stripe = Stripe::make(env('SECR_LIVE_KEY'));
        
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
                    // "first_name"=> $request->first_name,
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
            // dd($e);
        }
    }
}
