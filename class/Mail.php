<?php

class Mail{

    private $_message;
    private $_to;
    private $_from;
    private $_subject;
    private $_fromName;
    private $_toName;


    public function __construct($message = null,$to = null,$from = null,$subject = null,$fromName = null,$toName = null){
        $this->_message = $message;
        $this->_to = $to;
        $this->_from = $from;
        $this->_subject = $subject;
        $this->_fromName = $fromName;
        $this->_toName = $toName;

    }

    public function send(){

        $to      = $this->_toName .'<'.$this->_to.'>';
        $subject = $this->_subject;
        $message = $this->_message;
        $headers = 'From: '.$this->_from . '\r\n' .
        'Reply-To: '.$this->_from . '\r\n' .
        'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }
}