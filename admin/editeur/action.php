<?php 
    include '../config/config.php';
    if (!isConnect()){
        header('location:' . URL_ADMIN . 'login.php');
        die; 
    }
    include '../config/bdd.php';
    if (isset($_POST['btn_update_editeur'])){
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
        $denomination = htmlentities($_POST['denomination']);
        $siret = htmlentities($_POST['siret']);
        $adresse = htmlentities($_POST['adresse']);
        $code_postal = htmlentities($_POST['code_postal']);
        $ville = htmlentities($_POST['ville']);
        $mail = htmlentities($_POST['mail']);
        $numero_tel = htmlentities($_POST['numero_tel']);

        $sql = "UPDATE editeur SET denomination = :denomination, siret = :siret, adresse = :adresse, code_postal = :code_postal, ville = :ville, mail = :mail, numero_tel = :numero_tel WHERE id = :id";
        $req = $bdd->prepare($sql);
        $data = [
            ':denomination' => $denomination,
            ':siret' => $siret,
            ':adresse' => $adresse,
            ':code_postal' => $code_postal,
            ':ville' => $ville,
            ':mail' => $mail,
            ':id' => $id,
            ':numero_tel' => $numero_tel,
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
        $sql = "DELETE FROM editeur WHERE id = ? LIMIT 1";
        $req = $bdd->prepare($sql);
        if (!$req->execute([$id])) {
            // erreur 
            header('location:index.php');
            die;
        }
        header('location:index.php');
        die;
    }

    if (isset($_POST['btn_add_editeur'])){
        $denomination = htmlentities($_POST['denomination']);
        $siret = htmlentities($_POST['siret']);
        $adresse = htmlentities($_POST['adresse']);
        $code_postal = htmlentities($_POST['code_postal']);
        $ville = htmlentities($_POST['ville']);
        $mail = htmlentities($_POST['mail']);
        $numero_tel = htmlentities($_POST['numero_tel']);

        $sql = "INSERT INTO editeur VALUES (NULL, :denomination, :siret, :adresse, :ville, :code_postal, :mail, :numero_tel)";
        $req = $bdd->prepare($sql);
        $data = [
            ':denomination' => $denomination,
            ':siret' => $siret,
            ':adresse' => $adresse,
            ':code_postal' => $code_postal,
            ':ville' => $ville,
            ':mail' => $mail,
            ':numero_tel' => $numero_tel,
        ];
        if (!$req->execute($data)){
            //erreur
            header('location:update.php?id=' . $id);
            die;
        }
        header('location:index.php');
        die;
    }