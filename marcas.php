<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MiTienda - Marcas </title>
    
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
                            if(isset($_SESSION)){
                                echo $_SESSION['usuario'];
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
                        <li><a href="productos.php?busqueda=&categoria=0&marca=0">Tienda</a></li>
                        <li><a href="compras.php">Compras</a></li>
                        <li><a href="carritos.php">Carritos</a></li>
                        <li  class="active"><a href="marcas.php">Marcas</a></li>
                        <li><a href="categorias.php">Categorias</a></li>
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
                        <h2>Marcas</h2>
                    </div>
                    <div class="product-option-shop" style="margin-top:0px; margin-left:5%; font-size:18px; font-weight:520;">
                        <a class="add_to_cart_button" href="nuevamarca.php">Nueva</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                   <div class="col-md-10"> 
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-name">Id</th>
                                        <th class="product-name">Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $con=mysqli_connect("localhost", "root", "root", "tiendavirtual");
                                    if(mysqli_connect_errno()){
                                        echo "Conexión fallida: ".mysqli_connect_error();
                                    }else{
                                        $sql = "select * from marcas";
                                        $res=mysqli_query($con,$sql);
                                        while($row=mysqli_fetch_array($res)){ ?>
                                        <tr class="cart_item">
                                            <td>
                                                <div class="product-option-shop" style="margin-top:0px; margin-left:5%;">
                                                    <a class="add_to_cart_button" href="modificarmarca.php?id=<?php echo $row["id"];?>">Modificar</a>
                                                </div>
                                            </td>
                                            <td class="product-name">
                                                <h3><?php echo $row["id"] ?></h3>
                                            </td>
                                            <td class="product-name">
                                                <h3><?php echo $row["nombre"]; ?> </h3> 
                                            </td>
                                        </tr>
                                  <?php }
                                    } 
                                mysqli_close($con);?>
                                    </tbody>
                                </table>
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