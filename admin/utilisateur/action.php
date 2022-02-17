<?php

include '../config/config.php';
if (!isConnect()){
    header('location:' . URL_ADMIN . 'login.php');
    die; 
}
// ACCESIBLE SEULEMENT SI ADMINISTRATEUR
if (!isAdmin()){
    header('location:' . URL_ADMIN . 'index.php');
    die; 
}
include PATH_ADMIN . 'config/bdd.php';


 if (isset($_POST['btn_add_utilisateur'])){
     $nom = htmlentities($_POST['nom']);
     $prenom = htmlentities($_POST['prenom']);
     $pseudo = htmlentities($_POST['pseudo']);
     $mail = htmlentities($_POST['mail']);
     $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
     $numero_telephone = htmlentities($_POST['numero_telephone']);
     $adresse = htmlentities($_POST['adresse']);
     $ville = htmlentities($_POST['ville']);
     $code_postal = htmlentities($_POST['code_postal']);
     $avatar = $_FILES['avatar']['name'];
     $dossier_temporaire = $_FILES['avatar']['tmp_name'];
     $dossier_destination = PATH_ADMIN . 'img/avatar/' . $avatar;
     if (!move_uploaded_file($dossier_temporaire, $dossier_destination)){
        // erreur dans le deplacement du fichier
        die('erreur dans le deplacement du fichier');
     }
    // GESTION DE BDD
     $sql = "INSERT INTO utilisateur VALUES (NULL, :nom, :prenom, :pseudo, :mail, :mdp, :numero_telephone, :avatar, :adresse, :ville, :code_postal)";
     $req = $bdd->prepare($sql); 
     $data = [
        ':nom' => $nom,    
        ':prenom' => $prenom,    
        ':pseudo' => $pseudo,    
        ':mail' => $mail,    
        ':mdp' => $mdp,    
        ':numero_telephone' => $numero_telephone,    
        ':avatar' => $avatar,    
        ':adresse' => $adresse,    
        ':ville' => $ville,    
        ':code_postal' => $code_postal  
     ];
    if (!$req->execute($data)){
        // erreur ajout en bdd
        header('location:add.php');
        die;
    }
    header('location:index.php');
    die;
}

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    if ($id <= 0){
        // erreur
        header('location:index.php');
        die;
    }
   /**
    * GESTION DE L'ILLUSTRATION 
     * 1) recuperer le nom de l'avatar user
     * 2) vérifier si il existe dans le dossier
     * 3) le supprimer
    */
    $sql = "SELECT avatar FROM utilisateur WHERE id = ?";
    $req = $bdd->prepare($sql);
    $req->execute([$id]);
    $hold_avatar = $req->fetch(PDO::FETCH_ASSOC);
    $hold_avatar = $hold_avatar['avatar'];
    $dossier_avatar = PATH_ADMIN . 'img/avatar/' . $hold_avatar;
    if (!is_file($dossier_avatar)){
        // erreur l'avatar n'existe pas ou plus dans le dossier
        header('location:index.php');
        die;
    }
    if (!unlink($dossier_avatar)){
        // erreur l'avatar est impossible a supprimer
        header('location:index.php');
        die;
    }
    /**
     * SUPPRESSION DE l'USER EN BDD
     */
    $sql = "DELETE FROM utilisateur WHERE id = ?";
    $req = $bdd->prepare($sql);
    if (!$req->execute([$id])){
        // erreur dans la suppression en bdd
        header('location:index.php');
        die;
    }
    header('location:index.php');
    die;
}


