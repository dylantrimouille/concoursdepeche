<?php
require_once(dirname(__FILE__) . '/../utils/init.php');

require_once(dirname(__FILE__) . '/../models/Organizers.php');

// Initialisation du tableau d'erreurs
$error = [];
/*************************************/

//On ne controle que s'il y a des données envoyées 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // EMAIL
    // Nettoyage et vérification
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);

    if(!empty($email)){
        if(!$isOk){
            $error['email_error'] = 'Le mail n\'est pas valide';
        }
    }else{
        $error['email_error'] = 'Le champ est obligatoire';
    }
    // ***************************************************************


    $password = $_POST['password'];

    $isValidatedUser = Organizers::isValidated($email);

    if(!is_null($isValidatedUser)){
        $organizers = Organizers::getByEmail($email);
        $hash = $organizers->password;
        
        $isVerified = password_verify($password, $hash);
        if($isVerified === true){
            $_SESSION['organizers'] = $organizers; 
            //header('location: /controllers/HomeCtrl.php');
        } else {
            $error['global'] = 'Votre mot de passe n\'est pas bon!';
        }
    } else {
        $error['global'] = 'Votre compte n\'est pas encore validé!';
    }
var_dump($error);
}



include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/signin-organizers.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');
