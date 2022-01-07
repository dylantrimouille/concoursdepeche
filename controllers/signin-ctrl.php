<?php
require_once(dirname(__FILE__) . '/../utils/init.php');

require_once(dirname(__FILE__) . '/../models/Users.php');


// Initialisation du tableau d'erreurs
$error = array();
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

    $isValidatedUser = Users::isValidated($email);

    if(!is_null($isValidatedUser)){
        $user = Users::getByEmail($email);
        
        $hash = $user->password;
        
        $isVerified = password_verify($password, $hash);
        if($isVerified === true){
            $_SESSION['user'] = $user; 
            header('location: /controllers/index-ctrl.php');
        } else {
            $error['global_error'] = 'Votre mot de passe n\'est pas bon!';
        }
    } else {
        $error['global_error'] = 'Votre compte n\'est pas encore validé!';
    }

}



include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/signin.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');
