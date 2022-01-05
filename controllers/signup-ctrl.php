<?php
require_once(dirname(__FILE__).'/../config/regexp.php');
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../utils/database.php');
require_once(dirname(__FILE__) . '/../models/Users.php');
require_once(dirname(__FILE__) . '/../class/Mail.php');

// S'INSCRIRE
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

    // firstname : Nettoyage et validation
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($firstname)){
        $testRegex = preg_match('/'.REGEXP_STR_NO_NUMBER.'/',$firstname);
        if(!$testRegex){
            $error["firstname"] = "Le prénom n'est pas au bon format!!"; 
        } else {
            if(strlen($firstname)<=1 || strlen($firstname)>=70){
                $error["firstname"] = "La longueur de chaine n'est pas bonne";
            }
        }
    }

     $phone = trim(filter_input(INPUT_POST, 'phone'));
     if (!preg_match('/'.REGEXP_PHONE.'/',$phone)) {
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
        $users = new Users($lastname,$firstname,$phone,$email,$passwordHash);
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
            $message = "Bonjour ". $lastname . "<br>Merci! Veuillez confirmer en <a href=\"$link\">cliquant ici</a>";

            $mail = new Mail($message,$to,$from,$subject,$fromName,$toName);
            $mail->send();
            var_dump($error);
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