<?php


class connection
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "Kalamundi1";
    private $dbname = "steden";

    /**
     * @return string
     */
    public function getServername(): string
    {
        return $this->servername;
    }

    /**
     * @param string $servername
     */
    public function setServername(string $servername)
    {
        $this->servername = $servername;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getDbname(): string
    {
        return $this->dbname;
    }

    /**
     * @param string $dbname
     */
    public function setDbname(string $dbname)
    {
        $this->dbname = $dbname;
    }

}