<?php
$view = new stdClass();
$view->pageTitle = "Cart";

require_once('Views/cart.phtml');

//redirect to checkout page
header('Location:checkout.php');
?>
