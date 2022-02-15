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
     // vérif si 1 ou + de role(s)
     if (count($roles) > 1){
         // si + de 1 roles alors on merge
         $roles = array_merge($roles[0], $roles[1]);
     }else{
         $roles = $roles[0];
     }
     return $roles;
}