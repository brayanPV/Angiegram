<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    unset($_SESSION["newsession"]);
    session_destroy();
    
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar Sesión</title>
    <link rel="icon" href="./view/imagenes/logo.png">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <div class="modal-dialog text-center">
        <div class="col-sm-8  main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="./view/imagenes/logo.png" alt="">
                    <h1>AngieGram</h1>
                    <p>¿No tienes cuenta? </p>

                </div>
                <a href="./view/html/registro.php">REGISTRATE</a>
                <form class="col-12" action="" method="post">
                    <div class="form-group" id="user-group">
                        <input class="form-control" type="email" placeholder="Correo electronico" name="email" values=""/>
                    </div>
               
                    <div class="form-group" id="contraseña-group">
                        <input class="form-control" type="password" placeholder="Contraseña" name="pass" values="" />
                    </div>

                    <button class="btn btn-primary" type="submit"><i class="fas fa-sign-in-alt"></i> Entrar</button>
                   
         </form>
         <?php
         if (isset($_POST["email"])){
            require_once 'controller/Controller.php';
            $email=$_POST["email"];
            $pass=$_POST["pass"];
            $send= new Controller();
            $res= $send->loginController($email,$pass);
            
            echo $res;
        }
        ?>
                <div class="col-12 forgot">
                    <a href="">Recordar Contraseña</a> <br><br>

                    <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
                    <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
                    <a href="#" class="mx-2" role="button"><i class="fab fa-google light-blue-text"></i></a>

                </div>
            </div>

        </div>

    </div>

</body>

</html>