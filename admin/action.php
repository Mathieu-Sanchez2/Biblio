<?php 
    include 'config/config.php';
    include 'config/bdd.php';

if (isset($_POST['btn_connect'])){
    var_dump($_POST);
    /**
     * TRAITEMENT DES DONNEES
    */
    $mail = htmlentities($_POST['mail']);
    $mdp = htmlentities($_POST['mdp']);
    /**
     * CHECK DE L'UTILISATEUR EN BDD
    */
    $sql = "SELECT * FROM utilisateur WHERE mail = ?";
    $req = $bdd->prepare($sql);
    $req->execute([$mail]);
    $user = $req->fetch(PDO::FETCH_ASSOC);
    // var_dump($user);
    if (!$user){
        // erreur 
        // $_SESSION 
        $_SESSION['connect'] = false;
        header('location:login.php');
        die;
    }
    if (!password_verify($mdp, $user['mot_de_passe'])){
        // erreur co refusé
        $_SESSION['connect'] = false;
        header('location:login.php');
        die;
    }
    unset($user['mot_de_passe']);
    $_SESSION['user'] = $user;
    $_SESSION['date_connect'] = new DateTime();
    $_SESSION['connect'] = true;
    header('location:index.php');
    die;
}