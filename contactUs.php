<?php require ('Models/ContactUsDataSet.php');

session_start();// Starting Session
$view = new stdClass();
$view->pageTitle = 'Contact us!';

//echo  $_SESSION['login_user'] . '<<<<';

$contactUsDataSet = new ContactUsDataSet();

if(isset($_POST['contactBtn'])) {

    $contactUsDataSet->insertContactDetails($_POST);

}




//if(isset($_POST['contactBtn'])){
//    $contactUsDataSet = new ContactUsDataSet();
//    $view->contactUsDataSet = $contactUsDataSet->();
//}


require ('Views/contactUs.phtml');