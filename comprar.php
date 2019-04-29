<?php
                session_start();
                $usr = $_SESSION["usuario"];
                $con=mysqli_connect("localhost", "root", "root", "tiendavirtual");
                if(mysqli_connect_errno()){
                    echo "Conexión fallida: ".mysqli_connect_error();
                }else{
                    $sql = "select c.id, c.cantidad, c.usuario, c.producto from usuarios u, carrito c where  u.id=c.usuario and  u.usuario='$usr'";
                    $res=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($res)){
                        $sql1 = "insert into compras (cantidad, usuario, producto) values ($row[1],$row[2],$row[3])";
                        if(mysqli_query($con,$sql1)){
                            $sql2 = "select id, cantidad from productos where id=$row[3]";
                            if(mysqli_query($con,$sql2)){
                               $sql3="update productos set cantidad=cantidad-$row[1] where id=$row[0]";
                                if(!mysqli_query($con,$sql3)){
                                    die("Error al actualizar tienda: ".mysqli_error($con));
                                }
                            }
                            $sql2 = "delete from carrito where id=$row[0]";
                            if(!mysqli_query($con,$sql2)){
                                die("Error al vaciar carrito: ".mysqli_error($con));
                            }
                        }else{
                            die("Error al comprar: ".mysqli_error($con));
                        }   
                    }
                    header("Location:usuario.php");
                }
                mysqli_close($con);
?>