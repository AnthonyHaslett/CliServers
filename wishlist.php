<?php
session_start();
$view = new stdClass();
$view->pageTitle = 'Wish list';

require_once('Views/wishlist.phtml');