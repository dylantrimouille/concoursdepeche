<div class="login-page mt-5"> <!-- Formulaire de modif -->
    <div class="form">
        <form action="<?=htmlspecialChars($_SERVER['PHP_SELF'])?>" method="post" class="register-form">
            <input type="text" name="lastname" placeholder="Nom" value="<?= $_SESSION['user']->lastname ?>"/>
            <input type="text" name="firstname" placeholder="Prénom" value="<?= $_SESSION['user']->firstname ?>"/>
            <input type="text" name="pseudo" placeholder="Nom de l'organisation" value="<?= $_SESSION['user']->pseudo ?>"/>
            <input type="phone" name="phone" placeholder="N° de téléphone" value="<?= $_SESSION['user']->phone ?>"/>
            <input type="email" name="email" placeholder="Adresse E-Mail" value="<?= $_SESSION['user']->email?>"/>
            <input type="password" name="password" placeholder="Mot de passe" />
            <input type="password" name="confirmPassword" placeholder="Confirmer le mot de passe" />
           <input type="submit" name="inscription" value="MODIFIER ET ENREGISTRER" id="register">
            <p class="message">Déjà inscrit ? <a href="signin-ctrl.php">Connectez-vous !</a></p>
        </form>
    </div>
</div>