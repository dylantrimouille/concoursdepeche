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

    // lastname (nom de famille) : Nettoyage et validation des données.
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($lastname)){
        $isOk = preg_match('/'.REGEXP_STR_NO_NUMBER.'/',$lastname);
        if(!$isOk){
            $error["lastname_error"] = "Le nom n'est pas au bon format!!"; 
        } else {
            if(strlen($lastname)<=1 || strlen($lastname)>=100){
                $error["lastname_error"] = "La longueur de chaine n'est pas bonne";
            }
        }
    }
    // ***************************************************************


    // firstname (prénom) : Nettoyage et validation des données.
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($firstname)){
        $isOk = preg_match('/'.REGEXP_STR_NO_NUMBER.'/',$firstname);
        if(!$isOk){
            $error["firstname_error"] = "Le prénom n'est pas au bon format!!"; 
        } else {
            if(strlen($firstname)<=1 || strlen($firstname)>=100){
                $error["firstname_error"] = "La longueur de chaine n'est pas bonne";
            }
        }
    }
    // ***************************************************************


    // pseudo ( nom de l'organisation ) : Nettoyage et validation des données.
    $pseudo = trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($pseudo)){
        $isOk = preg_match('/'.REGEXP_STR_NO_NUMBER.'/',$pseudo);
        if(!$isOk){
            $error["pseudo_error"] = "Le nom de l'organisation n'est pas au bon format !"; 
        } else {
            if(strlen($pseudo)<=1 || strlen($pseudo)>=100){
                $error["pseudo_error"] = "La longueur de chaine n'est pas bonne";
            }
        }
    }
 
    

    // phone ( numéro de téléphone ) : Nettoyage et validation des données.
     $phone = trim(filter_input(INPUT_POST, 'phone'));
     if (!preg_match('/'.REGEXP_PHONE.'/',$phone)) {
         $error['phone_error'] = 'Le format n\'est pas bon !';
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