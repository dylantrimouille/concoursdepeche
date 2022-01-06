<?php
require_once(dirname(__FILE__) . '/../models/Users.php');
require_once(dirname(__FILE__) . '/../utils/init.php');


// Initialisation du tableau d'erreurs
$error = array();
/*************************************/

// Nettoyage de l'id passé en GET dans l'url
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
/*************************************************************/

$response = Users::get($id);

// Si $response appartient à la classe PDOException (Si une exception est retournée),
// on stocke un message d'erreur à afficher dans la vue
if($response instanceof PDOException){
    $message = $response->getMessage();
}
/*************************************************************/

//On ne controle que s'il y a des données envoyées 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // lastname******************************************************
    // Nettoyage et vérification
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEXP_STR_NO_NUMBER.'/')));

    if(!empty($lastname)){
        if(!$isOk){
            $error['lastname_error'] = 'Merci de choisir un nom valide';
        }
    }else{
        $error['lastname_error'] = 'Le champ est obligatoire';
    }
    // ***************************************************************

    // FIRSTNAME******************************************************
    // Nettoyage et vérification
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEXP_STR_NO_NUMBER.'/')));

    if(!empty($firstname)){
        if(!$isOk){
            $error['firstname_error'] = 'Le prénom n\'est pas valide';
        }
    }else{
        $error['firstname_error'] = 'Le champ est obligatoire';
    }
    // ***************************************************************

    // TELEPHONE******************************************************
    // Nettoyage et vérification
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $isOk = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.REGEXP_PHONE.'/')));

    if(!empty($phone)){
        if(!$isOk){
            $error['phone_error'] = 'Le numero n\'est pas valide, les séparateur sont - . /';
        }
    }
    // ***************************************************************
    
    // EMAIL
    // Nettoyage et vérification
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    $isOk = filter_var($mail, FILTER_VALIDATE_EMAIL);

    if(!empty($mail)){
        if(!$isOk){
            $error['mail_error'] = 'Le mail n\'est pas valide';
        }
    }else{
        $error['mail_error'] = 'Le champ est obligatoire';
    }
    // ***************************************************************

    // Si il n'y a pas d'erreurs, on met à jour le patient.
    if(empty($error) ){    
        $user = new Users($lastname, $firstname, $phone, $mail);
        $response = $user->update($id);
        // Si $response appartient à la classe PDOException (Si une exception est retournée),
        // on stocke un message d'erreur à afficher dans la vue
        if($response instanceof PDOException){
            $message = $response->getMessage();
        } else {
            $message = MSG_UPDATE_PATIENT_OK;
        }
    }
    
}

/* ************* AFFICHAGE DES VUES **************************/

include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/edit-user.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');

/*************************************************************/