<?php
include("../parts/header.php");
require('../connection_bdd.php');
include('../functions.php');
$comp = $pdo->query('SELECT * FROM competence');

session_start();

if (!$_SESSION['connect']) {
    header('Location: ../index.php');
}

?>

<body>

    <h1>Mes compétences</h1>
    <div>
        <a class="btn btn-danger" href="ajoutcomp.php">ajouter competence</a>
        <a class="btn btn-danger" href="../administration">Mon compte</a>

    </div><br>


    <a class="btn btn-danger" href="../disconnect.php">se deconnecter</a>


    <div class='mydiv'>
        <?php
        while ($data = $comp->fetch()) {
        ?>
            <div class="col-12 p-0 card" style="width: 22rem; margin-left: 40%;">

                <div class="card-body bg-secondary">
                    <h5 class="card-title">Nom: <?php echo ($data['titre']) ?></h5>
                    <h5 class="card-title">Prénom: <?php echo ($data['note']) ?></h5>
                    <p><a class="btn btn-danger" title="Supprimer" href="suppcomp.php?id=<?php echo ($data['id']); ?>">Supprimer</a></p>
                    <p>
                        <a class="btn btn-danger" titlt="modifier" href="modifcomp.php?id=<?php echo ($data['id']); ?>">Modifier</a>
                    </p>




                </div>

            </div>
    </div>
<?php

        }
        $comp->closeCursor();
?>








</body>

</html>