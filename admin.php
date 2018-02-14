<?php
session_start();
//echo $_SESSION['login_user'] . "bring session here!";
$view = new stdClass();
$view->pageTitle = 'Admin';
require_once('Views/admin.phtml');