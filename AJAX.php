<?php
require_once('Models/AdvertDataSet.php');
require_once('Models/AdvertData.php');
session_start();
$view = new stdClass();
$view->pageTitle = 'Search';


$advertDataSet = new AdvertDataSet();

require('Views/AJAX.html');