<?php
                session_start();
                $usr = $_SESSION["usuario"];
                $con=mysqli_connect("localhost", "root", "root", "tiendavirtual");
                if(mysqli_connect_errno()){
                    echo "Conexión fallida: ".mysqli_connect_error();
                }else{
                    $sql = "select * from usuarios where usuario='$usr'";
                    $res=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($res)){
                        $uid=$row["id"];
                        $sql2 = "select * from carrito where usuario=$uid";
                        $res2=mysqli_query($con,$sql2);
                        while($rows=mysqli_fetch_array($res2))
                        $producto=$rows["producto"];
                        $cantidad=$rows["cantidad"];
                        $sql3 = "INSERT INTO compras (usuario,producto,cantidad) VALUES ($uid,$producto,$cantidad)";
                        if(mysqli_query($con,$sql3)){
                            $sql4 = "delete from carrito where producto =$producto";
                            if(!mysqli_query($con,$sql4)){ 
                                die("Error al comprar: ".mysqli_error($con));
                            }
                        }else{
                            die("Error al comprar: ".mysqli_error($con));
                        }
                    }
                    //header("Location:usuario.php");
                }
                mysqli_close($con);
?>