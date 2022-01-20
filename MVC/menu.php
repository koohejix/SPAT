<?php
$view = new stdClass();
$view->pageTitle = "Menu";

require_once('Models/MenuFunctions.php');

$menuDataSet = new MenuFunctions();
$view->saladsDataSet = $menuDataSet->fetchSalads();
$view->startersDataSet = $menuDataSet->fetchStarters();
$view->sushiDataSet = $menuDataSet->fetchSushi();

require_once('Views/menu.phtml');

?>