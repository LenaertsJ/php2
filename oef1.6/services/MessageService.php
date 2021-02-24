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

    //Count function (parameter = $this->errors, $this->input_errors, $this->infos)
    public function count($error_type){
        return count($error_type);
    }

    //Count new errors/msgs
    public function countNewErrors()
    {
        return count($_SESSION['errors']);

    }

    public function countNewInputErrors()
    {
        return count($_SESSION['input_errors']);

    }

    public function countNewInfos()
    {
        return count($_SESSION['msgs']);

    }

    /**
     * @return mixed
     */
    public function getInputErrors()
    {
        if($this->count($this->input_errors)){
            return $this->input_errors;
        } else {
            return null;
        }
    }

    public function AddMessage($type, $msg, $key = null){
        if($type == 'input_errors'){
            $_SESSION['input_errors'][$key . '_error'] = $msg;
        } else {
            $_SESSION[$type] = $msg;
        }
    }

    public function ShowErrors(){
        print "<p style='color:red'>$this->errors</p>";
    }

    public function ShowInfos(){
        if($this->count($this->infos)){
            print '<div class="msgs">' . $this->infos[0] . '</div>';
        }
    }
}