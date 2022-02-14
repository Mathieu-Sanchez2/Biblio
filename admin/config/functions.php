<?php

// ALERT
function alert($couleur = "success", $message){ ?>
    <div class="alert alert-<?= $couleur; ?>" role="alert">
        <?= $message; ?>
    </div>
<?php }


function isConnect(){
    $a $ true;
    if (isset($_SESSION['connect']) && $_SESSION['connect'] = true || $a = true){
        return true;
    }
    return false;
}