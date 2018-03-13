<?php
require_once('Models/AdvertDataSet.php');
require_once('Models/AdvertData.php');
session_start();
$view = new stdClass();
$view->pageTitle = 'AJAX request';

require('Views/AJAX.html');
$advertDataSet = new AdvertDataSet();


// This is the server-side script.
// Set the content type.
//header('Content-Type: text/plain');

//if ($_REQUEST['freeSearchSubmit'] == 'getFreeSearch'){
////    $_GET = 'freeSearchSubmit';
//
//    $view->advertDataSet = $advertDataSet->freeSearch($_GET);
//}


$a[] = "Anna";
$a[] = "Brittany";
$a[] = "Cinderella";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Fiona";


// get the q parameter, the text typed in, from URL
$q = $_REQUEST["q"];
$hint = "";
// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}
// Output "no suggestion" if no hint was found or output results
echo $hint === "" ? "no suggestion" : $hint;

// Send the data back.
echo " This is the output.";
