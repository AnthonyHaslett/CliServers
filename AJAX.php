<?php


session_start();
$view = new stdClass();
$view->pageTitle = 'AJAX request';
require_once('Views/AJAX.html');

// This is the server-side script.
// Set the content type.
header('Content-Type: text/plain');
// Send the data back.
echo "This is the output.";