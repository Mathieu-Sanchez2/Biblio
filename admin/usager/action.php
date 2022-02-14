<?php 
    if (!isConnect()){
        header('location:' . URL_ADMIN . 'login.php');
        die; 
    }
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