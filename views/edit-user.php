<div class="login-page"> <!-- Formulaire de modif -->
    <div class="form">
        <form action="<?=htmlspecialChars($_SERVER['PHP_SELF'])?>" method="post" class="register-form">
            <input type="text" name="lastname" placeholder="Nom" value="<?=$response->lastname?>"/>
            <input type="text" name="firstname" placeholder="Prénom" value="<?=$response->firstname?>"/>
            <input type="phone" name="phone" placeholder="N° de téléphone (Optionnel)" value="<?=$response->phone?>"/>
            <input type="email" name="email" placeholder="Adresse E-Mail" value="<?=$response->email?>"/>
            <input type="password" name="password" placeholder="Mot de passe" />
            <input type="password" name="confirmPassword" placeholder="Confirmer le mot de passe" />
           <input type="submit" name="inscription" value="Créer mon compte !" id="register">
            <p class="message">Déjà inscrit ? <a href="signin-ctrl.php">Connectez-vous !</a></p>
        </form>
    </div>
</div>