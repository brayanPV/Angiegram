<?php include 'partials/header.php' ?>
    <body>
        <div class="container">
            <?php //session_start();
   // var_dump($_SESSION['busqueda']);
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
                            <button type="button" class="btn btn-primary px-3"><i class="fas fa-user-plus" aria-hidden="true"></i></button>

                            <form action="perfilBuscado.php" method="POST">
                                <input type="hidden" name="usuario" value="<?php echo $r->id; ?>">
                                <button class="btn btn-info btn-block" type="submit">Ver Perfil</button>
                            </form>
                        </div>
                    </div>


                </div>

            </div>

            <?php endforeach; ?>


        </div>



        <?php include 'partials/footer.php' ?>
