<?php include 'partials/header.php' ?>

<div class="container py-4">
    <!-- Default form contact -->
    <form class="text-center border border-light p-5" method="post" action="">

        <p class="h4 mb-4">Enviar Mensaje</p>
        <!-- Subject -->
        <label>Amigo</label>
        <select class="browser-default custom-select mb-4" name="recibe">
            <?php 
            require_once '../../controller/Controller.php';
            //$usuario=$_POST["usuario"];
            $send = new Controller();
            $res=$send->contarAmigosController();
            if($res!=null){
            foreach($res as $r):
            ?>
            <option value="<?php echo $r->id;?>"><?php echo $r->usuario;?></option>
            <?php endforeach; }?>
        </select>

        <!-- Message -->
        <div class="form-group">
            <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Message" name="mensaje"></textarea>
        </div>

        <!-- Send button -->
        <button class="btn btn-info btn-block" type="submit" name="enviar">Send</button>

    </form>
    <!-- Default form contact -->
    <?php
                if(isset($_POST["enviar"])){
                require_once('../../controller/Controller.php');
                $recibe=$_POST["recibe"];
                $mensaje=$_POST["mensaje"];
                $send = new Controller();
                $res = $send->enviarMensajeController($recibe, $mensaje);                
                echo $res;
                }
                ?>
</div>

<?php include 'partials/footer.php' ?>
