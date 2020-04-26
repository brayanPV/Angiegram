<?php include 'partials/header.php' ?>
<div class="container">
<?php
    include_once'../../controller/Controller.php';
    $control = new Controller();
    $inbox = $control->mostrarBanejaEntradaController(); ?>
<?php if($inbox!=null){
                                           foreach($inbox as $m):?>
<div class="row my-2">
    <div class="col-2">
        <img src="../imagenes/<?php echo $m->foto;?>" alt="img-fluid" width="100%">
        <h4><?php echo $m->usuario;?></h4>
    </div>
    <div class="col-10">
        <p><?php echo $m->mensaje;?></p>
    </div>
</div>
<?php endforeach;}?>

</div>


<?php include 'partials/footer.php' ?>
