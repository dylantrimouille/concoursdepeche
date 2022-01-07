<div class="container">
    <div class="row">
        <div class="col">
            <div class="login-page mt-5">
                <div class="form ">
                    <!-- Formulaire de connexion -->
                    <form action="<?=htmlspecialChars($_SERVER['PHP_SELF'])?>" method="post" class="login-form">
                        <input type="email" name="email" placeholder="E-Mail" required />
                        <?php  echo $error['email_error'] ?? null; ?>
                        <input type="password" name="password" placeholder="Mot de passe" required />
                        <?php  echo $error['password_error'] ?? null; ?>
                        <button class="mb-3" type="submit">Se connecter !</button>
                        <!-- <button type="submit"><a href="signin-organizers-ctrl.php">Connexion Organisateur</button> -->
                        <p class="message">Pas encore inscrit ? <a href="signup-ctrl.php">Créer un compte !</a></p>
                        <!-- <p class="message">Je suis organisateur ! <a href="signup-organizer-ctrl.php">Créer un compte !</a></p> -->
                        <p class="message"><a href="lostpassword-ctrl.php">Mot de passe oublié ?</a></p>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>