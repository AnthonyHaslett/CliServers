<?php require ('Models/ContactUsDataSet.php');

session_start();// Starting Session
$view = new stdClass();
$view->pageTitle = 'Contact Owner';


$_REQUEST['Contact'];



//if(isset($_POST['contactBtn'])){
//    $contactUsDataSet = new ContactUsDataSet();
//    $view->contactUsDataSet = $contactUsDataSet->();
//}


require ('Views/contactUs.phtml');