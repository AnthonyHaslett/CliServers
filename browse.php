<?php
require_once('Models/AdvertDataSet.php');

$view = new stdClass();
$view->pageTitle = 'Browse';

$advertDataSet = new AdvertDataSet();
$view->advertDataSet = $advertDataSet->fetchAllAdverts();
//$advertDataSett = new AdvertDataSet();
//$view->advertDataSet = $advertDataSett->fetchAllAudis();

//$userDataSet = new UserDataSet();
//$view->userDataSet = $userDataSet->fetchAllUsers();



//$view->addDataSet = $addDataSet->fetchAllAudis();


//if($_POST['carDrop'] == 'Mercedes') {
//    // query to get all Doe records
//    $query = "SELECT * FROM adverts WHERE title='Merc'";
//}
//elseif($_POST['value'] == 'Audi') {
//    fetchAllAudis();
//} else {
//    // query to get all records
//    $query = "SELECT * FROM names";
//}

require_once('Views/browse.phtml');

