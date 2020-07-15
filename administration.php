<?php
include("parts/header.php");
require('connection_bdd.php');
include('functions.php');
$res = $pdo->query('SELECT * FROM user');
$exp = $pdo->query('SELECT * FROM `experience`');
$comp = $pdo->query('SELECT * FROM competence');




session_start();

if (!$_SESSION['connect']) {
    header('Location: index.php');
}

?>

<body>

    <h1>Mon Compte</h1>
    <div>

        <a class="btn btn-dark ml-5" href="competence/comp.php">Mes competences</a>
        <a class="btn btn-dark ml-5" href="experience/exp.php"> Mes experiences</a>
        <a class="btn btn-dark ml-5" href="disconnect.php">se deconnecter</a>
    </div>




    <div class='mydiv'>
        <?php
        while ($data = $res->fetch()) {
        ?>
            <div class="col-6 p-0 card" style="width: 22rem; margin-left: 35%;font-size:25px">

                <div class="card-body bg-secondary">
                    <h5 class="card-title">Nom: <?php echo ($data['nom']) ?></h5>
                    <h5 class="card-title">Prénom: <?php echo ($data['prenom']) ?></h5>
                    <p class="card-text"><?php echo ($data['email']) ?></p>


                </div>

            </div>
    </div>
<?php

        }
        $res->closeCursor();
?>

<h2>Mes compétences</h2>
<div class='mydiv'>
    <?php
    while ($data = $comp->fetch()) {
    ?>
        <div class="col-10 p-0 card" style="width: 50rem; margin-left: 20%;">

            <div class="card-body bg-secondary">
                <h5 class="card-title">Titre: <?php echo ($data['titre']) ?></h5>
                <h5 class="card-title">Note: <?php echo ($data['note']) ?></h5>





            </div>

        </div>

    <?php

    }
    $comp->closeCursor();
    ?>

    <h2>Mes expériences</h2>
    <div class='mydiv'>
        <?php
        while ($data = $exp->fetch()) {
        ?>
            <div class="col-10 p-0 card" style="width: 50rem; margin-left: 20%;">

                <div class="card-body bg-secondary">
                    <h5 class=" card-title">Nom: <?php echo ($data['titre']) ?></h5>
                    <h5 class="card-title">Description: <?php echo ($data['description']) ?></h5>
                    <p class="card-text">Début: <?php echo ($data['date_debut']) ?></p>
                    <p class="card-text">Fin: <?php echo ($data['date_fin']) ?></p>




                </div>

            </div>
    </div>
<?php

        }
        $exp->closeCursor();
?>








</body>

</html>