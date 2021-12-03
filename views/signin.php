<div class="login-page">
    <div class="form">
        <!-- Formulaire de connexion -->
        <form action="<?=htmlspecialChars($_SERVER['PHP_SELF'])?>" method="post" class="login-form"> 
            <input type="mail" name="email" placeholder="E-Mail" required/>
            <input type="password" name="password" placeholder="Mot de passe" required/>
            <button type="submit" >Se connecter !</button>
            <p class="message">Pas encore inscrit ? <a href="signup-ctrl.php">Créer un compte !</a></p>
            <p class="message">Je suis organisateur ! <a href="organizer-profile-ctrl.php">Créer un compte !</a></p>
            <p class="message"><a href="lostpassword-ctrl.php">Mot de passe oublié ?</a></p></p>
        </form>
    </div>
</div>