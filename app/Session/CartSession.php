<?php

namespace App\Session;

class CartSession
{
    public function saveCart($cart)
    {
        session(
            ['cart_data.cart'       => $cart]
        );
    }

    public function saveQuantity($quantity)
    {
        session(
            ['cart_data.quantity'   => $quantity ]
        );
    }
}
