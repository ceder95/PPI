<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> MiTienda - Carrito </title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="inicio.html">Mi<span>Tienda</span></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="usuario.php"><span class="cart-amunt">
                        <?php
                            if(isset($_SESSION["usuario"])){
                                echo $_SESSION['usuario'];
                                $usr=$_SESSION["usuario"];
                            }
                            else{
                                header("Location:ingresar.php");
                            }
                            ?>
                        </span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="inicio.html">Inicio</a></li>
                        <li><a href="tienda.php?busqueda=&categoria=0&marca=0">Tienda</a></li>
                        <li class="active"><a href="carrito.php">Carrito</a></li>
                        <li><a href="ingresar.php">Ingresar</a></li>
                        <li><a href="registro.php">Registrarse</a></li>
                        <li><a href="contacto.html">Contacto</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Carrito</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">                
                <div class="col-md-10"> 
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="comprar.php">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Producto</th>
                                            <th class="product-name">Precio</th>
                                            <th class="product-quantity">Cantidad</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $con=mysqli_connect("localhost", "root", "root", "tiendavirtual");
                                        if(mysqli_connect_errno()){
                                            echo "Conexión fallida: ".mysqli_connect_error();
                                        }else{
                                            $sql="SELECT usuarios.id, carrito.producto, productos.nombre, carrito.cantidad, productos.precio, carrito.id FROM carrito, usuarios, productos WHERE usuarios.usuario='$usr' and usuarios.id=carrito.usuario and productos.id=carrito.producto";
                                            $res=mysqli_query($con,$sql);
                                            $total=0;
                                            while($row=mysqli_fetch_array($res)){ ?>
                                            <tr class="cart_item">
                                                <td class="product-remove">
                                                    <a title="Remove this item" class="remove" href="borrar.php?id=<?php echo $row[5];?>">X</a> 
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="producto.php?id=<?php echo $row[1];?>"><img width="145" height="145" alt="<?php echo $row[1];?>" class="shop_thumbnail" src="img/producto<?php echo $row[1];?>.jpg"></a>
                                                </td>
                                            <td class="product-name">
                                                <a href="producto.php?id=<?php echo $row[1];?>"><?php echo $row[2];?></a> 
                                            </td>
                                            <td class="product-name">
                                                <a href="producto.php?id=<?php echo $row[1];?>"><?php echo $row[4];?></a> 
                                            </td>
                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="number" size="4" class="input-text qty text" name="cantidad" value="<?php echo $row[3];?>" min="1" step="1">
                                                </div>
                                            </td>

                                            <td class="product-name">
                                                <span>
                                                <?php
                                                    $precio = intval($row[3])*intval(str_replace("$","",$row[4]));
                                                    $total+=$precio;
                                                    echo " $".$precio;
                                                ?>
                                                 </span> 
                                            </td>
                                        </tr>
                                        <?php   }
                                        }
                                        mysqli_close($con);
                                        ?>
                                        
                                        <tr>
                                            <td class="product-thumbnail" colspan="4">&nbsp;</td>
                                            <td class="actions" colspan="6">
                                                <input type="submit" value="Actualizar" name="actualizar" class="button">                           &nbsp; &nbsp; &nbsp;
                                                <input type="submit" value="Comprar" name="comprar" class="checkout-button button alt wc-forward">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <div class="cart_totals" style="padding-left:18%;">
                                <h2>Total: <?php echo "$".$total ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>