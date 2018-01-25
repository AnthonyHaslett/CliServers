<?php

$view = new stdClass();
$view->pageTitle = 'Post an ad!';

//$advertDataSet = new AdvertDataSet();
//$view->advertDataSet = $advertDataSet->insertInto();

//if(isset($_POST['post']))
//{
//    $sql = "INSERT INTO users (title, price, description, photo_name, color)
//    VALUES ('".$_POST["title"]."','".$_POST["price"]."','".$_POST["description"]."','".$_POST["photo_name"]."','".$_POST["color"]."')";
//
//    $result = mysqli_query($conn,$sql);
//}

require_once('Views/postAdvert.phtml');