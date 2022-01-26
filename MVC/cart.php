<?php
require_once('cartcheck.php');
require_once('Models/Cart.php');
$view = new stdClass();
$view->pageTitle = "Cart";

$cartDataSet = new Cart();
$cartData = $cartDataSet->decodeCart();

if(isset($_POST['update_cart'])){
    
    $id = $_POST['id'];
    $new_quantity = $_POST['quantity'];
    $cartDataSet->changeProductQuantity($id, $new_quantity);
    header('Location: cart.php');

}

$view->cart = $cartDataSet->retrieveCartItems();

require_once('Views/cart.phtml');
?>