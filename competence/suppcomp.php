<?php

require_once '../connection_bdd.php';


require_once '../functions.php';

session_start();

if (!$_SESSION['connect']) {
    header('Location: ../index.php');
}

$id = $_GET['id'];
deleteComp($pdo, $id);
header('Location: comp.php');
