<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\PaypalApi;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Transaction;
use App\Helper\DhlService;

class OrderController extends Controller
{
    public function receivePaypalPaymens()
    {
        $paypalApi = new PaypalApi();
        $response = $paypalApi->receivePaymens();

        if($response['paymentCompleted']){
            $orderId = $this->placeOrder($response['preparedData']);
            return redirect()->route('shop.confirmation', $orderId);
        }
        return redirect()->route('shop.checkout')->with('error', 'payment couldn\'t completed due to some problem');
    }
    public function cancelPaypalPayment()
    {
        return redirect()->route('shop.checkout');
    }
    public function placeOrder($data)
    {
        $shippTo = session()->get('shippment');
        $carts = session()->get('cart');
        $payment = Transaction::create([
            'user_id' => auth()->user()->id,
            'payment_method' => $shippTo['paymentMethod'],
            'price' => $data['price'],
            'payer_id' => $data['payer_id'],
            'payer_email' => $data['payer_email'],
            'total' => $data['total'],
            'status' => $data['status'],
            'transaction_id' => $data['transaction_id'],
            'other_info' => $data['other_info'],
            'payment_fee' => $data['payment_fee'],
            'currency' => $data['currency'],
        ]);
        //     Order the shippment if dhl is selected
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // $dhlService = new DhlService;
        // $from = \DB::table('store_addresses')->where('id', 1)->first();
        // $contact = \DB::table('contact_infos')->where('id', 1)->first();
        // $shipped = $dhlService->createShippment($from, $shippTo, $contact);
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $orderId = strtoupper(uniqid());
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'orderId' => $orderId,
            'payment_id' => $payment->id,
            'shppment_adress_id' => $shippTo['shippmentMethod']['shippment_adress_id'],
        ]);
        foreach ($carts as $cart) {
            OrderDetail::create([
                'order_id'  => $order->id,
                'product_id' => $cart['id'],
                'quantity' => $cart['quantity'],
                'specifications' => $cart['specifications'],
                
            ]);
        }
        session()->forget('cart');
        session()->forget('shippment');
        session()->save();
        return $orderId;
    }
    public function orderConfirm($tracking)
    {
        return view('customer-shop.confirmation')->with(['tracking' => $tracking]);
    }
}
