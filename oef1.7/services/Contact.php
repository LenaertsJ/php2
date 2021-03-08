<?php


class Contact
{
    private $mailheader;
    private $subject;
    private $content;
    private $receiver;

    public function __construct($name, $email, $subject, $message){
        $this->content = "From: $name  \n Email: $email  \n Message: $message .";
        $this->mailheader = "From: $email \r\n";
        $this->subject = $subject;
        $this->receiver = "julielenaerts@gmail.com";
    }

    public function sendMail(){
        mail($this->receiver, $this->subject, $this->content, $this->mailheader) or die("Error!");
        $msg = "Your message has been sent. We'll get back to you as soon as possible!";
        $container->getMessageService()->AddMessage("infos", $msg);
    }

    /**
     * @return string
     */
    public function getMailheader(): string
    {
        return $this->mailheader;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getReceiver(): string
    {
        return $this->receiver;
    }


}