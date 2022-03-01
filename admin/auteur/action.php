<?php 
    include '../config/config.php';
    if (!isConnect()){
        header('location:' . URL_ADMIN . 'login.php');
        die; 
    }
    include '../config/bdd.php';
    if (isset($_POST['btn_update_auteur'])){
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
        $id = intval($_POST['id']);
        $nom = htmlentities($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $nom_de_plume = htmlentities($_POST['nom_de_plume']);
        $adresse = htmlentities($_POST['adresse']);
        $code_postal = htmlentities($_POST['code_postal']);
        $ville = htmlentities($_POST['ville']);
        $mail = htmlentities($_POST['mail']);
        $numero = htmlentities($_POST['numero']);

        if (!empty($_FILES['photo']['name'])){
            // si l'editeur souhaite changer la photo
            // on enregistre le nom de la photo
            $photo = $_FILES['photo']['name'];
            // on recupere le nom de la photo actuellement sauvegarder en bdd grace a une requete
            $sql = 'SELECT photo FROM auteur WHERE id = ?';
            $req = $bdd->prepare($sql);
            $req->execute([$id]);
            $hold_photo = $req->fetch(PDO::FETCH_ASSOC);
            $hold_photo = $hold_photo['photo'];
            $chemin_hold_photo = PATH_ADMIN . 'img/photo/' . $hold_photo;
            // GESTION DE L'ANCIENNE PHOTO
            if (!is_file($chemin_hold_photo)){
                // erreur le fichier enregistrer n'existe pas dans le dossier
                header('location:update.php?id=' . $id);
                die;
            }else{
                // si elle existe alors on supprime l'ancienne photo
                if (!unlink($chemin_hold_photo)){
                    // erreur dans la suppresion de la photo
                    header('location:update.php?id=' . $id);
                    die;
                }
            }
            // GESTION DE LA NOUVELLE ILLUSTRATION
            // on enregistre l'endroit ou est le fichier a récuperer
            $dossier_temporaire  = $_FILES['photo']['tmp_name'];
            // on enregistre l'endroit de destination
            $dossier_destination  = PATH_ADMIN . 'img/photo/' . $photo;
            // var_dump($dossier_temporaire, $dossier_destination);
            if (!move_uploaded_file($dossier_temporaire, $dossier_destination)){
                // erreur le document n'as pas était correctement déplacé
                $_SESSION['error_update_photo'] = true;
                header('location:add.php');
                die;
            }
            $sql = "UPDATE auteur SET nom = :nom, prenom = :prenom, nom_de_plume = :nom_de_plume, adresse = :adresse, code_postal = :code_postal, ville = :ville, mail = :mail, numero = :numero, photo = :photo WHERE id = :id";
            $data = [
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':photo' => $photo,
                ':nom_de_plume' => $nom_de_plume,
                ':adresse' => $adresse,
                ':code_postal' => $code_postal,
                ':ville' => $ville,
                ':mail' => $mail,
                ':numero' => $numero,
                ':photo' => $photo,
                ':id' => $id
            ];
        }else{
            $sql = "UPDATE auteur SET nom = :nom, prenom = :prenom, nom_de_plume = :nom_de_plume, adresse = :adresse, code_postal = :code_postal, ville = :ville, mail = :mail, numero = :numero WHERE id = :id";
            $data = [
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':nom_de_plume' => $nom_de_plume,
                ':adresse' => $adresse,
                ':code_postal' => $code_postal,
                ':ville' => $ville,
                ':mail' => $mail,
                ':numero' => $numero,
                ':id' => $id
            ];
        }
        
        $req = $bdd->prepare($sql);
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
        // pour supprimer un livre on doit gerer son illustration
        // on recupere le nom de l'illustration a supprimer
        $sql = "SELECT photo FROM auteur WHERE id = ?";
        $req = $bdd->prepare($sql);
        $req->execute([$id]);
        $nom_photo = $req->fetch(PDO::FETCH_ASSOC);
        // on stock le nom de l'image apres avoir recuperer l'information en bdd
        $nom_photo = $nom_photo['photo'];
        // on vérifie que l'image existe
        $chemin_photo = PATH_ADMIN . 'img/photo/' . $nom_photo;
        if (!is_file($chemin_photo)){
            // erreur l'photo n'existe pas
            $_SESSION['error_delete_photo'] = true;
            header('location:index.php'); 
            die;
        }
        if (!unlink($chemin_photo)){
            // erreur l'photo n'est pas supprimer
            $_SESSION['error_delete_photo'] = true;
            header('location:index.php');
            die;
        }
        $sql = "DELETE FROM auteur WHERE id = ? LIMIT 1";
        $req = $bdd->prepare($sql);
        if (!$req->execute([$id])) {
            // erreur 
            header('location:index.php');
            die;
            }
        header('location:index.php');
        die;
    }

    if (isset($_POST['btn_add_auteur'])){
        $nom = htmlentities($_POST['nom']);
        $prenom = htmlentities($_POST['prenom']);
        $nom_de_plume = htmlentities($_POST['nom_de_plume']);
        $adresse = htmlentities($_POST['adresse']);
        $code_postal = htmlentities($_POST['code_postal']);
        $ville = htmlentities($_POST['ville']);
        $mail = htmlentities($_POST['mail']);
        $numero = htmlentities($_POST['numero']);
        $photo = $_FILES['photo']['name'];
        // GESTION DE LA NOUVELLE PHOTO
        // on enregistre l'endroit ou est le fichier a récuperer
        $dossier_temporaire  = $_FILES['photo']['tmp_name'];
        // on enregistre l'endroit de destination
        $dossier_destination  = PATH_ADMIN . 'img/photo/' . $photo;
        // var_dump($dossier_temporaire, $dossier_destination);
        if (!move_uploaded_file($dossier_temporaire, $dossier_destination)){
            // erreur le document n'as pas était correctement déplacé
            $_SESSION['error_update_photo'] = true;
            header('location:add.php');
            die;
        }
        $sql = "INSERT INTO auteur VALUES (NULL, :nom, :prenom, :nom_de_plume, :adresse, :ville, :code_postal, :mail, :numero, :photo)";
        $req = $bdd->prepare($sql);
        $data = [
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':nom_de_plume' => $nom_de_plume,
            ':adresse' => $adresse,
            ':code_postal' => $code_postal,
            ':ville' => $ville,
            ':mail' => $mail,
            ':numero' => $numero,
            ':photo' => $photo
        ];
        if (!$req->execute($data)){
            //erreur
            header('location:update.php?id=' . $id);
            die;
        }
        header('location:index.php');
        die;
    }