<?php
$view = new stdClass();
$view->pageTitle = 'Login';

require ('Views/login.phtml');
require ('Models/UserDataSet.php');

$userDataSet = new UserDataSet();

if (isset ($_POST['sign-up']) ){
    $userDataSet->insertUser($_POST);
}

else if (isset ($_POST['login']) ){
    $userDataSet->selectUser($_POST);
//    header('Location: '.$_SERVER['REQUEST_URI']);
    //    $userDataSet->userLogin($_POST);
    }

