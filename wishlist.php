<?php
require_once ('Models/WishlistDataSet.php');
require_once ('Models/WishlistData.php');
session_start();
$view = new stdClass();
$view->pageTitle = 'Wish list';


$wishlistDataSet = new WishlistDataSet();

if (isset($_GET['id']) && isset($_SESSION['login_user']) ) {
    $advertId = $_GET["id"];
    $fk_userId = $_SESSION['login_user'];

    $wishlistDataSet->insertIntoWishList($fk_userId, $advertId);
}

if (isset($_POST['wishlistDelete'])){
    $advertId = $_GET["id"];
    $fk_userId = $_SESSION['login_user'];
    $view->wishlistDataSet = $wishlistDataSet->deleteFromWishList($fk_userId,$advertId);
}

$view->wishlistDataSet = $wishlistDataSet->viewWishList();


require_once('Views/wishlist.phtml');