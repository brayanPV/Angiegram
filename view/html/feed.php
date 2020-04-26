<?php include 'partials/header.php' ?>

<div class="container">
    <?php 
            include_once'../../controller/Controller.php';
            $control = new Controller();
            $img = $control->mostrarPublicacionesFeedController();
            //$comentario = $control->mostrarComentarioController();
            //echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
            if($img!=null){
                foreach($img as $r):?>

    <div class="row justify-content-center my-3">
        <div class="col-lg-8 mt-1">
            <!--fila del encabezado del post-->
            <div class="row rounded mb-0 border border-light pt-1">
                <div class="col-2">
                    <img src="../imagenes/<?php echo $r->fotoP; ?>" alt="" class="img-fluid rounded-circle">
                </div>
                <div class="col-10">

                    <input type="hidden" name="id" value="<?php echo $r->id; ?>">

                    <h3 class="font-weight-bold"><?php echo $r->usuario ;?></h3>

                </div>

                <div class="col-12 mt-1">
                    <p><?php echo $r->descripcion ;?></p>
                </div>
                <img src="../imagenes/<?php echo $r->foto ;?>" alt="" class="img-fluid mt-1" width="100%">
                <hr>
                <h4 hidden><?php $comentario = $control->mostrarComentarioController($r->id); ?> </h4> <br>
                
                <h2 class="p-2" >Comentarios</h2>

                <?php
                                       if($comentario!=null){
                                           foreach($comentario as $c):?>

                <div class="col-12">

                    <div class="row">
                        <div class="col-2 p-2">
                            <img src="../imagenes/<?php echo $c->foto;?>" alt="img-fluid rounded-circle" width="100%">
                            <h5><?php echo $c->usuario; ?></h5>
                        </div>

                        <div class="col-10 rounded mb-0 border border-light pt-1">
                            <p><?php echo $c->comentario; ?></p>
                        </div>
                    </div>

                </div>
                <?php endforeach;}?>


                <div class="col-12 my-2">

                    <form action="" method="post">

                        <div class="form-row">
                            <div class="col-9">




                                <label for="exampleFormControlTextarea1" class="sr-only">Comentar</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="comentario"></textarea>

                            </div>
                            <div class="col-3">
                                <input type="hidden" name="id" value="<?php echo $r->id; ?>">
                                <button type="submit" class="btn btn-primary mb-2" name="botonComentario" >Comentar</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php endforeach; 
            }?>
    <?php
                if(isset($_POST["botonComentario"])){
                //require_once('../../controller/Controller.php');
                $id=$_POST["id"];
                $comentario=$_POST["comentario"];
                //$send = new Controller();
                $res = $control->realizarComentarioController($id,$comentario);
                $comentario=null;
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                ?>

</div>



<?php include 'partials/footer.php' ?>
