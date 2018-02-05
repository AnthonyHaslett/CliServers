<?php require ('Models/ContactUsDataSet.php');

session_start();// Starting Session
$view = new stdClass();
$view->pageTitle = 'Contact us!';

//echo  $_SESSION['login_user'] . '<<<<';

$contactUsDataSet = new ContactUsDataSet();

if(isset($_POST['conSubmit'])) {

    $contactUsDataSet->insertContactDetails($_POST);

}
require ('Views/contactUs.phtml');