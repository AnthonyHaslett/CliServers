<?php require ('Models/ContactUsDataSet.php');
session_start();// Starting Session
$view = new stdClass();
$view->pageTitle = 'Contact us!';


$contactUsDataSet = new ContactUsDataSet();

if(isset($_POST['conSubmit'])) {

    $contactUsDataSet->insertContactDetails($_POST);

}
require_once('Views/contactUs.phtml');