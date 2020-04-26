<?php include 'partials/header.php' ?>
<div class="container">
    <h1 class="text-center">Solicitudes</h1>
    <?php
    include_once'../../controller/Controller.php';
    $control = new Controller();
    $solicitudes = $control->mostrarSolicitdController(); ?>
    <?php if($solicitudes!=null){
                                           foreach($solicitudes as $s):?>
    <div class="row py-2">
        <div class="col-2">
            <img src="../imagenes/<?php echo $s->foto; ?>" alt="" class="img-fluid" width="100%" title="Foto perfil">
        </div>
        <div class="col-8">
            <h3><?php echo $s->usuario; ?></h3>
        </div>
        <div class="col-2">
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $s->id; ?>">
                <button class="btn btn-info btn-block" type="submit" name="boton">Aceptar Solicitud</button>
            </form>
        </div>
    </div>

    <?php endforeach;} ?>
    <?php
                            if(isset($_POST["boton"])){
                //require_once('../../controller/Controller.php');
                            $idUsuario=$_POST['id'];
                            echo "tengo un usuario";
                            $res = $control->aceptarSolicitudController($idUsuario);
                            echo $res;
                                echo "<meta http-equiv='refresh' content='0'>";
                }
                            
                            ?>
</div>

<?php include 'partials/footer.php' ?>
