<?php

// ALERT
function alert($couleur = "success", $message){ ?>
    <div class="alert alert-<?= $couleur; ?>" role="alert">
        <?= $message; ?>
    </div>
<?php }


function isConnect(){
    if (isset($_SESSION['connect']) && $_SESSION['connect'] == true){
        return true;
    }
    return false;
}

function checkRoles($id, $bdd){
    if (intval($id) <= 0){
        // erreur
        return false;
    }
    $sql = 
    'SELECT libelle 
     FROM role_utilisateur 
     INNER JOIN role 
     ON role.id = role_utilisateur.id_role 
     WHERE role_utilisateur.id_utilisateur = ?';
     $req = $bdd->prepare($sql);
     $req->execute([$id]);
     // ATTENTION FETCH_NUM POUR LE MERGE !!!!!!!!!
     $roles = $req->fetchAll(PDO::FETCH_NUM);
     // vérif si 1 rôle ou +
     if (count($roles) > 1){
         // si + de 1 roles alors on merge (on doit merge car le retour de la requete est sous la forme d'un tableau qui contient 2 tableau en element)
         $roles = array_merge($roles[0], $roles[1]);
     }else{
         // sinon on recupere le role de l'utilisateur (qui a forcement 0 pour index car la bdd retourne un tableau (qui comment toujours a 0!!))
         $roles = $roles[0];
     }
     /**
      * on retourne le tableau 
      * normalement on devrait stocké directement le tableau en session 
      * cela permet d'avoir une actualisation a chaque appel de la fonction
      */
      $_SESSION['user']['roles'] = $roles;
    return true;
}

/**
 * isAdmin() 
 * Fonction qui retourne un booléan 
 * en fonction de si l'utilisateur a le rôle d'administrateur ou non
 * @return boolean
 */
function isAdmin(){
    /**
     * Doit vérifier si le tableau ['roles'] en session contient le nom du role recherché
     * Si oui alors l'utilisateur a le role recherché
     * Sinon l'utilisateur n'a pas le role recherché
     */
    return in_array('Admin', $_SESSION['user']['roles']);
}
/**
 * isRoot() 
 * Fonction qui retourne un booléan 
 * en fonction de si l'utilisateur a le rôle root ou non
 * @return boolean
 */
function isRoot(){
    /**
     * Doit vérifier si le tableau ['roles'] en session contient le nom du role recherché
     * Si oui alors l'utilisateur a le role recherché
     * Sinon l'utilisateur n'a pas le role recherché
     */
    return in_array('root', $_SESSION['user']['roles']);
}

/**
 * isSalarie() 
 * Fonction qui retourne un booléan 
 * en fonction de si l'utilisateur a le rôle de salarié ou non
 * @return boolean
 */
function isSalarie(){
    /**
     * Doit vérifier si le tableau ['roles'] en session contient le nom du role recherché
     * Si oui alors l'utilisateur a le role recherché
     * Sinon l'utilisateur n'a pas le role recherché
     */
    return in_array('Salarié', $_SESSION['user']['roles']);
}


/**
 * getCategories()
 * Fonction qui permet de recuperer les catégorie qui sont liés a un livre
 * @return mixed
 */
function getCategories($_id_livre, $_bdd){
    // GENERER LA REQ SQL qui permet de recuperer les catégories par rapport a un ID de livre
    $sql = 'SELECT categorie.libelle 
    FROM categorie_livre 
    INNER JOIN categorie ON categorie_livre.id_categorie = categorie.id 
    WHERE categorie_livre.id_livre = ?';
    // on prepare la req
    $req = $_bdd->prepare($sql);
    // on execute la req avec en param l'id du livre rechercher
    $req->execute([$_id_livre]);
    // on recup les data sous forme de tableau associatif
    $categories = $req->fetchAll(PDO::FETCH_ASSOC);
    // on créer un tableau qui va permettre de stocker les catégories
    $cat_livre = [];
    // on boucle sur la liste des catégories recu
    foreach ($categories as $categorie) {
        // a cause du fetchAll on recoit un tableau de tableau
        // var_dump($categorie);
        // var_dump(implode($categorie));
        // on stock la valeur que contient le "sous-tableau" grace a la fonction implode qui permet de transformer un array en string 
        $cat_livre[] = implode($categorie);
    }
    // on retourne le tableau des catégories sous forme de chaine de caractères
    return implode(', ', $cat_livre);
}


/**
 * getCategories()
 * Fonction qui permet de recuperer les auteurs qui sont liés a un livre
 * @return mixed
 */
function getAuteurs(){
    
}