<?php

//print json_encode($_SERVER); exit;
$request_uri = explode("/", $_SERVER['REQUEST_URI']);
$app_root = "/" . $request_uri[1] . "/" . $request_uri[2];

require_once $_SERVER['DOCUMENT_ROOT'] . $app_root . "/models/User.php";
require_once $_SERVER['DOCUMENT_ROOT'] . $app_root . "/models/City.php";
require_once $_SERVER['DOCUMENT_ROOT'] . $app_root . "/services/MessageService.php";
require_once $_SERVER['DOCUMENT_ROOT'] . $app_root . "/models/Connection.php";
require_once $_SERVER['DOCUMENT_ROOT'] . $app_root . "/services/Logger.php";
require_once $_SERVER['DOCUMENT_ROOT'] . $app_root . "/services/DBManager.php";
require_once $_SERVER['DOCUMENT_ROOT'] . $app_root . "/services/Container.php";

session_start();

require_once "connection_data.php";
require_once "html_functions.php";
require_once "form_elements.php";
require_once "sanitize.php";
require_once "validate.php";
require_once "security.php";
require_once "routing.php";
require_once "strings.php";
require_once "access_control.php";

//INITIALIZE CONTAINER
$container = new Container;

//initialize logger and connection class

//$logger = new Logger();
//$connection = new connection();
//
////initialize DBManager
//
//$dbm = new DBManager($logger, $connection);
//
////INITIALIZE MESSAGE SERVICE
//
////general errors
//$e = [];
//if ( key_exists( 'errors', $_SESSION ) AND is_array( $_SESSION['errors']) )
//{
//    $e = $_SESSION['errors'];
//    $_SESSION['errors'] = [];
//}
//
////input errors
//$ie = [];
//if ( key_exists( 'input_errors', $_SESSION ) AND is_array( $_SESSION['input_errors']) )
//{
//    $ie = $_SESSION['input_errors'];
//    $_SESSION['input_errors'] = [];
//}
//
////info messages
//$infos = [];
//if ( key_exists( 'msgs', $_SESSION ) AND is_array( $_SESSION['msgs']) )
//{
//    $infos = $_SESSION['msgs'];
//    $_SESSION['msgs'] = [];
//}
//
//$ms = new MessageService($e, $ie, $infos);
//
//
////initialize $old_post
//$old_post = [];
//
//if ( key_exists( 'OLD_POST', $_SESSION ) AND is_array( $_SESSION['OLD_POST']) )
//{
//    $old_post = $_SESSION['OLD_POST'];
//    $_SESSION['OLD_POST'] = [];
//}
