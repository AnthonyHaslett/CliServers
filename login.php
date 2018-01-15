<?php

$view = new stdClass();
$view->pageTitle = 'Login';

$hash = password_hash("1234", PASSWORD_DEFAULT);
$username = $_POST['username'];
$password = $_POST['password'];
$password = $_POST['name'];
$password = $_POST['email'];



require_once('Views/login.phtml');