<?php
require_once(dirname(__FILE__) . '/../utils/init.php');

include(dirname(__FILE__).'/../utils/regex.php');
$error = [];
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $pseudo = trim(filter_input(INPUT_POST, 'pseudo'));  
    if (!preg_match(REGEX_PSEUDO,$pseudo)) {
       $error['pseudo'] ='Le format n\'est pas bon !';    
    }
    $mail = trim(filter_input(INPUT_POST, 'email'));    
    if (!preg_match(REGEX_EMAIL,$mail)) {
        $error['mail'] = 'Le format n\'est pas bon !';
    }
    $phone = trim(filter_input(INPUT_POST, 'phone'));
    if (!preg_match(REGEX_NUMBER,$phone)) {
        $error['phone'] = 'Le format n\'est pas bon !';
    }
    $object = trim(filter_input(INPUT_POST, 'object'));
    if (!preg_match(REGEX_NUMBER,$object)) {
        $error['object'] = 'Le format n\'est pas bon !';
    }
    $message = trim(filter_input(INPUT_POST, 'message'));
    if (!preg_match(REGEX_NUMBER,$message)) {
        $error['message'] = 'Le format n\'est pas bon !';
    }
}


include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/contact.php');
include(dirname(__FILE__).'/../views/templates/footer.php');
?>