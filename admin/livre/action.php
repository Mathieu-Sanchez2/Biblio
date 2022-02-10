<?php 
// 1ER CAR SESSION_START()
include '../config/config.php';
include '../config/bdd.php';

if (isset($_POST['btn_update_livre'])){
        /**
     * Traitement des données du formulaire
     * 1) sécuriser les données en entrée
     * 2) validation des donées
     * 3) traitement de l'illustration
     *      3.1) vérification du type de fichier
     *      3.2) vérification de la taille du fichier
     *      3.3) déplacement du fichier
     *      3.4) vérification du deplacement
     */

     /**
      * INTERACTION AVEC LA BDD
      * 1) Créer la requete SQL sous forme de chaine de caractères
      * 2) Préparer la requete si elles contient des données extérieur (sinon un query)
      * 3) Créer un tableau avec les données si la requete est envoyer avec prepare()
      * 4) Executer la requete (si prepare() est utiliser)
      * 5) Récuperer les données au format désirer avec un fetch(PDO::FETCH_ASSOC) ou fetchAll(PDO::FETCH_ASSOC)
      */
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
    /**
     * Traitement des données du formulaire
     * 1) sécuriser les données en entrée
     * 2) validation des donées
     * 3) traitement de l'illustration
     *      3.1) vérification du type de fichier
     *      3.2) vérification de la taille du fichier
     *      3.3) déplacement du fichier
     *      3.4) vérification du deplacement
     */

     /**
      * INTERACTION AVEC LA BDD
      * 1) Créer la requete SQL sous forme de chaine de caractères
      * 2) Préparer la requete si elles contient des données extérieur (sinon un query)
      * 3) Créer un tableau avec les données si la requete est envoyer avec prepare()
      * 4) Executer la requete (si prepare() est utiliser)
      * 5) Récuperer les données au format désirer avec un fetch(PDO::FETCH_ASSOC) ou fetchAll(PDO::FETCH_ASSOC)
      */
}