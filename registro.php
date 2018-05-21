<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MiTienda - Registro </title>
    
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
                        <li><a href="carrito.php">Carrito</a></li>
                        <li><a href="ingresar.php">Ingresar</a></li>
                        <li class="active"><a href="registro.php">Registrarse</a></li>
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
                        <h2>Registro</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
      $nomErr = $apErr = $usrErr = $passErr = $correoErr = "";
      $nombre=$apellido=$usuario=$pass1=$pass2=$correo="";
      if($_SERVER["REQUEST_METHOD"] == "POST"){
          if(empty($_POST["nombre"])){
              $nomErr="Nombre necesario";
          }else{
              $nombre=test_input($_POST["nombre"]);
              if(!preg_match("/^[a-zA-Z ]*$/",$nombre)){
                  $nomErr="Solo se permiten letras y <br id='sin_espacio'/> espacios en blanco";
                  $nombre="";
              }else{
                    $nomErr="";
                }
          }
          if(empty($_POST["apellido"])){
              $apErr="Apellido necesario";
          }else{
              $apellido=test_input($_POST["apellido"]);
              if(!preg_match("/^[a-zA-Z ]*$/",$apellido)){
                  $apErr="Solo se permiten letras y <br id='sin_espacio'/> espacios en blanco";
                  $apellido="";
              }else{
                    $apErr="";
              }
          }
          if(empty($_POST["usuario"])){
              $usrErr="Usuario necesario";
          }else{
              $usuario=test_input($_POST["usuario"]);
              if(!preg_match("/^[a-zA-Z0-9]*$/",$usuario)){
                  $usrErr="Solo se permiten letras y números";
                  $usuario="";
              }else{
                    $usrErr="";
              }
          }
          if(empty($_POST["pwd1"])){
              $passErr="Contraseña necesaria";
          }else{
              $pass1=test_input($_POST["pwd1"]);
          }
          if(empty($_POST["pwd2"])){
              $passErr="Repetir contraseña";
          }else{
              $pass2=test_input($_POST["pwd2"]);
          }
          if($pass1!=$pass2){
              $passErr="Contraseña no coincide";
              $pass2=$pass1="";
          }else{
              $passErr="";
          }
          if(empty($_POST["correo"])){
                $correoErr = "Correo necesario";
          }else{
                $correo = test_input($_POST["correo"]);
                if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                    $correoErr = "Correo inválido";
                    $correo="";
                }else{
                    $correoErr="";
                }
            }
      }
      function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
      }
    ?>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <form style="margin-left: 25%;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                            <h2>Nombre</h2>
                            <div class="error">* <?php echo $nomErr."<br/>"; ?></div>
                            <input type="text" name="nombre" maxlength="50" value="<?php echo $nombre; ?>">
                            <br/> <br/>
                            <h2>Apellido</h2>
                            <div class="error">* <?php echo $apErr; ?></div>
                            <input type="text" name="apellido" maxlength="50" value="<?php echo $apellido; ?>"> 
                            <br/> <br/>
                            <h2>Usuario</h2>
                            <span class="error">* <?php echo $usrErr; ?></span><br/>
                            <input type="text" name="usuario" autocomplete="off" maxlength="30" value="<?php echo $usuario; ?>"> 
                            <br/> <br/>
                            <h2>Contraseña</h2>
                            <span class="error">* <?php echo $passErr; ?></span><br/>
                            <input type="text" name="pwd1" autocomplete="off" maxlength="40" value="<?php echo $pass1; ?>"> 
                            <br/> <br/>
                            <h2>Repetir Contraseña</h2>
                            <span class="error">*</span><br/>
                            <input type="text" name="pwd2" autocomplete="off" maxlength="40" value="<?php echo $pass2 ?>"> 
                            <h2>Correo</h2>
                            <span class="error">* <?php echo $correoErr; ?></span><br/>
                            <input type="email" name="correo" autocomplete="off" maxlength="60" value="<?php echo $correo; ?>">
                            <br/><br/>
                            <input class="add_to_cart_button" style="padding: 10px 18%;" type="submit" value="Registrar"> <br/><br/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <?php 
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if($nomErr == "" && $apErr == "" && $usrErr == "" && $passErr == "" && $correoErr== ""){
                $con=mysqli_connect("localhost", "root", "root", "tiendavirtual");
                if(mysqli_connect_errno()){
                    echo "Conexión fallida: ".mysqli_connect_error();
                }else{
                    $sql = "INSERT INTO usuarios (nombre,apellido,usuario,password,correo) VALUES ('$nombre','$apellido','$usuario','$pass1','$correo')";
                    if(mysqli_query($con,$sql)){ 
                        header("Location:ingresar.php");
                    }else{
                        die("Error al registrar: ".mysqli_error($con));
                    }   
                }
                mysqli_close($con);
            }
        }
      ?>
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