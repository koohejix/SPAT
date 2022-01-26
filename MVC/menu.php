<?php
require_once('cartcheck.php');
require_once('Models/MenuFunctions.php');
require_once('Models/Cart.php');
$view = new stdClass();
$view->pageTitle = "Menu";

$menuDataSet = new MenuFunctions();
$view->saladsDataSet = $menuDataSet->fetchSalads();
$view->startersDataSet = $menuDataSet->fetchStarters();
$view->sushiDataSet = $menuDataSet->fetchSushi();

$cartDataSet = new Cart();

if(isset($_GET['addCart'])) {

    $product = $_GET['addCart'];
    $cartDataSet->addProduct($product);

}

require_once('Views/menu.phtml');

?>