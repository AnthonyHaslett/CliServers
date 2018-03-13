<?php
require_once('Models/AdvertDataSet.php');
require_once('Models/AdvertData.php');
require_once('Models/Pagination.php');

//require_once('Models/ContactUsDataSet.php');
//require_once('Models/ContactUs.php');

session_start();
$view = new stdClass();
//$viewCon = new stdClass();
$view->pageTitle = 'Browse';

//Reference to the advert data set
$advertDataSet = new AdvertDataSet();
//$view->advertDataSet = $advertDataSet->fetchAllAdverts();


// Pagination
//$dataSet = array(1,2,3,4,5,6,7,8,9,10);
//
//$currPage = ($_GET["pg"])?$_GET["pg"]:1;
//
//$pagination = new Pagination(sizeof($advertDataSet), 14, $currPage);


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
} else if ($_REQUEST['freeSearchSubmit'] == 'getFreeSearch'){
//    $_GET = 'freeSearchSubmit';
    //$_REQUEST = 'freeSearchSubmit';



//    var_dump($_GET);
    $view->advertDataSet = $advertDataSet->freeSearch($_GET);
}


else {
    $_GET = '';
    $view->advertDataSet = $advertDataSet->browseAdverts($_GET);
}
//Button filters End


//Free search
//if (isset ($_POST['freeSearchSubmit']) ){
//    $_POST = 'freeSearchSubmit';
//$view->advertDataSet = $advertDataSet->freeSearch($_POST);
//}




if ($_POST['Contact'] && $_POST['id']) {
    if ($_POST['action'] == 'Contact') {

        header("Location: contactUs.php");
    }
}


//if (isset($_POST['contactOwner'])){
//
//    $view->advertDataSet = $advertDataSet->contactOwner($_POST);
//
//}

require_once('Views/browse.phtml');

