<div class="login-page mt-5"> <!-- Formulaire d'inscription -->
    <div class="form">
        <form action="<?=htmlspecialChars($_SERVER['PHP_SELF'])?>" method="post" class="register-form">
            <input type="text" name="lastname" placeholder="Nom" required pattern="<?=REGEXP_STR_NO_NUMBER?>"/>
            <input type="text" name="firstname" placeholder="Prénom" required pattern="<?=REGEXP_STR_NO_NUMBER?>"/>
            <input type="phone" name="phone" placeholder="N° de téléphone (Optionnel)" pattern="<?=REGEXP_PHONE?>"/>
            <input type="email" name="email" placeholder="Adresse E-Mail" required/>
            <input type="password" name="password" placeholder="Mot de passe" required/>
            <input type="password" name="confirmPassword" placeholder="Confirmer le mot de passe" required/>
           <input type="submit" name="inscription" value="Créer mon compte !" id="register">
            <p class="message">Déjà inscrit ? <a href="signin-ctrl.php">Connectez-vous !</a></p>
        </form>
    </div>
</div>