<?php 
include '../config/config.php';
if (!isConnect()){
    header('location:' . URL_ADMIN . 'login.php');
    die; 
}
include '../config/bdd.php';
if (isset($_POST['btn_update_categorie'])){
    /**
     * Traitement des données du formulaire
     * 1) sécuriser les données en entrée
     * 2) validation des donées
     */

    /**
     * INTERACTION AVEC LA BDD
    * 1) Créer la requete SQL sous forme de chaine de caractères
    * 2) Préparer la requete si elles contient des données extérieur (sinon un query)
    * 3) Créer un tableau avec les données si la requete est envoyer avec prepare()
    * 4) Executer la requete (si prepare() est utiliser)
    * 5) (si besoin) Récuperer les données au format désirer avec un fetch(PDO::FETCH_ASSOC) ou fetchAll(PDO::FETCH_ASSOC)
    */
    $id = htmlentities($_POST['id']);
    $libelle = htmlentities($_POST['libelle']);

    $sql = "UPDATE categorie SET libelle = :libelle WHERE id = :id";
    $req = $bdd->prepare($sql);
    $data = [
        ':libelle' => $libelle,
        ':id' => $id
    ];
    if (!$req->execute($data)){
        //erreur
        header('location:update.php?id=' . $id);
        die;
    }
    header('location:index.php');
    die;
    
}


if (isset($_GET['id'])){
    $id = intval($_GET['id']);
    if ($id <= 0){
        // erreur dans l'id
        header('location:index.php');
        die;
    }
    $sql = "DELETE FROM categorie WHERE id = ? LIMIT 1";
    $req = $bdd->prepare($sql);
    if (!$req->execute([$id])) {
        // erreur 
        header('location:index.php');
        die;
    }
    header('location:index.php');
    die;
}

if (isset($_POST['btn_add_categorie'])){
    $libelle = htmlentities($_POST['libelle']);

    $sql = "INSERT INTO categorie VALUES (NULL, :libelle)";
    $req = $bdd->prepare($sql);
    $data = [
        ':libelle' => $libelle,
    ];
    if (!$req->execute($data)){
        //erreur
        header('location:update.php?id=' . $id);
        die;
    }
    header('location:index.php');
    die;
}