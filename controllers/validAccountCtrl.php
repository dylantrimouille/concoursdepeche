<?php
require_once(dirname(__FILE__) . '/../utils/init.php');

require_once(dirname(__FILE__) . '/../models/Users.php');

$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));

$get_token = trim(filter_input(INPUT_GET, 'token', FILTER_SANITIZE_STRING));

$users = Users::get($id);
$validated_token = $users->validated_token;

if($get_token == $validated_token){
    $response = Users::setValidateAccount($id);
    if($response === true){
        $nbRows = Users::deleteToken($id);
        if($nbRows==0){
            $message = 'Votre compte a déjà été validé';
        } else {
            $message = 'Vous avez bien validé votre compte!';
        }
    } else {
        $message = 'Erreur lors de la validation du compte!';
    }
} else {
    $message = 'Impossible de valider ce compte!';
}

include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/valide.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');