<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
$public_access=true;

require_once '../lib/autoload.php';

//Allow access from outside (see CORS)
header("Access-Control-Allow-Origin: 'https://localhost'");
header("Access-Control-Allow-Credentials 'true'");

//Allow GET, POST, PUT, DELETE, OPTIONS http methods
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

//Set response content type and character set
header("Content-Type: application/json; charset=UTF-8");

//Basic Authentication controle
//if ( $_SERVER['PHP_AUTH_USER'] !== "user123" OR $_SERVER['PHP_AUTH_PW'] !== "12345678" )
//{
//    //als er geen juiste credentials doorgegeven worden, afbreken met code 401 Unauthorized
//    header('WWW-Authenticate: Basic realm="Provide your username and password for the Voorbeeld API"');
//    header('HTTP/1.0 401 Unauthorized');
//    exit;
//}

$method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];

$parts = explode("/", $request_uri);

//zoek "rest" in de uri
for ( $i=0; $i<count($parts) ;$i++)
{
    if ( $parts[$i] == "php2_oefeningen" )
    {
        break;
    }
}

$request_part = $parts[$i + 3];
if ( count($parts) > $i + 4 ) $id = $parts[$i + 4];

$dbManager = $container->getDBManager();

if ($request_part != "btwcodes" AND $request_part != "btwcode")
{
    print json_encode( ["Deze combinatie van Resource en Method is niet toegelaten." ]);
    http_response_code(418);
    die;
}

if ($request_part !== "btwcode" AND isset($id))
{
    print json_encode( ["Deze combinatie van Resource en Method is niet toegelaten." ]);
    http_response_code(418);
    die;
}


// CONTROLE ID
if ( $request_part == "btwcode" AND !is_numeric( $parts[$i + 4] )){
    http_response_code(418);
    die("Ongeldig argument " . $parts[$i + 4] . " opgegeven");
}


//GET alle BTW codes
if ( $method == "GET" AND $request_part == "btwcodes" )
{
    $sql = "select * from eu_btw_codes";
    // ... execute $sql
    http_response_code(202);
    print json_encode( $dbManager->getData($sql) ) ;
}

//GET één bepaalde btw code
if ( $method == "GET" AND $request_part == "btwcode" )
{
    $sql = "select * from eu_btw_codes where eub_id='$id'";
    // ... execute $sql
    http_response_code(202);
    print json_encode( $dbManager->getData($sql) ) ;
}

//POST een code toevoegen met land
if ( $method == "POST" AND $request_part == "btwcodes"  )
{
    $btwCode = $_POST["eub_code"];
    $land = $_POST["eub_land"];
    $sql = "INSERT INTO eu_btw_codes SET eub_code='$btwCode', eub_land='$land' ";
    // ... execute $sql
    $result = $dbManager->executeSQL($sql);
    if ($result->rowCount() > 0){
        http_response_code(200);
        print json_encode( [ "BTW Code has been inserted" ] ) ;
    } else {
        print json_encode( [ "Error: no records were affected" ] ) ;
    }
}

//PUT BTW code updaten
if ( $method == "PUT" AND $request_part == "btwcode" )
{
    $contents = json_decode(file_get_contents("php://input"));
    $newdata1 = strtoupper($contents->eub_code);
    $newdata2 = $contents->eub_land;

    $sql = "UPDATE eu_btw_codes SET eub_code='$newdata1', eub_land='$newdata2' WHERE eub_id='$id'";
    $result = $dbManager->executeSQL($sql);

    if ($result->rowCount() > 0){
        http_response_code(200);
        print json_encode( [ "BTW Code has been updated" ] ) ;
    } else {
        print json_encode( [ "Error: no records were affected" ] ) ;
    }

}

//DELETE BTW Code
if ( $method == "DELETE" AND $request_part == "btwcode" )
{
    $sql = "DELETE FROM eu_btw_codes WHERE eub_id='$id'";
    // ... execute $sql
    $result = $dbManager->executeSQL($sql);

    if ($result->rowCount() > 0){
        http_response_code(200);
        print json_encode( [ "BTW Code has been deleted" ] ) ;
    } else {
        print json_encode( [ "Error: no records were affected" ] ) ;
    }

}

