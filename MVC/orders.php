<?php
require_once('cartcheck.php');
require_once('Models/OrdersFunctions.php');
require_once('Models/OrdersItemsFunctions.php');
$view = new stdClass();
$view->pageTitle = "Active Orders";

if(!isset($_COOKIE['login'])) {
    header('Location: login.php');
}

$ordersDataSet = new OrdersFunctions();
$itemsDataSet = new OrdersItemsFunctions();

$userid = $_COOKIE['login'];

$view->activeOrders = $ordersDataSet->fetchActiveOrders($userid);


require_once('Views/orders.phtml');

?>
