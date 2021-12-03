<div class="login-page"> <!-- Formulaire d'inscription organisateur -->
    <div class="form">
        <form action="<?=htmlspecialChars($_SERVER['PHP_SELF'])?>" method="post" class="register-form">
            <input type="text" name="lastname" placeholder="Nom"/>
            <input type="text" name="firstname" placeholder="Prénom" />
            <input type="text" name="pseudo" placeholder="Nom de l'AAPPMA" />
            <input type="text" name="pseudo" placeholder="Adresse de l'AAPPMA" />
            <input type="phone" name="phone" placeholder="N° de téléphone (Optionnel)" />
            <input type="email" name="email" placeholder="Adresse E-Mail" />
            <input type="password" name="password" placeholder="Mot de passe" />
            <input type="password" name="confirmPassword" placeholder="Confirmer le mot de passe" />
           <input type="submit" name="inscription" value="Créer mon compte !" id="register">
            <p class="message">Déjà inscrit ? <a href="signin-ctrl.php">Connectez-vous !</a></p>
        </form>
    </div>
</div>