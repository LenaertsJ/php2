<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once './lib/autoload.php';

$restclient = new RestClient();

$data = array("eub_land" => $_POST["eub_land"]);

//var_dump($data);
$id = $_POST['eub_id'];
$url = "http://localhost/php2_oefeningen/oef2.2/api/btwcode/$id";

//var_dump($url);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

curl_exec($ch);
