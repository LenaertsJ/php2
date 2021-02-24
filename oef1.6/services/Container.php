<?php

$request_uri = explode("/", $_SERVER['REQUEST_URI']);
$app_root = "/" . $request_uri[1] . "/" . $request_uri[2];

require_once $_SERVER['DOCUMENT_ROOT'] . $app_root . "/lib/autoload.php";
//require_once "../models/Connection.php";
//require_once "./Logger.php";
//require_once "./DBManager.php";

//require_once "../lib/autoload.php";

class Container
{
    /**
     * @return Connection
     */
    public function getConnection(){
        $connection = new connection();
        return $connection;
    }

    /**
     * @return Logger
     */
    public function getLogger(){
        $logger = new Logger();
        return $logger;
    }

    /**
     * @return DBManager
     */
    public function getDBManager(){
        $logger = $this->getLogger();
        $connection = $this->getConnection();

        $dbm = new DBManager($logger, $connection);
        return $dbm;
    }

    /**
     * @return MessageService
     */
    public function getMessageService(){

        //general errors
        $e = [];
        if ( key_exists( 'errors', $_SESSION ) AND is_array( $_SESSION['errors']) )
        {
            $e = $_SESSION['errors'];
            $_SESSION['errors'] = [];
        }

        //input errors
        $ie = [];
        if ( key_exists( 'input_errors', $_SESSION ) AND is_array( $_SESSION['input_errors']) )
        {
            $ie = $_SESSION['input_errors'];
            $_SESSION['input_errors'] = [];
        }

        //info messages
        $infos = [];
        if ( key_exists( 'msgs', $_SESSION ) AND is_array( $_SESSION['msgs']) )
        {
            $infos = $_SESSION['msgs'];
            $_SESSION['msgs'] = [];
        }

        $ms = new MessageService($e, $ie, $infos);
        return $ms;
    }

}