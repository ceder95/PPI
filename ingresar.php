<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MiTienda - Iniciar sesión </title>
    
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
                        <a href="cart.html"><span class="cart-amunt"> Carrito </span> <i class="fa fa-shopping-cart"></i></a>
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
                        <li><a href="tienda.php">Tienda</a></li>
                        <li><a href="carrito.html">Carrito</a></li>
                        <li class="active"><a href="ingresar.php">Ingresar</a></li>
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
                        <h2>Ingresar</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        $usr = $pass = "";
        $err = "";
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($_POST["usuario"])){
                $err="Usuario vacío";
            }else{
                $usr=test_input($_POST["usuario"]);
                $con=mysqli_connect("localhost", "root", "root", "tiendavirtual");
                if(mysqli_connect_errno()){
                    echo "Conexión fallida: ".mysqli_connect_error();
                }else{
                    $sql1="select usuario from usuarios where usuario = '$usr'";
                    $res1=mysqli_query($con,$sql1);
                    if($rowa = mysqli_fetch_array($res1)){
                        if(empty($_POST["pwd"])){
                            $err="Contraseña vacia";
                        }else{
                            $pass=test_input($_POST["pwd"]);
                            $sql2="select usuario, password from usuarios where usuario ='$usr' and password ='$pass'";
                            $res2 = mysqli_query($con,$sql2);
                            if($rowb = mysqli_fetch_array($res2)){ ?>
                                <script type="text/javascript">
                                    window.location.href = 'tienda.php';
                                </script>
                            <?php
                            }else{
                                $err="Contraseña incorrecta";
                            }
                        }    
                    }else{
                       $err="Usuario no encotrado";
                    }
                }
            }
        }
      ?>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <form style="padding-left: 25%;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                            <div> <?php echo $err;?> </div>
                            <h2>Usuario</h2>
                            <input type="text" name="usuario" maxlength="30" value="<?php echo $usr ?>">
                            <h2>Contraseña</h2>
                            <input type="password" name="pwd" maxlength="40"> <br/><br/>
                            <input class="add_to_cart_button" style="padding: 10px 19.5%;" type="submit" value="INGRESAR"> <br/><br/>
                        </form>
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