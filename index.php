<?php
include("parts/header.php");
require('connection_bdd.php');
include('functions.php');
$res = $pdo->query('SELECT * FROM user');
$exp = $pdo->query('SELECT * FROM `experience`');
$comp = $pdo->query('SELECT * FROM competence');




$errors = [];

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validateFormLogin();


    if (count($errors) == 0) {
        $errors = connectUser($pdo);
        if (count($errors) == 0) {
            header('Location: administration.php');
        }
    }
}

?>

<body>

    <div class="wrapper fadeInDown">
        <div id="formContent" <!-- Tabs Titles -->




            <form method="post" action="index.php" enctype="multipart/form-data">

                <input type="mail" class="fadeIn second" name="email" placeholder="email">

                <input type="password" class="fadeIn third" name="mot_de_passe" placeholder="Mot de passe">
                <input type="submit" class="fadeIn fourth" value="Se connecter">


                <?php
                if (count($errors) != 0) {
                    echo (' <h2>Erreurs lors de la dernière soumission du formulaire : </h2>');
                    foreach ($errors as $error) {
                        echo ('<div class="error">' . $error . '</div>');
                    }
                }

                ?>


            </form>

            <div class='mydiv'>
                <?php
                while ($data = $res->fetch()) {
                ?>

                    <h2>Nom: <?php echo ($data['nom']) ?></h2>
                    <h2>Prénom: <?php echo ($data['prenom']) ?></h2>






            </div>
        </div>
    <?php

                }
                $res->closeCursor();
    ?>

    <h1>Mon CV</h1>



    <h2>Mes compétences</h2>
    <div class='mydiv'>
        <?php
        while ($data = $exp->fetch()) {
        ?>
            <div class="col-10 p-0 card" style="width: 50rem; margin-left: 140px;">

                <div class="card-body bg-secondary">
                    <h5 class="card-title">Titre: <?php echo ($data['titre']) ?></h5>
                    <h5 class="card-title">Description: <?php echo ($data['description']) ?></h5>
                    <p class="card-text"><?php echo ($data['date_debut']) ?></p>
                    <p class="card-text"><?php echo ($data['date_fin']) ?></p>




                </div>

            </div>
    </div>
<?php

        }
        $exp->closeCursor();
?>
<h2>Mes expériences</h2>
<div class='mydiv'>
    <?php
    while ($data = $comp->fetch()) {
    ?>
        <div class="col-10 p-0 card" style="width: 50rem; margin-left: 400px;">

            <div class="card-body bg-secondary">
                <h5 class="card-title">Nom: <?php echo ($data['titre']) ?></h5>
                <h5 class="card-title">Prénom: <?php echo ($data['note']) ?></h5>





            </div>

        </div>

    <?php

    }
    $comp->closeCursor();
    ?>

</body>

</html>