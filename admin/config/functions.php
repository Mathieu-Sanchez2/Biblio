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