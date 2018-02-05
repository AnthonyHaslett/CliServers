<?php
ob_start();
session_start();
$view = new stdClass();
$view->pageTitle = 'Login';

require_once ('Views/login.phtml');
require ('Models/UserDataSet.php');

$userDataSet = new UserDataSet();

if (isset ($_POST['sign-up']) ){
    $userDataSet->insertUser($_POST);
}

if (isset ($_POST['login']) ){

    $data = $userDataSet->selectUser($_POST);
    if($data==true){
        header('Location: index.php');
    } else {
        echo 'wrong';
    }
    //if($dataSet!=null){
//            if(password_verify(htmlentities($_POST["password"]), $dataSet->getPassword())){
//                echo 'successfully logged in';
//                $_SESSION['login_user']=$dataSet->getUserName();
//            }
         //   require_once ('index.php');
         //   header('Location: index.php');
      //  }
    }


