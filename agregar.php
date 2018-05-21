<?php
                session_start();
                $usr = $_SESSION["usuario"];
                $producto = $_POST["producto"];
                $cantidad = $_POST["cantidad"];
                echo "$usr $producto $cantidad";
                $con=mysqli_connect("localhost", "root", "root", "tiendavirtual");
                if(mysqli_connect_errno()){
                    echo "Conexión fallida: ".mysqli_connect_error();
                }else{
                    $sql = "select * from usuarios where usuario='$usr'";
                    $res=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($res)){
                        $uid=$row["id"];
                        var_dump($uid);
                        $sql2 = "INSERT INTO carrito (usuario,producto,cantidad) VALUES ($uid,$producto,$cantidad)";
                        if(mysqli_query($con,$sql2)){ 
                            header("Location:carrito.php");
                        }else{
                            die("Error al registrar: ".mysqli_error($con));
                        }   
                    }
                }
                mysqli_close($con);
?>