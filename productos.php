<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MiTienda - Tienda </title>
    
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
                        <li class="active"><a href="productos.php">Tienda</a></li>
                        <li><a href="compras.php">Compras</a></li>
                        <li ><a href="marcas.php">Marcas</a></li>
                        <li><a href="categorias.php">Categorias</a></li>
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
                        <h2>Tienda</h2>
                    </div>
                    <div class="product-option-shop" style="margin-top:0px; margin-left:5%; font-size:18px; font-weight:520;">
                        <a class="add_to_cart_button" href="nuevoproducto.php">Nuevo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                    <?php
                    $con=mysqli_connect("localhost", "root", "root", "tiendavirtual");
                    if(mysqli_connect_errno()){
                        echo "Conexión fallida: ".mysqli_connect_error();
                    }else{
                        $sql = "select * from productos";
                        $res=mysqli_query($con,$sql);
                        while($row=mysqli_fetch_array($res)){ ?>
                        <div class="col-md-3 col-sm-6" style="height:330px;">
                            <div class="single-shop-product text-center">
                                <div class="product-upper">
                                    <img style="height:130px;" src="img/producto<?php echo $row["id"]; ?>.jpg" alt="<?php echo $row["nombre"]; ?>">
                                </div>
                                <h2 style="color: #1abc9c;"><?php echo $row["nombre"];?></h2>
                                <div class="product-carousel-price">
                                    <ins>Cantidad: <?php echo $row["cantidad"];?></ins> <br/>
                                    <ins><?php echo $row["precio"]; ?></ins>
                                </div>
                                <div class="product-option-shop">
                                    <a class="add_to_cart_button" href="modificarproducto.php?id=<?php echo $row["id"]; ?>">Modificar</a>
                                </div>   
                                <div class="product-option-shop" style="margin-top:5px;">
                                    <a class="add_to_cart_button" href="borrarproducto.php?id=<?php echo $row["id"]; ?>">Eliminar</a>
                                </div>   
                            </div>
                        </div>                
                <?php   }
                    }
                mysqli_close($con); ?>
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