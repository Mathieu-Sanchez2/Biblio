<?php

// ALERT
function alert($couleur = "success", $message){ ?>
    <div class="alert alert-<?= $couleur; ?>" role="alert">
        <?= $message; ?>
    </div>
<?php }


function isConnect(){
    if (isset($_SESSION['connect']) && $_SESSION['connect'] = true){
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
    //  var_dump(count($roles));
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
     return $roles;
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
}