<?php

$view = new stdClass();
$view->pageTitle = 'Login';

require_once('Views/login.phtml');
require ('Models/UserDataSet.php');

$userDataSet = new UserDataSet();

if (isset ($_POST['sign-up']) ){
    $userDataSet->insertUser($_POST);
}

else if (isset ($_POST['login']) ){
        $userDataSet->userLogin($_POST);
    }

