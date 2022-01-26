<?php
require_once('cartcheck.php');
require_once('Models/MenuFunctions.php');
require_once('Models/AdminFunctions.php');
$view = new stdClass();
$view->pageTitle = "Admin Menu";

if(!isset($_COOKIE['admin'])) {
    header('Location: login.php');
}

$menuDataSet = new MenuFunctions();
$view->saladsDataSet = $menuDataSet->fetchSalads();
$view->startersDataSet = $menuDataSet->fetchStarters();
$view->sushiDataSet = $menuDataSet->fetchSushi();

$adminTool = new AdminFunctions();

if(isset($_POST['add'])) {

    $target_dir = "./images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 0;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    //check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    //check file size
    if ($_FILES["image"]["size"] > 500000) {
        $uploadOk = 0;
    }
    //check format
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        array_push($errors, "Only jpg, jpeg, and png file formats allowed.");
        $uploadOk = 0;
    }

    if($uploadOk != 0) {
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];

        $picture = basename($_FILES["image"]["name"]);
        if($adminTool->addMenuItem($name, $category, $price, $picture))
        {
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }
    }
}

if(isset($_POST['removeitem'])) {

    $pid = $_POST['removeitem'];
    $adminTool->removeMenuItem($pid);

}

require_once('Views/admin-menu.phtml');
