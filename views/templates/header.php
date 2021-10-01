<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concoursdepêche.fr - Le site référence des concours de pêche en France.</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/style-signup.css">
    <link rel="stylesheet" href="/assets/css/style-contact.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="monLogo d-flex justify-content-center"><img src="/assets/img/CONCOURS2PÊCHE.png"
                alt="Logo de concours2peche.fr"></div>


        <!-- DEBUT DE MA BARRE DE NAVIGATION -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index-ctrl.php">Concours2Pêche.fr</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Présentation
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="about-ctrl.php">Qui sommes-nous ?</a></li>
                                <li><a class="dropdown-item" href="objectives-ctrl.php">Nos objectifs !</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Concours
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="reservations-ctrl.php">Dates & Agenda</a></li>
                                <li><a class="dropdown-item" href="reservations-ctrl.php">Reserver</a></li>
                                <li><a class="dropdown-item" href="rules-ctrl.php">Réglement</a></li>
                                <li><a class="dropdown-item" href="results-ctrl.php">Résultats</a></li>
                                <li><a class="dropdown-item" href="gallery-ctrl.php">Galerie Souvenirs</a></li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Billeterie
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="reservations-ctrl.php">Réserver ma place</a></li>
                                <li><a class="dropdown-item" href="secure-payments-ctrl.php">Informations Paiement
                                        Sécurisé</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="contact-ctrl.php" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Contact
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="contact-ctrl.php">Formulaire de contact</a></li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            F.A.Q
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Ici, toutes vos questions.</a></li>
                        </ul>
                    </li> -->
                        <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Pub & Sponsors
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Marques</a></li>
                            <li><a class="dropdown-item" href="#">Chaine Youtube</a></li>
                            <li><a class="dropdown-item" href="#">Pêcheurs Pro</a></li>
                        </ul>
                    </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Espace Membre
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="account-ctrl.php">Mon compte</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-success" href="signin-ctrl.php">
                                Connexion
                            </a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Le portrait du mois
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Mai 2022</a></li>
                            <li><a class="dropdown-item" href="#">Avril 2022</a></li>
                            <li><a class="dropdown-item" href="#">Mars 2022</a></li>
                            <li><a class="dropdown-item" href="#">Fevrier 2022</a></li>
                            <li><a class="dropdown-item" href="#">Janvier 2022</a></li>
                        </ul>
                    </li> -->
                    </ul>

                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Rechercher une info"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Recherche</button>
                    </form>


                </div>
            </div>
        </nav>
    </header>