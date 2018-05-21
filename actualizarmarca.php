<?php
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $con=mysqli_connect("localhost", "root", "root", "tiendavirtual");
    if(mysqli_connect_errno()){
        echo "Conexión fallida: ".mysqli_connect_error();
    }else{
        $sql = "update marcas set nombre='$nombre' where id=$id";
        if(mysqli_query($con,$sql)){ ?>
                    <script type="text/javascript">
                            window.location.href = 'marcas.php';
                    </script>
                    <?php
        }else{
            die("Error al actualizar: ".mysqli_error($con));
        }   
    }
    mysqli_close($con);
?>