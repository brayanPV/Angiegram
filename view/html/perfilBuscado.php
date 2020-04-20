<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="icon" href="../imagenes/logo.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.16.0/css/mdb.min.css" rel="stylesheet">
    <!-- Nuestro css-->
    <!--    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">-->
    <link rel="stylesheet" type="text/css" href="../../css/style1.css">



</head>

<body>


    <header class="grey lighten-4 mb-3">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-4 align-self-center">
                    <a href="../../login.html"><img src="../imagenes/logo.png" class="d-inline-block" alt="" width="30%"></a>
                    <a href="../../login.html"> <?php session_start();  echo $_SESSION['usuario'];?></a>
                </div>
                <div class="col-4">
                    <form class="form-inline" method="POST">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="usuario">
                        <button class="btn btn-outline-primary" type="submit" name="buscar">Search</button>
                    </form>
                    <?php 
            if(isset($_POST["buscar"])){
            require_once '../../controller/Controller.php';
            $usuario=$_POST["usuario"];
            $send = new Controller();
            $res=$send->buscarPersonasController($usuario);
                    }
                    ?>
                </div>
                <div class="col-4 d-flex flex-row-reverse">
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-secondary " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user" style="width:30; height:30;"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../html/perfil.html">Perfil</a>
                            <a class="dropdown-item" href="#">Siguiendo</a>
                            <a class="dropdown-item" href="#">Seguidores</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Configuración</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../../index.php">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </header>

    <div class="container">
        <div class="row py-4 align-items-center">
            <div class="col-6 my-4 d-flex justify-content-center">
                <div class="icon">
                    <img src="../imagenes/prueba.png" alt="" id="imagen">

                    <ul class="menu">

                        <li class="spread">
                            <a class="unit" href="#"><i class="far fa-thumbs-up"></i></a>
                        </li>

                        <li class="spread">
                            <a class="unit" href="#"><i class="fas fa-location-arrow"></i></a>
                        </li>

                        <li class="spread">
                            <a class="unit" href="#"><i class="fas fa-ban"></i></a>
                        </li>

                        <li class="spread">
                            <a class="unit" href="#"><i class="fas fa-bomb"></i></a>
                        </li>

                        <li class="spread" id="corazon">
                            <a class="unit" href="#"><i class="fas fa-heart"></i></a>
                        </li>

                    </ul>
                </div>
            </div>
 </div>
</div>
    </div>



    <div class="container">
        <div class="row align-items-center">

            <?php 
            include_once'../../controller/Controller.php';
            $control = new Controller();
            $img = $control->mostrarPublicacionesPersonasController();
            //echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
            if($img!=null){
                foreach($img as $r):?>
            <div class="col-3 p-2">
                <?php   echo '<a > <img src="../imagenes/'.$r->foto.'" class="img-fluid"/> </a>';?>
            </div>
            <?php endforeach; 
            }?>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Postear Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php include_once 'publicar.php' ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.16.0/js/mdb.min.js"></script>

</body>

</html>
