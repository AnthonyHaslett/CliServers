<?php

$view = new stdClass();
$view->pageTitle = 'Login';

$hash = password_hash("1234", PASSWORD_DEFAULT);


//If post == sign in DO

//END

// if post == sign up DO
$username = $_POST['username'];
$password = $_POST['password'];
$name     = $_POST['name'];
$email    = $_POST['email'];
$address    = $_POST['address'];
$userId    = $_POST['userId'];

$sql = "INSERT INTO users (username, password, email, address, userId) VALUES (".$username."," .$password.", ".$email.", ".$address. ", ".$userId.")";
//END


//echo $sql;

require_once('Views/login.phtml');