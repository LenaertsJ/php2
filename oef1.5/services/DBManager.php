<?php


class DBManager
{
    private $logger;

    public function __construct($logger, $connection){
        $this->logger = $logger;
        $this->connection = $connection;
    }

    public function CreateConnection()
    {
        global $conn;
        $servername =  $this->connection->servername;
        $dbname = $this->connection->servername;
        $username = $this->connection->username;
        $password = $this->connection->password;

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

    public function GetData( $sql )
    {
        global $conn;

        $this->CreateConnection();

        //define and execute query
        $result = $conn->query( $sql );

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

        return $result;
    }


}