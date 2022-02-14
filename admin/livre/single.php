<?php 
    if (!isConnect()){
        header('location:' . URL_ADMIN . 'login.php');
        die; 
    }