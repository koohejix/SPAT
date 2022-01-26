<?php
require_once ("Models/AddressFunctions.php");

$view = new stdClass();
$view->pageTitle = "Addresses";

$addressDataSet = new AddressFunctions();

if(!isset($_COOKIE['login'])) {
    header('Location: login.php');
}

$userid = $_COOKIE['login'];

$view->addresses = $addressDataSet->fetchAddresses($userid);

if(isset($_POST['add'])) {
    $customerid = $_COOKIE["login"];

    $type = $_POST['addresstype'];
    $name = htmlspecialchars($_POST['name']);
    $area = htmlspecialchars($_POST['area']);
    $block = htmlspecialchars($_POST['block']);
    $street = htmlspecialchars($_POST['street']);
    $phone = htmlspecialchars($_POST['phone']);
    $additional = htmlspecialchars($_POST['additional']);

    if($type == "apartment") {
        $building = htmlspecialchars($_POST['building']);
        $floor = htmlspecialchars($_POST['floor']);
        $apartment = htmlspecialchars($_POST['apartment']);
    }
    else {
        $building = htmlspecialchars($_POST['house']);;
        $floor = NULL;
        $apartment = NULL;
    }

    $add = $addressDataSet->addAddress($customerid, $name, $type, $area, $block, $street, $building, $floor, $apartment, $phone, $additional);
    echo $add;
}

require_once('Views/address.phtml');

?>
