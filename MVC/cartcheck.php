<?php

if(!isset($_COOKIE['cart'])) {
    $cartdata = array();
    setcookie('cart', json_encode($cartdata));
}