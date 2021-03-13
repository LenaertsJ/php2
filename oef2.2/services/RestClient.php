<?php


class RestClient
{
    private $authenication;
    private $curl;

    function __construct ( array $authenication = null){
        $this->authenication = $authenication;
    }

    public function CurlInit ( $url ){
        $this->curl = curl_init( $url );
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);

        if($this->authenication) {
            curl_setopt($this->curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($this->curl, CURLOPT_USERPWD, $this->authenication['username'] . ":" . $this->authenication['password']);
        }
    }

    public function CurlExec(){
        $curl_response = curl_exec($this->curl);

        if ($curl_response === false){
            $info = curl_getinfo($this->curl);
            die('error occured during curl exec. Additional info: ' . var_export( $info ));
        }
        curl_close($this->curl);

        return $curl_response;
    }
}