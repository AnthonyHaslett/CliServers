<?php
require_once('Models/AdvertDataSet.php');
require_once('Models/AdvertData.php');
require_once('Models/Database.php');

//session_start();
$view = new stdClass();
//$view->pageTitle = 'AJAX request';

//require('Views/jsTutorial.html');
$advertDataSet = new AdvertDataSet();


if(isset($_GET['query'])){

    //this is fine don't change
    $json = json_encode($advertDataSet->freeSearch($_GET['query']));
    print $json;
}







