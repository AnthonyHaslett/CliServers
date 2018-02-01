<?php
$view = new stdClass();
$view->pageTitle = 'Post an ad!';
require_once('Views/postAdvert.phtml');
require ('Models/AdvertDataSet.php');



$advertDataSet = new AdvertDataSet();

//$form = $_POST;
////if(isset($_POST['submit'])) {
//    $title = $_POST['title'];
//    $price = $_POST['price'];
//    $color = $_POST['color'];
//    $description = $_POST['description'];
//    $photo_name = $_POST['photo_name'];
////}

if(isset($_POST['submit'])){
  //  var_dump($_POST);
  //  echo $_POST['title'];
    $advertDataSet->insertAdvert($_POST);
//    $advertDataSet->insertAdvert($_POST['submit']);


//    $title = $_POST['title'];
//    $title = $_POST['title'];
//    $price = $_POST['price'];
//    $color = $_POST['color'];
//    $description = $_POST['description'];
//    $photo_name = $_POST['photo_name'];
}

//$sql = "INSERT INTO adverts ( title,price,description,FK_userId, photo_name,color ) VALUES ( :title, :price, :description, :FK_userId, :photo_name, :color )";
//
//$query = $db->prepare( $sql );
//$query->execute( array( ':title'=>$title, ':color'=> $color, ':description'=>$description, ':photo_name'=>$photo_name ) );


//$advertDataSet = new AdvertDataSet();
//$view->advertDataSet = $advertDataSet->insertAdvert($title,$price,$description,$FK_userId, $photo_name,$color);


