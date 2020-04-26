<?php include 'partials/header.php' ?>





 <?php 
         include_once'../../controller/Controller.php';
            $control = new Controller();   
           //require_once '../../controller/Controller.php';
            //$res = new Controller();
            //$usuario=$_POST["usuario"];
           //$res->mostrarPerfilBuscadoController($usuario);
$usuario = $_POST['usuario'];
            $res = $control->mostrarPerfilBuscadoController($usuario);
                foreach($res as $r):
                    ?>
                

    <div class="container">
        <div class="row py-4 align-items-center">
            <div class="col-6 my-4 d-flex justify-content-center">
                <div class="icon">
                   <h3><?php echo $r->usuario;?></h3>
                    <img src="../imagenes/<?php echo $r->foto;
                              endforeach;
                              ?>" alt="" id="imagen">

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
            $usuario = $_POST['usuario'];
            $img = $control->mostrarPublicacionesPersonasController($usuario);
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

    

    <?php include 'partials/footer.php' ?>