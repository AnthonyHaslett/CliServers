<?php
require_once ('Models/WishlistDataSet.php');
require_once ('Models/WishlistData.php');
session_start();
$view = new stdClass();
$view->pageTitle = 'Wish list';

//If user is logged in
if ((isset($_SESSION['login_user']))) {

    $wishlistDataSet = new WishlistDataSet();

    if (isset($_GET['id']) && isset($_SESSION['login_user'])) {
        $advertId = $_GET["id"];
        $fk_userId = $_SESSION['login_user'];

        $wishlistDataSet->insertIntoWishList($fk_userId, $advertId);
    }

    if (isset($_GET['wishlistDelete'])) {
        $wishlistId = $_GET["wishlistDelete"];
//        $fk_userId = $_SESSION['login_user'];

        var_dump($wishlistId);

        $view->wishlistDataSet = $wishlistDataSet->deleteFromWishList($wishlistId);
    }

    $view->wishlistDataSet = $wishlistDataSet->viewWishList();

    require_once('Views/wishlist.phtml');
} //Else tell them to log in
else {
    require_once('Views/login.phtml');
}