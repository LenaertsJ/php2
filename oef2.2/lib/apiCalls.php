<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once './autoload.php';
include('../httpful.phar');

$id = $_POST['eub_id'];
$url = "http://localhost/php2_oefeningen/oef2.2/api/btwcode/$id";

$response = \Httpful\Request::put($url)                  // Build a PUT request...
->sendsJson()                               // tell it we're sending (Content-Type) JSON...
->body('{"eub_land":"' . $_POST["eub_land"] . '", "eub_code":"'. $_POST["eub_code"] .'"}') // attach a body/payload...
->send();                                   // and finally, fire that thing off!


//$container->getMessageService()->AddMessage("infos", "Record has been succesfully updated");

header("../btw_form.php");
