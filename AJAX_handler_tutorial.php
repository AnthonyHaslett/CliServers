<?php
require_once('../Models/AdvertDataSet.php');
require_once('../Models/AdvertData.php');
require_once('../Models/Database.php');

//session_start();
$view = new stdClass();
//$view->pageTitle = 'AJAX request';

//require('Views/jsTutorial.html');
$advertDataSet = new AdvertDataSet();


require('Views/AJAX.html');