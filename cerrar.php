<?php
    if(isset($_SESSION)){
    session_destroy();
    $_SESSION["usuario"]=null;
    $_SESSION["pass"]=null;
    }
    header("Location:ingresar.php");
?>