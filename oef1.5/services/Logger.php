<?php


class Logger
{
    private $fp;

    public function __construct($logfile)
    {
        $this->fp = fopen($logfile, "r+");
    }

    public function log($msg){

        $msg = time() . $msg . '\r\n';
        fwrite($this->fp, $msg);
    }

    public function ShowLog(){

        file_get_contents($this->fp);

    }
}