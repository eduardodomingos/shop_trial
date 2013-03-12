<?php
/*This file holds stuff useful in almost every PHP base dynamic application*/

//ini_set('display_errors', 'Off');// uncomment in production

// get the document root
$doc_root = $_SERVER['DOCUMENT_ROOT'];
// get the application base_url
$uri = $_SERVER['REQUEST_URI'];
$dirs = explode('/', $uri);
$base_url = '/' . $dirs[1] . '/';
// set the include path
set_include_path($doc_root . $base_url);

//get db model
require_once('models/db_model.php');

//useful to redirect user
function redirect($url) {
    session_write_close();
    header("Location: " . $url);
    exit;
}
//useful to display user friendly error page
function display_error($error_message) {
    global $base_url;
    include 'errors/error.php';
    exit;
}


session_start(); //useful for intensive session based applications
$errors=array();