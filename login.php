<?php
ob_start();
session_start();
$view = new stdClass();
$view->pageTitle = 'Login';

require_once ('Views/login.phtml');
require ('Models/UserDataSet.php');

$userDataSet = new UserDataSet();


if ($_REQUEST['anti-spam'] == 'W6 8HP' && isset ($_POST['sign-up']) ){

//    if (isset ($_POST['sign-up']) ){
        $userDataSet->insertUser($_POST);
//    }
}

elseif ($_REQUEST['anti-spam'] == 'W6 8HP' && isset ($_POST['login']) ){

//    if (isset ($_POST['login']) ){

    $data = $userDataSet->selectUser($_POST);
    if($data==true){
        header('Location: index.php');
    } else {
        echo 'wrong';
    }

//    }
}
else{
    echo 'Please try again';
}



//else{
//    echo 'Please try again';
//}


//if (isset ($_POST['login']) ){
//    $data = $userDataSet->selectUser($_POST);
//    if($data==true){
//        header('Location: index.php');
//    } else {
//        echo 'wrong';
//    }




//
//    if($_REQUEST['sign-up'] == 'anti-spam'){
//        echo 'hello';
//    }


    //if($dataSet!=null){
//            if(password_verify(htmlentities($_POST["password"]), $dataSet->getPassword())){
//                echo 'successfully logged in';
//                $_SESSION['login_user']=$dataSet->getUserName();
//            }
         //   require_once ('index.php');
         //   header('Location: index.php');
      //  }



