<?php

function objectToArray ($object) {
    if(!is_object($object) && !is_array($object)){
        return $object;
    }
    return array_map('objectToArray', (array) $object);
}
function cartTotal()
{
    $carts = session()->get('cart');    
    $total = 0.01;
    $total2 = 0.01;
    if($carts){
        foreach ($carts as $cart) {
            $total = $total + $cart['price']*$cart['quantity'];
            $total2 = $total2 + ($cart['price'] - $cart['discount'] - $cart['promo_discount'])*$cart['quantity'];
        }
    }

    return ['total' => $total, 'discounted' => $total2];
}
function cartWeight(){
    $carts = session()->get('cart');
    $weight = 0;
    if($carts){
        foreach ($carts as $cart) {
            $weight = $weight + $cart['size'] * $cart['quantity'];
        }
    }
    return $weight;
}
function makeFullAdress($city, $prov = null, $zip, $ad1 = null, $ad2 = null, $ad3 = null){
    $adress = $prov;
    $adress .= $prov?',':'';
    $adress .= $prov;
    $adress .= $city.'(';
    $adress .= $zip.') ';
    $adress .= $ad1;
    $adress .= $ad2?',':'';
    $adress .= $ad2;
    $adress .= $ad3?',':'';
    $adress .= $ad3;
    return $adress;
}