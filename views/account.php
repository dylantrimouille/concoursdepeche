<h3 class="text-center">MON COMPTE</h3>
<h4 class="text-center">Voici vos informations personnelles, vous pouvez les modifier à tout moment.</h4>

<div class="login-page"> <!-- Compte Profil -->
    <div class="form"  >
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>?id=<?=$user->id?>" method="POST" class="register-form">
            <input type="text" name="lastname" placeholder="Nom" value="<?= $_SESSION['user']->lastname ?>" required/>
            <input type="text" name="firstname" placeholder="Prénom" value="<?= $_SESSION['user']->firstname ?>" required/>
            <input type="text" name="pseudo" placeholder="Nom de l'organisation" value="<?= $_SESSION['user']->pseudo ?>" required/>
            <input type="phone" name="phone" placeholder="N° de téléphone" value="<?= $_SESSION['user']->phone ?>" required/>
            <input type="mail" name="mail" placeholder="Adresse E-Mail" value="<?= $_SESSION['user']->email ?>" required/>
            <input type="password" name="password" placeholder="Modifier le mot de passe"/>
            <input type="password" name="confirmPassword" placeholder="Confirmer le mot de passe"/>
            <button type="submit"><a href="/controllers/about-ctrl.php?user=<?= $user->id?>">MODIFIER</button>
            <button type="button" class="mt-1">SUPPRIMER MON COMPTE</button>
        </form>
    </div>
</div>