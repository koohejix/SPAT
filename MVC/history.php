<?php
require_once('cartcheck.php');
require_once('Models/OrdersFunctions.php');
require_once('Models/OrdersItemsFunctions.php');
$view = new stdClass();
$view->pageTitle = "Order History";

$ordersDataSet = new OrdersFunctions();
$itemsDataSet = new OrdersItemsFunctions();

$userid = $_COOKIE['login'];

$view->pastOrders = $ordersDataSet->fetchPastOrders($userid);

if(!isset($_COOKIE['login'])) {
    header('Location: login.php');
}

require_once('Views/history.phtml');

?>
