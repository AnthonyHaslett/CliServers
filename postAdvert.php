<?php

/*
 * A controller to sort input from HTML then pass input to controller for execution
 */


session_start();
$view = new stdClass();
$view->pageTitle = 'Post an ad!';
require_once('Views/postAdvert.phtml');
require ('Models/AdvertDataSet.php');
//require ('Models/UserDataSet.php');



$advertDataSet = new AdvertDataSet();

if(!(isset($_SESSION['login_user']))){
    header('Location: login.php');
}

if(isset($_POST['submit'])){

    $data = "";

    $advertDataSet->insertAdvert($_POST);

    if ($data == true) {

    }

}



