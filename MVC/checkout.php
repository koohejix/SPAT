<?php
require_once('cartcheck.php');
require_once('Models/Cart.php');
require_once('Models/AddressFunctions.php');
require_once('Models/OrdersFunctions.php');
require_once('Models/OrdersItemsFunctions.php');
$view = new stdClass();
$view->pageTitle = "Checkout";


if(!isset($_COOKIE['login'])) {
    header('Location: login.php');
}

$cartDataSet = new Cart();
$cartData = $cartDataSet->decodeCart();

$view->cart = $cartDataSet->retrieveCartItems();

$userid = $_COOKIE['login'];

$addressDataSet = new AddressFunctions();
$view->addresses = $addressDataSet->fetchAddresses($userid);
if(isset($_POST['address'])) {

    $addressid = $_POST['address'];

    $orders = new OrdersFunctions();

    $totaladd = 0;

    foreach($view->cart as $cartSet) {
        $pid = $cartSet->getID();
        $totaladd += $cartSet->getPrice() * $cartData[$pid];
    }
    $orders->addNewOrder($userid, $addressid, $totaladd, $cartData);

    setcookie('cart', '', time() - 3600);
    header('Location: orders.php');
}

require_once('Views/checkout.phtml');

?>