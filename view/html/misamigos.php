<?php include 'partials/header.php' ?>

    <body>
        <div class="container">
            <?php 
            require_once '../../controller/Controller.php';
            //$usuario=$_POST["usuario"];
            $send = new Controller();
            $res=$send->contarAmigosController();
            if($res!=null){
            foreach($res as $r):
            ?>
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
                            <button type="button" class="btn btn-primary px-3" hidden><i class="fas fa-user-plus" aria-hidden="true"></i></button>

                            <form action="perfilBuscado.php" method="POST">
                                <input type="hidden" name="usuario" value="<?php echo $r->amistad; ?>">
                                <button class="btn btn-info btn-block" type="submit">Ver Perfil</button>
                            </form>
                        </div>
                    </div>
   </div>
  </div>

            <?php endforeach; }else echo "<p>no tiene amigos<p> <br> F " ?>
 </div>
<?php include 'partials/footer.php' ?> 