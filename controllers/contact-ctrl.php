<?php
require_once(dirname(__FILE__) . '/../utils/init.php');

include(dirname(__FILE__).'/../config/regexp.php');
$error = [];
if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    
    // lastname : Nettoyage et validation
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($lastname)){
        $testRegex = preg_match('/'.REGEXP_STR_NO_NUMBER.'/',$lastname);
        if(!$testRegex){
            $error["lastname"] = "Le prénom n'est pas au bon format!!"; 
        } else {
            if(strlen($lastname)<=1 || strlen($lastname)>=70){
                $error["lastname"] = "La longueur de chaine n'est pas bonne";
            }
        }
    }

    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    //On verifie que ce n'est pas vide
    if(!empty($email)){
        // On test la valeur
        $testmail = filter_var($email, FILTER_VALIDATE_EMAIL);

        if(!$testmail){
            $error['email'] = "Le mail n'est pas valide ";
            }
    } else{
        $error['email'] = "Ce champ est requis!";
        }

    $phone = trim(filter_input(INPUT_POST, 'phone'));
     if (!preg_match('/'.REGEXP_PHONE.'/',$phone)) {
         $error['phone'] = 'Le format n\'est pas bon !';
    }
    
    $object = trim(filter_input(INPUT_POST, 'object'));
    if (!preg_match(REGEXP_STR_NO_NUMBER,$object)) {
        $error['object'] = 'Le format n\'est pas bon !';
    }
    $message = trim(filter_input(INPUT_POST, 'message'));
    if (!preg_match(REGEXP_STR_NO_NUMBER,$message)) {
        $error['message'] = 'Le format n\'est pas bon !';
    }
}


include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/contact.php');
include(dirname(__FILE__).'/../views/templates/footer.php');
?>