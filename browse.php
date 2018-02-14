<?php
require_once('Models/AdvertDataSet.php');
require_once('Models/AdvertData.php');

//require_once('Models/ContactUsDataSet.php');
//require_once('Models/ContactUs.php');

session_start();
$view = new stdClass();
$view->pageTitle = 'Browse';


$advertDataSet = new AdvertDataSet();
//$view->advertDataSet = $advertDataSet->fetchAllAdverts();

//Button filters START
if($_REQUEST['low2high'] == 'low2high'){
    $_GET = 'low2high';
    $view->advertDataSet = $advertDataSet->browseAdverts($_GET);
}

elseif($_REQUEST['high2low'] == 'high2low'){
    $_GET = 'high2low';
    $view->advertDataSet = $advertDataSet->browseAdverts($_GET);
}

elseif($_REQUEST['titleASC'] == 'titleASC'){
    $_GET = 'titleASC';
    $view->advertDataSet = $advertDataSet->browseAdverts($_GET);
}

elseif($_REQUEST['titleDESC'] == 'titleDESC'){
    $_GET = 'titleDESC';
    $view->advertDataSet = $advertDataSet->browseAdverts($_GET);
}

elseif($_REQUEST['filterSubmit'] == 'filterSubmit'){
    $_GET = 'filterSubmit';
    $view->advertDataSet = $advertDataSet->browseAdverts($_GET);
}
else {
    $_GET = '';
    $view->advertDataSet = $advertDataSet->browseAdverts($_GET);
}
//Button filters START


//Free search
if (isset ($_POST['freeSearchSubmit']) ){
    $_POST = 'freeSearchSubmit';
$view->advertDataSet = $advertDataSet->freeSearch($_POST);
}

require_once('Views/browse.phtml');

