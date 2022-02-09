<?php 

$dsn = 'mysql:dbname=bibliotheque_2;host=localhost';
$utilisateur = 'bibliotheque';
$mot_de_passe = '0dmaSLwNk2d57FXE';    

try {
    $bdd = new PDO($dsn, $utilisateur, $mot_de_passe, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}catch (PDOException $erreur){
    // echo 'erreur : ' . $erreur->getMessage();
    die('Probleme de bdd');
}

?>