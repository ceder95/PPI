<?php
$accion=$_POST['comprar'];
if($accion=="Comprar"){
    include("comprar.php");
}else if($accion=="Actualizar"){
    include("actualizarcarrito.php");    
}
?>