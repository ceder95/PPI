<?php
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $cantidad = $_POST["cantidad"];
    $precio= $_POST["precio"];
    $marca = $_POST["marca"];
    $categoria = $_POST["categoria"];
    $con=mysqli_connect("localhost", "root", "root", "tiendavirtual");
    if(mysqli_connect_errno()){
        echo "Conexión fallida: ".mysqli_connect_error();
    }else{
        $sql = "update productos set nombre='$nombre', descripcion='$descripcion', precio='$precio', cantidad=$cantidad, marca=$marca, categoria=$categoria where id=$id";
        if(mysqli_query($con,$sql)){ ?>
                    <script type="text/javascript">
                            window.location.href = 'productos.php';
                    </script>
                    <?php
        }else{
            die("Error al actualizar: ".mysqli_error($con));
        }   
    }
    mysqli_close($con);
?>