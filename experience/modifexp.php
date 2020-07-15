<?php
require_once '../connection_bdd.php';
require_once '../functions.php';
$id = $_GET['id'];
$exp = getOneExp($pdo, $id);

session_start();

if (!$_SESSION['connect']) {
    header('Location: ../index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $retourValidation = validateFormExp();
    $errors = $retourValidation['errors'];

    updateExp($pdo, $id);
    $errors = $retourValidation['errors'];
    header('Location: exp.php');
}
?>
<html>

<head>
    <?php
    include '../parts/header.php';
    ?>
</head>

<body>
    <div class="col-10 p-0 card" style="width: 50rem; margin-left: 20%;">

        <div class="card-body bg-secondary">
            <form method="post" action="modifexp.php?id=<?php echo ($id); ?>" enctype="multipart/form-data">
                <label>titre</label>
                <input type="text" name="titre" required minlength="3" class="form-control" value="<?php echo ($exp['titre']) ?>" placeholder="titre">
                <label>Description</label>
                <input type="textarea" name="description" required class="form-control" value="<?php echo ($exp['description']) ?>" placeholder="description">
                <label>Date début</label>
                <input type="date" name="date_debut" required class="form-control" value="<?php echo ($exp['date_debut']) ?>" placeholder="date début">
                <label>Date fin</label>
                <input type="date" name="date_fin" required class="form-control" value="<?php echo ($exp['date_fin']) ?>" placeholder="date fin">



                <input type="submit">

            </form>
        </div>
    </div>
</body>

</html>