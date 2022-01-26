<?php

require_once ('Database.php');
require_once ('MenuFunctions.php');

class Cart
{

    public function encodeCart($cartData) {

        $_COOKIE['cart'] = json_encode($cartData);

    }

    public function decodeCart() {

        $cartData = json_decode($_COOKIE['cart'], true);

        return $cartData;
    }

    public function addProduct($productID) {

        $cartData = json_decode($_COOKIE['cart'], true);

        if (array_key_exists($productID, $cartData)) {

            $cartData["$productID"] = $cartData["$productID"] + 1;
            setcookie('cart', json_encode($cartData));

        }
        else {

            $cartData += array($productID => 1);
            setcookie('cart', json_encode($cartData));

        }
    }

    public function removeProduct($productID) {

        $cartData = json_decode($_COOKIE['cart'], true);

        if (array_key_exists($productID, $cartData)) {

            if ($cartData["$productID"] == 1)
            {
                unset($cartData["$productID"]);
            }

            else {

                $cartData["$productID"] = $cartData["productID"] - 1;

            }

            $_COOKIE['cart'] = json_encode($cartData);
        }
    }
    public function changeProductQuantity($productID, $quantity) {
        $cartData = json_decode($_COOKIE['cart'], true);

        if (array_key_exists($productID, $cartData)) {

            if ($quantity <= 0)
            {
                unset($cartData["$productID"]);
            }
            else {

                $cartData["$productID"] = $quantity;

            }
            setcookie('cart', json_encode($cartData));
        }
    }
    public function retrieveCartItems() {

        $cartData = json_decode($_COOKIE['cart']);
        $menuDataSet = new MenuFunctions();
        $dataSet = [];

        foreach($cartData as $p => $q) {
                $dataSet[] = $menuDataSet->fetchItem($p);
            }

            return $dataSet;
        }
}