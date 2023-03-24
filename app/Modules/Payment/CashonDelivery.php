<?php

namespace App\Modules\Payment;

class CashonDelivery{
    public function prepareForPayment()
    {
        return [
            'customer_id' => auth()->id(),
            'transaction' => 'unset',
            'status' => 'uncomplated',
            'price' => cartTotal()['discounted'],
            'currency' => 'ETB',
            'other_info' => [
                'description' => 'This payment will be processed on the time of delivery'
            ],
        ];
    }
    public function prepareResponse($response = null)
    {
        $data = [];
        $data['price'] = cartTotal()['discounted'];
        $data['payer_id'] = 'unset';
        $data['status'] = 'uncompaleted';
        $data['payer_email'] = auth()->user()->email;
        $data['total'] = cartTotal()['discounted'];
        $data['transaction_id'] =  null;
        $data['other_info'] =  json_encode(['description' => 'This payment will be processed on the time of delivery']);
        $data['payment_fee'] = 0.0;
        $data['currency'] = 'ETB';

        return $data;
    }
}