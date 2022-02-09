<?php

// ALERT
function alert($couleur = "success", $message){ ?>
    <div class="alert alert-<?= $couleur; ?>" role="alert">
        <?= $message; ?>
    </div>
<?php }