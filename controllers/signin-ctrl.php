<?php
require_once(dirname(__FILE__) . '/../utils/init.php');

require_once(dirname(__FILE__) . '/../models/Users.php');

// Initialisation du tableau d'erreurs
$errorsArray = array();
/*************************************/

//On ne controle que s'il y a des données envoyées 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // EMAIL
    // Nettoyage et vérification
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);

    if(!empty($email)){
        if(!$isOk){
            $errorsArray['email_error'] = 'Le mail n\'est pas valide';
        }
    }else{
        $errorsArray['email_error'] = 'Le champ est obligatoire';
    }
    // ***************************************************************


    $password = $_POST['password'];

    $isValidatedUser = Users::isValidated($email);

    if(!is_null($isValidatedUser)){
        $user = Users::getByEmail($email);
        $hash = $user->password;
        
        $isVerified = password_verify($password, $hash);
        if($isVerified === true){
            $_SESSION['user'] = $user; 
            //header('location: /controllers/HomeCtrl.php');
        } else {
            $errorsArray['global'] = 'Votre mot de passe n\'est pas bon!';
        }
    } else {
        $errorsArray['global'] = 'Votre compte n\'est pas encore validé!';
    }

}



include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/signin.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');
