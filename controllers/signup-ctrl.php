<?php
require_once(dirname(__FILE__).'/../config/regexp.php');
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../utils/database.php');
require_once(dirname(__FILE__) . '/../models/Users.php');
require_once(dirname(__FILE__) . '/../class/Mail.php');


$error = [];
$message;

// FORMULAIRE D'INSCRIPTION (UTILISATEUR & ORGANISATEUR)

if ($_SERVER['REQUEST_METHOD']=='POST') {

// lastname (nom de famille) : Nettoyage et validation des données.
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($lastname)){
        $testRegex = preg_match('/'.REGEXP_STR_NO_NUMBER.'/',$lastname);
        if(!$testRegex){
            $error["lastname_error"] = "Le nom n'est pas au bon format!!"; 
        } else {
            if(strlen($lastname)<=1 || strlen($lastname)>=100){
                $error["lastname_error"] = "La longueur de chaine n'est pas bonne";
            }
        }
    }


// firstname (prénom) : Nettoyage et validation des données.
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($firstname)){
        $testRegex = preg_match('/'.REGEXP_STR_NO_NUMBER.'/',$firstname);
        if(!$testRegex){
            $error["firstname_error"] = "Le prénom n'est pas au bon format!!"; 
        } else {
            if(strlen($firstname)<=1 || strlen($firstname)>=100){
                $error["firstname_error"] = "La longueur de chaine n'est pas bonne";
            }
        }
    }


// role_id : Correspond au role attribué si l'inscription et faite par un pêcheur ou organisateur.
    $role_id = intval($_POST['role_id']);

// pseudo ( nom de l'organisation ) : Nettoyage et validation des données.
    $pseudo = trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($pseudo)){
        $testRegex = preg_match('/'.REGEXP_STR_NO_NUMBER.'/',$pseudo);
        if(!$testRegex){
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


// email ( adresse email ) : Nettoyage et validation des données.
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if(!empty($email)){
        $testmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    
        if(!$testmail){
            $error['email_error'] = "Le mail n'est pas valide ";
            }
    } else{
        $error['email_error'] = "Ce champ est requis!";
        }


// Mot de passe.
// Vérification de la correspondance des mots de passe.
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if($password !== $confirmPassword){
        $error['password_error'] = 'Les mots de passe ne correspondent pas';
    } else {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }


    if(empty($error)){
        $pdo = Database::getInstance();
        $users = new Users($lastname,$firstname,$pseudo,$phone,$email,$passwordHash,$role_id);
        $response = $users->create();
        $id = $pdo->lastInsertId();
        $token = $users->getValidatedToken();

        if($response === true){

            $to = $email;
            $from = SENDER_EMAIL;
            $subject = 'Validation de votre inscription';
            $fromName = FROM_NAME;
            $toName = $lastname;

            $link = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/controllers/validAccountCtrl.php?id='.$id.'&token='.$token;
            $message = "Bonjour ". $lastname . ' ' . $firstname . "<br>Merci pour votre inscription !<br>Veuillez confirmer votre inscription en <a href=\"$link\">cliquant ici !</a>";

            $mail = new Mail($message,$to,$from,$subject,$fromName,$toName);
            $mail->send();
            
    }else{
        $message=$response;
    }
}

}

include(dirname(__FILE__).'/../views/templates/header.php');

if (!empty($error)||$_SERVER['REQUEST_METHOD']!='POST') {
    include(dirname(__FILE__).'/../views/signup.php');
} else {
    include(dirname(__FILE__).'/../views/valide.php');
}

include(dirname(__FILE__).'/../views/templates/footer.php');
?>