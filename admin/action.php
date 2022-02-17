<?php 
    include 'config/config.php';
    include 'config/bdd.php';

if (isset($_POST['btn_connect'])){
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
    if (!$user){
        // erreur utilisateur inconnu
        $_SESSION['connect'] = false;
        header('location:login.php');
        die;
    }
    if (!password_verify($mdp, $user['mot_de_passe'])){
        // erreur utilisateur existe mais mauvais mdp
        $_SESSION['connect'] = false;
        header('location:login.php');
        die;
    }
    unset($user['mot_de_passe']);
    $_SESSION['user'] = $user;
    $_SESSION['date_connect'] = new DateTime();   
    checkRoles($user['id'], $bdd);    
    $_SESSION['connect'] = true;
    header('location:index.php');
    die;
}

if (isset($_GET['connect']) && $_GET['connect'] == "false"){
    // session_destroy(); (cf doc)
    $_SESSION = [];
    header('location:' . URL_ADMIN . 'index.php');
    die;
}