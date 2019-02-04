<?php
                $id = $_GET["id"];
                $con=mysqli_connect("localhost", "root", "root", "tiendavirtual");
                if(mysqli_connect_errno()){
                    echo "Conexión fallida: ".mysqli_connect_error();
                }else{
                    $sql = "delete from carrito where id=$id";
                    if(mysqli_query($con,$sql){ 
                        header("Location:carrito.php");
                    }else{
                        die("Error al elimiar producto de carrito: ".mysqli_error($con));
                    }
                }
                mysqli_close($con);
?>