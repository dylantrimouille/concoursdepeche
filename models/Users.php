<?php
require_once(dirname(__FILE__) . '/../utils/database.php');


class Users{

    private $_user_id;
    private $_lastname;
    private $_firstname;
    private $_pseudo;
    private $_phone;
    private $_email;
    private $_password;
    private $_archived_at;
    private $_validated_at;
    private $_validated_token;
    private $_role_id;

    private $_pdo;

    public function __construct(    $lastname = null,
                                    $firstname = null,
                                    $pseudo = null,
                                    $phone = null,
                                    $email = null,
                                    $password = null,
                                    $role_id = null,
                                    $archived_at = null,
                                    $validated_at = null                                    
                                    ){

        $this->_lastname = $lastname; 
        $this->_firstname = $firstname; 
        $this->_pseudo = $pseudo; 
        $this->_phone = $phone; 
        $this->_email = $email; 
        $this->_password = $password; 
        $this->_archived_at = $archived_at; 
        $this->_validated_at = $validated_at;
        $this->_validated_token = bin2hex(openssl_random_pseudo_bytes(60));
        $this->_role_id = $role_id; 

        $this->_pdo = Database::getInstance();
    
    }

// METHODE MAGIQUE "construct" qui permet d'hydrater la table "users".
    public function create(){
        
        $sql = 'INSERT INTO `users` (`lastname`, `firstname`, `pseudo`, `phone`, `email`, `password`, `validated_token`, `role_id`)
        VALUES (:lastname, :firstname, :pseudo, :phone, :email, :password, :validated_token, :role_id);';
    
        try {
            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':lastname', $this->_lastname);
            $sth->bindValue(':firstname', $this->_firstname);
            $sth->bindValue(':pseudo', $this->_pseudo);
            $sth->bindValue(':phone', $this->_phone);
            $sth->bindValue(':email', $this->_email);
            $sth->bindValue(':password', $this->_password);
            $sth->bindValue(':validated_token', $this->_validated_token);
            $sth->bindValue(':role_id', $this->_role_id);
            if(!$sth->execute()){
                throw new PDOException('Probl??me lors de l\'inscription');
            }
            return true;
        } catch (\PDOException $ex) {
            return $ex;
        }
    
    }








    public function getValidatedToken(){
        return $this->_validated_token;
    }

// METHODE MAGIQUE QUI PERMET DE RECUPERER L'ID D'UN USER.
    public static function get($id){
        $sql = 'SELECT * FROM `users`
                WHERE `user_id` = :user_id;';
        try {
            $pdo = Database::getInstance();
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':user_id', $id, PDO::PARAM_INT);
            if(!$sth->execute()){
                throw new PDOException('Erreur d\'ex??cution');
            }
            return $sth->fetch();
        } catch (\PDOException $ex) {
            //throw $ex;
        }

    }

//METHODE QUI PERMET DE SUPPRIMER LE TOKEN UNE FOIS L'INSCRIPTION DE L'USER VALIDE.
    public static function deleteToken($id){
        $sql = 'UPDATE `users` SET `validated_token`= null
                WHERE `user_id` = :user_id;';
        try {
            $pdo = Database::getInstance();
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':user_id', $id, PDO::PARAM_INT);
            if(!$sth->execute()){
                throw new PDOException('Erreur d\'ex??cution');
            } else {
                return $sth->rowCount();
            }
        } catch (\PDOException $ex) {
            //throw $ex;
        }

    }

// METHODE QUI PERMET DE VALIDER LE COMPTE USER. 
    public static function setValidateAccount($id){
        $sql = 'UPDATE `users` SET `validated_at`= CURRENT_TIMESTAMP()
                WHERE `user_id` = :user_id;';
        
        try {
            $pdo = Database::getInstance();
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':user_id', $id, PDO::PARAM_INT);

            if(!$sth->execute()){
                throw new PDOException('Probl??me de validation du compte');
            } else {
                return true;
            }
        } catch (\PDOException $ex) {
            return $ex;
        }
    }

//METHODE QUI PERMET DE RECUPER L'EMAIL DE L'USER 
    public static function getByEmail($email){
        $sql = 'SELECT * FROM `users` WHERE `email` = :email;';

        try {
            $pdo = Database::getInstance();
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':email', $email);

            if(!$sth->execute()){
                throw new PDOException('Probl??me d\'execution');
            } else {
                return $sth->fetch();
            }
        } catch (\PDOException $ex) {
            return $ex;
        }
    }

// METHODE QUI PERMET DE VERIFIER SI L'EMAIL A ETAIT VALIDE.
    public static function isValidated($email){
        $sql = 'SELECT `validated_at` FROM `users` WHERE `email` = :email;';

        try {
            $pdo = Database::getInstance();
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':email', $email);

            if(!$sth->execute()){
                throw new PDOException('Probl??me d\'execution');
            } else {
                return $sth->fetchColumn();
            }
        } catch (\PDOException $ex) {
            return $ex;
        }
    }
    
// METHODE QUI PERMET DE LIRE LES UTILISATEURS
    public static function read($search = NULL){

        $pdo = database::getInstance();

        try{

        $sql = 'SELECT * FROM users WHERE lastname LIKE :search OR firstname LIKE :search ;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':search', '%' . $search . '%' , PDO::PARAM_STR);
        $sth->execute();
        $user=$sth->fetchAll();
         return $user;

        }catch(\PDOException $ex) {
            $errorMessage =  $ex->getMessage();
            return $errorMessage;
        }

    }

// SUPRIMMER UN CLIENT //

public function delete($id){
 
    try {
        $sql = 'DELETE FROM `users`
                    WHERE `user_id` = :user_id;';


                $sth = $this->_pdo->prepare($sql);
                $sth->bindValue(':user_id', $id, PDO::PARAM_INT);

                if(!$sth->execute()){
                    throw new PDOException('Oups, nous avons un petit probl??me');
            }else{
                return true;
            }

            } catch (PDOException $ex) {
                    return $ex;
            }
}

/**
     * M??thode qui permet de mettre ?? jour un utilisateur
     * 
     * @return boolean
     */
    public function update($id){
        try{
            // On r??cup??re le utilisateur
            $response = $this::get($id);
            
            //Si la r??ponse est une erreur on sort via le catch
            if($response instanceof PDOException){
                throw new PDOException($response->getMessage());
            }

            // Si le mail n'existe pas en base ou que ??a n'est pas d??j?? le mail du utilisateur que l'on modifie
            // on a le droit de faire les modifs
            if(!$this->isValidated($this->_email) || $this->_email==$response->email){
                $sql = 'UPDATE `users` SET `lastname` = :lastname, `firstname` = :firstname, `pseudo` = :pseudo, `phone` = :phone, `email` = :email
                        WHERE `user_id` = :user_id;';

                $sth = $this->_pdo->prepare($sql);
                $sth->bindValue(':lastname',$this->_lastname,PDO::PARAM_STR);
                $sth->bindValue(':firstname',$this->_firstname,PDO::PARAM_STR);
                $sth->bindValue(':pseudo',$this->_pseudo,PDO::PARAM_STR);
                $sth->bindValue(':phone',$this->_phone,PDO::PARAM_STR);
                $sth->bindValue(':email',$this->_email,PDO::PARAM_STR);
                $sth->bindValue(':user_id',$id,PDO::PARAM_INT);
                $result = $sth->execute();

                if($result === false){
                    throw new PDOException(ERR_UPDATE_PATIENT_NOTOK);
                }
                
            } else {
                throw new PDOException(ERR_PATIENTEXIST);
            }
        } catch(PDOException $ex){
            return $ex;
        }
    }



}