<h3 class="text-center mt-5">MON COMPTE ORGANISATEUR</h3>
<h4 class="text-center">Voici vos informations personnelles, vous pouvez les modifier à tout moment.</h4>

<div class="login-page"> <!-- Compte Profil -->
    <div class="form">
        <form class="register-form">
            <input type="text" name="lastname" placeholder="Nom du président de l'organisation" value="<?= $_SESSION['user']->lastname ?>" required/>
            <input type="text" name="firstname" placeholder="Prénom du président de l'organisation" value="<?= $_SESSION['user']->firstname ?>" required/>
            <input type="text" name="pseudo" placeholder="Nom de l'organisation" value="<?= $_SESSION['user']->pseudo ?>" required/>
            <input type="phone" name="phone" placeholder="N° de téléphone" value="<?= $_SESSION['user']->phone ?>" required/>
            <input type="mail" name="mail" placeholder="Adresse E-Mail" value="<?= $_SESSION['user']->email ?>" required/>
            <input type="password" name="password" placeholder="Modifier le mot de passe" required/>
            <input type="password" name="confirmPassword" placeholder="Confirmer le mot de passe" required/>
            <button type="button">MODIFIER</button>
            <button type="button" class="mt-1">SUPPRIMER MON COMPTE</button>
        </form>
    </div>
</div>