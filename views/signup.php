<div class="login-page mt-5"> <!-- Formulaire d'inscription -->
    <div class="form">
        <form action="<?=htmlspecialChars($_SERVER['PHP_SELF'])?>" method="post" class="register-form">
            <input type="text" name="lastname" placeholder="Nom" required pattern="<?=REGEXP_STR_NO_NUMBER?>"/>
            <input type="text" name="firstname" placeholder="Prénom" required pattern="<?=REGEXP_STR_NO_NUMBER?>"/>
            <select class="form-select mb-3" aria-label="Default select example" name="role_id" required>
                <option selected value="3">- Je suis pêcheur -</option>
                <option value="2">- Je suis organisateur -</option>
            </select>
            <input type="text" name="pseudo" placeholder="Nom de l'organisation" pattern="<?=REGEXP_STR_NO_NUMBER?>"/>
            <p>(Obligatoire si vous êtes organisateur)</p>
            <input type="phone" name="phone" placeholder="N° de téléphone" pattern="<?=REGEXP_PHONE?>" required/>
            <input type="email" name="email" placeholder="Adresse E-Mail" required/>
            <input type="password" name="password" placeholder="Mot de passe" required/>
            <input type="password" name="confirmPassword" placeholder="Confirmer le mot de passe" required/>
           <button type="submit" >Créer mon compte !</button>
            <p class="message">Déjà inscrit ? <a href="signin-ctrl.php">Connectez-vous !</a></p>
        </form>
    </div>
</div>