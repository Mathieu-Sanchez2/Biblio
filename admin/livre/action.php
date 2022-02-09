<?php 
// 1ER CAR SESSION_START()
include '../config/config.php';
include '../config/bdd.php';

if (isset($_POST['btn_update_livre'])){
    var_dump($_POST);
    $id = intval($_POST['id']);
    $num_isbn = htmlentities($_POST['num_isbn']);
    $titre = htmlentities($_POST['titre']);
    $resume = htmlentities($_POST['resume']);
    $prix = htmlentities($_POST['prix']);
    $nb_pages = htmlentities($_POST['nb_pages']);
    $disponibilite = htmlentities($_POST['disponibilite']);
    $date_achat = htmlentities($_POST['date_achat']);

    // création de la requete SQL
    $sql = "UPDATE livre SET num_ISBN = :num_isbn, titre = :titre, resume = :resume, prix = :prix, nb_pages = :nb_pages, date_achat = :date_achat WHERE id = :id";
    // $sql = "UPDATE livre SET num_isbn = ?, titre = ?, resume = ?, prix = ?, nb_pages = ?, date_achat = ? WHERE id = ?";
    $requete = $bdd->prepare($sql);
    $data = [
        ':num_isbn' => $num_isbn,
        ':titre' => $titre,
        ':resume' => $resume,
        ':prix' => $prix,
        ':nb_pages' => $nb_pages,
        ':date_achat' => $date_achat,
        ':id' => $id
    ];
    if (!$requete->execute($data)){
        $_SESSION['error_update_livre'] = true;
        $_SESSION['error_form'] = $_POST;
        header('location:update.php?id='.$id);
        die;
    }
    $_SESSION['error_update_livre'] = false;
    header('location:index.php');
    die;
}

if (isset($_POST['btn_add_livre'])){
    var_dump($_POST, $_FILES);
    // var_dump($_FILES['illustration']['name']);
    
}