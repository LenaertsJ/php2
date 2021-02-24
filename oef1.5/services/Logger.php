<?php


class Logger
{
    private $logfile;
    private $fp;

    public function __construct()
    {
        $this->logfile = $_SERVER['DOCUMENT_ROOT'] . "/php2_oefeningen/oef1.5/log/log.txt";
        $this->fp = fopen($this->logfile, "r+");
    }

    public function log($msg){

        $msg = date("Y-m-d h:i:sa") . "<br>" . $msg . "\r\n";
        fwrite($this->fp, $msg);
    }

    public function ShowLog(){

        $log = file_get_contents($this->logfile);
        $log = str_replace( "\r\n", "<br>", $log );
        echo $log;
    }
}