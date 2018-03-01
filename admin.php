<?php
session_start();
//echo $_SESSION['login_user'] . "bring session here!";
$view = new stdClass();
$view->pageTitle = 'Admin';
require_once('Views/admin.phtml');
//include 'Models/UserData.php';
//include 'Models/UserDataSet.php';
//
//$userDataSet = new UserDataSet();


if (isset($_GET['id'])) {
    $advertId = $_GET["id"];
    $fk_userId = $_SESSION['login_user'];

    var_dump($advertId);

    $wishlistDataSet->deleteFromWishList($advertId,$fk_userId);
}

