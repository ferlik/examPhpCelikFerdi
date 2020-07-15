<?php

function validateFormLogin()
{
    $errors = [];



    if (empty($_POST['email'])) {
        $errors[] = "Veuillez renseigner un login";
    }

    if (empty($_POST['mot_de_passe'])) {
        $errors[] = "Veuillez renseigner un mot de pass";
    }

    return $errors;
}

function connectUser($pdo)
{
    $errors = [];

    $res = $pdo->prepare(
        'SELECT * FROM user WHERE email = :email AND mot_de_passe = :mot_de_passe'
    );
    $res->execute([
        'email' => $_POST['email'],
        'mot_de_passe' => md5($_POST['mot_de_passe'])
    ]);
    $res = $res->fetch();
    if (!$res) {
        $errors[] = 'Login ou password non connu !';
    } else {
        $_SESSION['connect'] = $res;
        header('Location: administration.php');
    }
    return $errors;
}

function  validateFormAjoutComp()

{


    $errors = [];


    if (empty($_POST['titre'])) {
        $errors[] = 'Erreur, entrez un titre';
    }

    if (empty($_POST['note'])) {
        $errors[] = 'Erreur, entrez une note';
    }

    return ['errors' => $errors];
}

function addComp($pdo)
{

    $req = $pdo->prepare(
        'INSERT INTO competence (titre, note) 
        VALUES (:titre, :note)'
    );


    $req->execute([
        'titre' => $_POST['titre'],
        'note' => $_POST['note'],


    ]);
}

function deleteComp($pdo, $id)
{
    $res = $pdo->prepare('DELETE FROM competence WHERE id = :id');
    $res->execute(['id' => $id]);
}

function getNotes()
{
    $note = [
        '1',
        '2',
        '3',
        '4',
        '5'
    ];
    return $note;
}

function update($pdo, $id)
{
    $req = $pdo->prepare('UPDATE competence SET titre = :titre,
                   note = :note
                    WHERE id = :id');
    $req->execute([
        'titre' => $_POST['titre'],
        'note' => $_POST['note'],
        'id' => $id
    ]);
}

function validateFormComp()
{


    $errors = [];

    if (empty($_POST['titre'])) {
        $errors[] = 'Veuillez saisir un titre';
    }

    if (empty($_POST['note'])) {
        $errors[] = 'Veuillez saisir une note';
    }

    return ['errors' => $errors];
}

function getOneComp($pdo, $id)
{
    $req = $pdo->prepare('SELECT * FROM competence WHERE id = :id');
    $req->execute([
        'id' => $id
    ]);

    return $req->fetch();
}


function validateFormAjoutExp()
{


    $errors = [];

    if (empty($_POST['titre'])) {
        $errors[] = 'Veuillez saisir un titre';
    }

    if (empty($_POST['description'])) {
        $errors[] = 'Veuillez saisir une description';
    }
    if (empty($_POST['date_debut'])) {
        $errors[] = 'Veuillez saisir une date de début';
    }
    if (empty($_POST['date_fin'])) {
        $errors[] = 'Veuillez saisir une date de fin';
    }

    return ['errors' => $errors];
}

function addExp($pdo)
{

    $req = $pdo->prepare(
        'INSERT INTO experience (titre, description,date_debut,date_fin) 
        VALUES (:titre, :description, :date_debut, :date_fin)'
    );


    $req->execute([
        'titre' => $_POST['titre'],
        'description' => $_POST['description'],
        'date_debut' => $_POST['date_debut'],
        'date_fin' => $_POST['date_fin']


    ]);
}


function deleteExp($pdo, $id)
{
    $res = $pdo->prepare('DELETE FROM experience WHERE id = :id');
    $res->execute(['id' => $id]);
}

function getOneExp($pdo, $id)
{
    $req = $pdo->prepare('SELECT * FROM experience WHERE id = :id');
    $req->execute([
        'id' => $id
    ]);

    return $req->fetch();
}

function validateFormExp()
{


    $errors = [];

    if (empty($_POST['titre'])) {
        $errors[] = 'Veuillez saisir un titre';
    }

    if (empty($_POST['description'])) {
        $errors[] = 'Veuillez saisir une description';
    }
    if (empty($_POST['date_debut'])) {
        $errors[] = 'Veuillez saisir une date de début';
    }
    if (empty($_POST['date_fin'])) {
        $errors[] = 'Veuillez saisir une date de fin';
    }

    return ['errors' => $errors];
}


function updateExp($pdo, $id)
{
    $req = $pdo->prepare('UPDATE experience SET titre = :titre,
                   description = :description, date_debut = :date_debut, date_fin = :date_fin
                    WHERE id = :id');
    $req->execute([
        'titre' => $_POST['titre'],
        'description' => $_POST['description'],
        'date_debut' => $_POST['date_debut'],
        'date_fin' => $_POST['date_fin'],
        'id' => $id
    ]);
}
