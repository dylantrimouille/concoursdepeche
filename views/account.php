<h3 class="text-center">MON COMPTE</h3>
<h4 class="text-center">Voici vos informations personnelles, vous pouvez les modifier à tout moment.</h4>

<div class="login-page"> <!-- Compte Profil -->
    <div class="form"  >
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="register-form">
            <input type="text" name="lastname" placeholder="Nom" value="<?= $user->lastname ?>" required/>
            <input type="text" name="firstname" placeholder="Prénom" value="<?= $user->firstname ?>" required/>
            <input type="text" name="pseudo" placeholder="Nom de l'organisation" value="<?= $user->pseudo ?? null ?>"/>
            <input type="phone" name="phone" placeholder="N° de téléphone" value="<?= $user->phone ?>" required/>
            <input type="mail" name="mail" placeholder="Adresse E-Mail" value="<?= $user->email ?>" required/>
            <input type="password" name="password" placeholder="Modifier le mot de passe"/>
            <input type="password" name="confirmPassword" placeholder="Confirmer le mot de passe"/>
            <button type="submit">MODIFIER</button>
        </form>
    </div>
</div>

<div class="d-flex justify-content-center mt-3">
<button type="button" class="btn btn-danger mt-1"><a href="/../controllers/account-ctrl.php?id=<?=$user->user_id?>">SUPPRIMER MON COMPTE</a></button>
</div>