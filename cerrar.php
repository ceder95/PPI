<?php
    session_start();
    if(isset($_SESSION)){
        session_destroy();
        unset($_SESSION);
        header("Location:ingresar.php");
    }
?>