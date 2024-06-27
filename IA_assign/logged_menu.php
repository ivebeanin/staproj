<?php 
    if(isset($_SESSION["UID"])){
        include 'profile.php';
    }
    else {
        include 'menu.php';
    }
    ?>
