<?php
require_once('Models/AdvertDataSet.php');

$view = new stdClass();
$view->pageTitle = 'Test page';

$addDataSet = new AdvertDataSet();
$view->addDataSet = $addDataSet->fetchAllAdverts();

require_once('Views/browse.phtml');