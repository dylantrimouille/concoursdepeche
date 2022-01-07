<main>

    <!--MDB Tables-->
    <div class="container mt-2">

        <div class="text-center darken-grey-text mb-4">
            <h1 class="mt-5 mb-3 h5">LISTE DES UTILISATEURS</h1>
        </div>


        <!--Table-->
        <table class="table table-hover table-responsive mb-0">
            <!--Table head-->
            <thead>
                <tr>
                    <th scope="row"></th>
                    <th class="th-lg"><a>ID#</a></th>
                    <th class="th-lg"><a>NOM</a></th>
                    <th class="th-lg"><a>Prenom</a></th>
                    <th class="th-lg"><a>N° de téléphone</a></th>
                    <th class="th-lg"><a>Email</a></th>
                    <th class="th-lg"><a>Deleted</a></th>
                    <th class="th-lg"><a>Modifier</a></th>
                    <th class="th-lg"><a>Supprimer</a></th>

                </tr>
            </thead>
            <!--Table head-->

            <!--Table body-->
            <?php foreach($users as $user) { ?>
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td><?=$user->user_id?></td>
                    <td><?=$user->lastname?></td>
                    <td><?=$user->firstname?></td>
                    <td><?=$user->phone?></td>
                    <td><?=$user->email?></td>
                    <td><?=$user->archived_at?></td>
                    <td><button type="button" class="btn btn-success btn-lg"><a href="/../controllers/edit-user-ctrl.php?id=<?=$user->user_id?>">+</a></button></td>
                    <td><button type="button" class="btn btn-danger btn-lg"><a href="/../controllers/account-ctrl.php?id=<?=$user->user_id?>">-</a></button></td>
                </tr>
            </tbody>
            <?php } ?>
            <!--Table body-->
        </table>
        <!--Bottom Table UI-->
        <div class="d-flex justify-content-center">
            <!--Pagination -->
            <nav class="my-4 pt-2">
                <ul class="pagination pagination-circle pg-blue mb-0">
                    <!--Arrow left-->
                    <li class="page-item disabled">
                        <a class="page-link" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Précédent</span>
                        </a>
                    </li>
                    <!--Numbers-->
                    <li class="page-item active"><a class="page-link">1</a></li>
                    <li class="page-item"><a class="page-link">2</a></li>
                    <li class="page-item"><a class="page-link">3</a></li>
                    <li class="page-item"><a class="page-link">4</a></li>
                    <li class="page-item"><a class="page-link">5</a></li>
                    <!--Arrow right-->
                    <li class="page-item">
                        <a class="page-link" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Suivant</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!--/Pagination -->
        </div>
        <!--Bottom Table UI-->
    </div>
</main>

</body>