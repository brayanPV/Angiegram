<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrar</title>
    <link rel="icon" href="../imagenes/logo.png">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>

<body>

    <div class="modal-dialog text-center">
        <div class="col-sm-8  main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="../imagenes/logo.png" alt="">
                    <h1>AngieGram</h1>
                    <h4>REGISTRO </h4>

                </div>
                <p class="cuenta">Ya Tiene Cuenta <a href="../../index.php">ACCEDE</a></p>

                <form class="col-12 form" action="" method="POST">
                    <div class="form-group" id="user-group">
                        <input class="form-control" type="text" placeholder="Usuario" name="usuario" />
                    </div>
                    
                    <div class="form-group" id="email-group">
                        <input class="form-control" type="email" placeholder="Correo"  name="email"/>
                    </div>
                    
                    <div class="form-group" id="nombre-group">
                        <input class="form-control" type="text" placeholder="Nombre" name="nombre" />
                    </div>
                    
                    <div class="form-group" id="apellido-group">
                        <input class="form-control" type="text" placeholder="Apellido"  name="apellido"/>
                    </div>

                     <div class="form-group" id="contraseña-group">
                        <input class="form-control" type="password" placeholder="Contraseña" name="pass" />
                    </div>
                    
                    <div class="form-group" id="nacimiento-group">
                        <input class="form-control" type="date" placeholder="" name="fechaNacimiento" />
                    </div>

                    <input class="checkbox" type="checkbox" id="terminos" name="terminos" value="Bike">
                    <label for="vehicle1">Acepto los terminos y condiciones </label><br>
                    <a href="terminos.html">Ver terminos y condiciones</a>
                    <button class="btn btn-primary" type="submit"><i class="fas fa-sign-in-alt"></i>       Ingresar</button>
                </form>
                <?php
                if(isset($_POST["email"])){
                require_once('../../controller/Controller.php');
                $usuario=$_POST["usuario"];
                $nombre=$_POST["email"];
                $apellido=$_POST["nombre"];
                $email=$_POST["apellido"];
                $pass=$_POST["pass"];
                $fechaNacimiento=$_POST["fechaNacimiento"];
                $send = new Controller();
                $res = $send->registroController($usuario,$email, $nombre, $apellido, $pass, $fechaNacimiento);
                
                echo $res;
                }
                ?>
            </div>

        </div>

    </div>

</body>
<!--https://rogerdudler.github.io/git-guide/index.es.html https://mdbootstrap.com/docs/jquery/forms/basic/ -->

</html>