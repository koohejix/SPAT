<?php
$view = new stdClass();
$view->pageTitle = "Sushilicious";

if(!isset($_COOKIE['cart'])) {

}

require_once('Views/home.phtml');

?>
