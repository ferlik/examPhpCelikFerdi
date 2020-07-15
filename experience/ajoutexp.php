<?php
include("../parts/header.php");
include("../parts/navbar.php");
require_once("../connection_bdd.php");
require_once("../functions.php");


session_start();

if (!$_SESSION['connect']) {
    header('Location: ../index.php');
}




$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $returnValidation = validateFormAjoutExp();
    $errors = $returnValidation['errors'];


    if (count($errors) == 0) {
        addExp($pdo);
        header('Location:exp.php');
    }
}

?>

<body>
    <h1>Ajouter une expérience</h1>

    <div class="col-10 p-0 card" style="width: 50rem; margin-left: 20%;">

        <div class="card-body bg-secondary">



            <form method="post" action="ajoutexp.php" enctype="multipart/form-data">
                <label>Titre</label>
                <input type="text" name="titre" required class="form-control" placeholder="titre" minlength="4">
                <label>Description</label>
                <input type="text-area" name="description" required class="form-control" placeholder="description" minlength="4">
                <label>Date début</label>
                <input type="date" name="date_debut" class="form-control" required placeholder="date_debut" minlength="4">
                <label>Date fin</label>
                <input type="date" name="date_fin" class="form-control" required placeholder="date_fin" minlength="4">







                <input type="submit">

                <?php

                if (count($errors) != 0) {
                    echo (' <h2>Erreurs lors de la dernière soumission du formulaire : </h2>');
                    foreach ($errors as $error) {
                        echo ('<div class="error">' . $error . '</div>');
                    }
                }
                ?>
            </form>
        </div>
    </div>


</body>

</html>