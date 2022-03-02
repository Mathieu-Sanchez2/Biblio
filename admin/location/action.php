<?php 
include '../config/config.php';
if (!isConnect()){
    header('location:' . URL_ADMIN . 'login.php');
    die; 
}
include '../config/bdd.php';

if (isset($_POST['btn_add_location'])){
    $id_usager = intval($_POST['usager']);
    $id_livre = intval($_POST['livre']);
    $date_debut = $_POST['date_debut'];
    $date_fin = (!empty($_POST['date_fin'])) ? $_POST['date_fin'] : NULL;
    // ON RECUPERE L'ETAT DU LIVRE LOUER
    $sql = "SELECT id_etat FROM etat_livre WHERE id_livre = ?";
    $req = $bdd->prepare($sql);
    $req->execute([$id_livre]);
    $etat = $req->fetch(PDO::FETCH_ASSOC);
    $etat_debut = $etat['id_etat'];

    // ENREGISTREMENT DE LA LOCATION
    $sql = "INSERT INTO location VALUES (NULL, :usager, :livre, :date_debut, :date_fin, :etat_debut, NULL, 0)";
    $req = $bdd->prepare($sql);
    $data = [
        ':usager' => $id_usager,
        ':livre' => $id_livre,
        ':date_debut' => $date_debut,
        ':date_fin' => $date_fin,
        ':etat_debut' => $etat_debut
    ];
    if (!$req->execute($data)){
        header('location:add.php');
        die;
    }
    $sql = "UPDATE livre SET disponibilite = 1 WHERE id=?";
    $req=$bdd->prepare($sql);
    $req->execute([$id_livre]);
    header('location:index.php');
    die;
}