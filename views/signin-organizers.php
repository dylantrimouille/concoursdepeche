<div class="login-page mt-5">
    <div class="form ">
        <!-- Formulaire de connexion -->
        <form action="<?=htmlspecialChars($_SERVER['PHP_SELF'])?>" method="post" class="login-form"> 
            <input type="mail" name="email" placeholder="E-Mail" required/>
            <input type="password" name="password" placeholder="Mot de passe" required/>
            <button type="submit" >Se connecter !</button>
            <p class="message"><a href="lostpassword-ctrl.php">Mot de passe oublié ?</a></p></p>
        </form>
    </div>
</div>