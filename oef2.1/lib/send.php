<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access=true;
require_once "autoload.php";
require_once $_SERVER['DOCUMENT_ROOT'] . $app_root . "/services/Contact.php";

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];

$send = new Contact($name, $email, $subject, $message);
var_dump($send->getReceiver(), $send->getMailheader(), $send->getContent(), $send->getSubject());
$send->sendMail();

GoToPage($app_root, $_POST['aftercancel']);

