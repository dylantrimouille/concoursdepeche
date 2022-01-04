<?php
require_once(dirname(__FILE__).'/../config/regexp.php');
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../utils/database.php');
require_once(dirname(__FILE__) . '/../models/Users.php');
require_once(dirname(__FILE__) . '/../class/Mail.php');

// S'INSCRIRE
$error = [];
if ($_SERVER['REQUEST_METHOD']=='POST') {

    $lastname = trim(filter_input(INPUT_POST, 'lastname'));     
    if (!preg_match(REGEXP_STR_NO_NUMBER,$lastname)) {
       $error['lastname'] = 'Le format n\'est pas bon !';    
    }

    $firstname = trim(filter_input(INPUT_POST, 'firstname'));  
    if (!preg_match(REGEXP_STR_NO_NUMBER,$firstname)) {
       $error['firstname'] ='Le format n\'est pas bon !';    
    }
    
    $pseudo = trim(filter_input(INPUT_POST, 'pseudo'));  
    if (!preg_match(REGEXP_STR_NO_NUMBER,$pseudo)) {
       $error['pseudo'] ='Le format n\'est pas bon !';    
    }

    
    $phone = trim(filter_input(INPUT_POST, 'phone'));
    if (!preg_match(REGEXP_PHONE,$phone)) {
        $error['phone'] = 'Le format n\'est pas bon !';
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

    // CONDITIONS EMAIL


// PASSWORD
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if($password !== $confirmPassword){
        $error['password_error'] = 'Les mots de passe ne correspondent pas';
    } else {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }

    if(empty($errorsArray)){
        $pdo = Database::getInstance();
        $users = new Users($lastname,$firstname,$pseudo,$phone,$email,$passwordHash);
        $response = $users->createOrganizer();
        $id = $pdo->lastInsertId();
        $token = $users->getValidatedToken();

        if($response === true){

            $to = $email;
            $from = SENDER_EMAIL;
            $subject = 'Validation de votre inscription';
            $fromName = FROM_NAME;
            $toName = $lastname;

            $link = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/controllers/validAccountCtrl.php?id='.$id.'&token='.$token;
            $message = "Bonjour $lastname<br>Merci! Veuillez confirmer en <a href=\"$link\">cliquant ici</a>";

            $mail = new Mail($message,$to,$from,$subject,$fromName,$toName);
            $mail->send();
            
    }

}


}

include(dirname(__FILE__).'/../views/templates/header.php');

if (!empty($error)||$_SERVER['REQUEST_METHOD']!='POST') {
    include(dirname(__FILE__).'/../views/signup-organizer.php');
} else {
    include(dirname(__FILE__).'/../views/valide.php');
}

include(dirname(__FILE__).'/../views/templates/footer.php');
?>