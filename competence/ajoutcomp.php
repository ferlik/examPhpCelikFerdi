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
    $returnValidation = validateFormAjoutComp();
    $errors = $returnValidation['errors'];


    if (count($errors) == 0) {
        addComp($pdo);
        header('Location:comp.php');
    }
}

?>

<body>

    <h1>Ajouter une compétence</h1>

    <div class="col-10 p-0 card" style="width: 50rem; margin-left: 20%;">

        <div class="card-body bg-secondary">

            <form method="post" action="ajoutcomp.php" enctype="multipart/form-data">
                <label>Titre</label>
                <input type="text" name="titre" class="form-control" required placeholder="titre" minlength="4">
                <label>Note</label>
                <select name="note" class="form-control" placeholder="note" required>
                    <?php
                    foreach (getNotes() as $note) {
                        $selected = '';
                        if ($note === $comp['note']) {
                            $selected = 'selected';
                        }

                        echo ('<option ' . $selected . ' value="' . $note . '">' . $note . '</option>');
                    }
                    ?>
                </select>





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