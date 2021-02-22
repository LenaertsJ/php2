<?php


class MessageService
{

    private $errors;
    private $input_errors;
    private $infos;

    public function __construct($e, $ie, $infos) {
        $this->errors = $e;
        $this->input_errors = $ie;
        $this->infos = $infos;
    }

    //parameter should be one of the above properties to find the respective count
    public function Count($e){
        if (!count($e)) {
            return 0;
        } else {
            return count($e);
        }
    }

    //parameter is session variable
    public function newCount($session_errors)
    {
        if (!count($session_errors)) {
            return 0;
        } else {
            return count($session_errors);
        }
    }

    /**
     * @return mixed
     */
    public function getInputErrors()
    {
        return $this->input_errors;
    }

    public function AddMessage($type, $msg, $key = null){
        return $_SESSION['msgs'][$type] = $msg;
    }

    public function ShowErrors($error_type){
        print "<p style='color:red'>$error_type</p>";
    }

    public function ShowInfos($msg){
        print '<div class="msgs">' . $msg . '</div>';
    }

}