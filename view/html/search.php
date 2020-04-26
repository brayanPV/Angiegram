<?php include 'partials/header.php' ?>
    <body>
        <div class="container">
            <?php //session_start();
   // var_dump($_SESSION['busqueda']);
    if($_SESSION['busqueda']!=null){
                foreach($_SESSION['busqueda'] as $r): ?>

            <div class="row justify-content-center wow fadeInUp ">

                <div class="col-10 my-2">
                    <div class="row border border-light">
                        <div class="col-3">
                            <img src="../imagenes/<?php echo $r->foto; ?>" alt="" class="img-fluid rounded-circle">
                        </div>
                        <div class="col-7 align-self-center">
                            <h2><?php echo $r->usuario; ?></h2>
                            <h2><?php echo $r->nombre; ?></h2>
                            <h2><?php echo $r->apellido;?></h2>
                        </div>                        
                        <div class="col-2 align-self-center">
                         <form method="POST" action="">
                          <?php 
                            include_once '../../controller/controller.php';
                            $control = new Controller();
                            $id=$r->id;
                            $exito = $control->sonAmigosController($id);
                            if($exito==null){
                                ?>
                            <input type="hidden" name="usuario" value="<?php echo $r->id; ?>">
                              <button type="submit" class="btn btn-primary px-3" name="enviarSolicitud"><i class="fas fa-user-plus" aria-hidden="true" ></i> agregar</button>  <?php
                            }
                            ?>
                        </form>
                           
                           <form action="perfilBuscado.php" method="POST">
                                <input type="hidden" name="usuario" value="<?php echo $r->id; ?>">
                                <button class="btn btn-info btn-block" type="submit">Ver Perfil</button>
                            </form>
                        </div>
                    </div>


                </div>

            </div>

            <?php endforeach; }else echo "<p>no hay resultados<p> <br> F ";
           
            ?>

<?php
                            if(isset($_POST["enviarSolicitud"])){
                //require_once('../../controller/Controller.php');
                            $idUsuario=$_POST['usuario'];
                            echo "tengo un usuario";
                            $res = $control->enviarSolicitudController($idUsuario);
                            echo $res;
                }
                            
                            ?>
        </div>



        <?php include 'partials/footer.php' ?>
