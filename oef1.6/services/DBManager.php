<?php

class DBManager
{
    private $logobject;
    private $connection;

    public function __construct(Logger $logger, Connection $connection){
        $this->logobject = $logger;
        $this->connection = $connection;
    }

    public function CreateConnection()
    {
        $servername = $this->connection->getServername();
        $dbname = $this->connection->getDbname();
        $username = $this->connection->getUsername();
        $password = $this->connection->getPassword();
        global $conn;

        // Create and check connection
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function GetData( string $sql )
    {
        global $conn;


        $this->CreateConnection();

        //define and execute query
        $result = $conn->query( $sql );

        //log sql
//        $this->logobject->log($sql);

        //show result (if there is any)
        if ( $result->rowCount() > 0 )
        {
            $rows = $result->fetchAll(PDO::FETCH_BOTH); //geeft array zoals [0] => 1, ['lan_id'] => 1, ...

            return $rows;
        }
        else
        {
            return [];
        }
    }

    public function ExecuteSQL( $sql )
    {
        global $conn;

        $this->CreateConnection();

        //define and execute query
        $result = $conn->query( $sql );

        //log sql
        $this->logobject->log($sql);

        return $result;
    }


}