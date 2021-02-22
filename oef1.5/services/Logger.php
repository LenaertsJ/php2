<?php


class Logger
{
    private $fp;
    private $logfile;

    public function __construct($logfile)
    {
        $this->fp = fopen($logfile);
    }

    public function log($msg){

        $msg = time() . $msg . '\r\n';
        fwrite($this->fp, $msg);
    }

    public function ShowLog(){

        file_get_contents($this->fp);

    }
}