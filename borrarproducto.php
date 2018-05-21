<?php
    $id = $_GET["id"];
    $con=mysqli_connect("localhost", "root", "root", "tiendavirtual");
    if(mysqli_connect_errno()){
        echo "Conexión fallida: ".mysqli_connect_error();
    }else{
        $sql = "delete from productos where id=$id";
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