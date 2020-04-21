
<?php include 'partials/header.php' ?>


    <div class="container">
        <a href="publicar.php" target="_blank"> PUBLICAR FOTO</a>
        <a href="feed.php" target="_blank"> FEED</a>
        <div class="row py-4 align-items-center">
            <div class="col-6 my-4 d-flex justify-content-center">
                <div class="icon">
                    <img src="../imagenes/<?php echo $_SESSION['foto'];?>" alt="" id="imagen">

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

            <div class="col-6">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal">
                    Postear Foto
                </button>

            </div>

        </div>
    </div>



    <div class="container">
        <div class="row align-items-center">

            <?php 
            include_once'../../controller/Controller.php';
            $control = new Controller();
            $img = $control->mostrarPublicacionesController();
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

 <?php include 'partials/footer.php' ?>
