<?php
require_once '../connection_bdd.php';
require_once '../functions.php';
include("../parts/header.php");
$id = $_GET['id'];
$comp = getOneComp($pdo, $id);

session_start();

if (!$_SESSION['connect']) {
    header('Location: ../index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $retourValidation = validateFormComp();
    $errors = $retourValidation['errors'];

    update($pdo, $id);
    $errors = $retourValidation['errors'];
    header('Location: comp.php');
}
?>
<html>

<head>
    <?php
    include '../parts/header.php';
    ?>
</head>

<body>

    <h1>Modifier une compétence</h1>
    <div class="col-10 p-0 card" style="width: 50rem; margin-left: 20%;">

        <div class="card-body bg-secondary">
            <form method="post" action="modifcomp.php?id=<?php echo ($id); ?>" enctype="multipart/form-data">
                <label>titre</label>
                <input type="text" name="titre" minlength="3" required class="form-control" value="<?php echo ($comp['titre']) ?>" placeholder="titre">

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

            </form>
        </div>
    </div>
</body>

</html>