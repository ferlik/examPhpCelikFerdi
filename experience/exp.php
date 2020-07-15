<?php
include("../parts/header.php");
require('../connection_bdd.php');
include('../functions.php');
$res = $pdo->query('SELECT * FROM `experience`');


session_start();

if (!$_SESSION['connect']) {
    header('Location: ../index.php');
}

?>

<body>

    <h1>Mes expériences</h1>

    <div>
        <a class="btn btn-danger" href="ajoutexp.php"> ajouter experience</a>
        <a class="btn btn-danger" href="../administration">Mon compte</a>


    </div><br>
    <a class="btn btn-danger" href="../disconnect.php">se deconnecter</a>


    <div class='mydiv'>
        <?php
        while ($data = $res->fetch()) {
        ?>
            <div class="col-6 p-0 card" style="width: 22rem; margin-left: 40%;">

                <div class="card-body bg-secondary">
                    <h5 class="card-title">Nom: <?php echo ($data['titre']) ?></h5>
                    <h5 class="card-title">Prénom: <?php echo ($data['description']) ?></h5>
                    <p class="card-text"><?php echo ($data['date_debut']) ?></p>
                    <p class="card-text"><?php echo ($data['date_fin']) ?></p>
                    <p><a class="btn btn-danger" title="Supprimer" href="suppexp.php?id=<?php echo ($data['id']); ?>">Supprimer</a></p>
                    <p>
                        <a class="btn btn-danger" titlt="modifier" href="modifexp.php?id=<?php echo ($data['id']); ?>">Modifier</a>
                    </p>



                </div>

            </div>
    </div>
<?php

        }
        $res->closeCursor();
?>








</body>

</html>