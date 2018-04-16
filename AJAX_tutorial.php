<?php
require_once('../Models/AdvertDataSet.php');
require_once('../Models/AdvertData.php');
session_start();
$view = new stdClass();
$view->pageTitle = 'AJAX request';


$advertDataSet = new AdvertDataSet();

require_once('../Views/jsTutorial.html');