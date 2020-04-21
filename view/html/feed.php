<?php include 'partials/header.php' ?>
   
    <div class="container">
        <?php 
            include_once'../../controller/Controller.php';
            $control = new Controller();
            $img = $control->mostrarPublicacionesFeedController();
            //echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
            if($img!=null){
                foreach($img as $r):?>

        <div class="row justify-content-center my-3">
            <div class="col-lg-8 mt-1">
                <!--fila del encabezado del post-->
                <div class="row rounded mb-0 border border-light pt-1">
                    <div class="col-2">
                        <img src="../imagenes/prueba.png" alt="" class="img-fluid rounded-circle">
                    </div>
                    <div class="col-10">
                        <h3 class="font-weight-bold"><?php echo $r->usuario ;?></h3>

                    </div>

                    <div class="col-12 mt-1">
                        <p><?php echo $r->descripcion ;?></p>
                    </div>
                    <img src="../imagenes/<?php echo $r->foto ;?>" alt="" class="img-fluid mt-1" width="100%">
                    <hr>
                    <div class="col-12 my-2">
                        <form action="" class="">
                            <div class="form-row">
                                <div class="col-9">
                                    <label for="exampleFormControlTextarea1" class="sr-only">Comentar</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary mb-2">Comentar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach; 
            }?>
            
</div>

        

        <?php include 'partials/footer.php' ?>
