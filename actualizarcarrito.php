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
                        $can=$_POST['cantidad'.$row[0]];
                        $sql1 = "update carrito set cantidad=$can where id=$row[0]";
                        if(!mysqli_query($con,$sql1)){
                            die("Error al actualizar carrito: ".mysqli_error($con));
                        }
                    }
                    header("Location:carrito.php");
                }
                mysqli_close($con);
?>