<?php
require_once('cartcheck.php');
require_once('Models/OrdersFunctions.php');
require_once('Models/OrdersItemsFunctions.php');
require_once('Models/AddressFunctions.php');

$view = new stdClass();
$view->pageTitle = "Admin Orders";

if(!isset($_COOKIE['admin'])) {
    header('Location: login.php');
}
$ordersDataSet = new OrdersFunctions();

if(isset($_POST["action"]))
{
    $id = $_POST["order_id"];
    $status = $_POST["status"];
    $ordersDataSet->updateOrderStatus($id, $status);
}

$view->pendingDataSet = $ordersDataSet->fetchAllPending();
$view->acceptedDataSet = $ordersDataSet->fetchAllAccepted();
$view->successfulDataSet = $ordersDataSet->fetchAllSuccessful();

$itemsDataSet = new OrdersItemsFunctions();

$addressDataSet = new AddressFunctions();
require_once('Views/admin-orders.phtml');

