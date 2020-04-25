<?php include 'partials/header.php' ?>

<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group" id="descripcion-group">
            <input class="form-control" type="text" placeholder="Descripcion" name="descripcion" />
        </div>

        <div class="form-group" id="foto-group">
            <input class="form-control" type="file" name="foto" />
        </div>
        <div>
            <input class="btn btn-primary" type="submit" values="Subir imagen" name="subir"> </input>
        </div>
    </form>

    <?php
         if (isset($_POST["subir"])){
            require_once '../../controller/Controller.php';
            $foto=$_FILES['foto']['name'];
            $descripicion=$_POST["descripcion"];
            $send= new Controller();
            $res= $send->publicarController($descripicion,$foto);
            $target = "../imagenes/".basename($_FILES['foto']['name']);
            if(move_uploaded_file($_FILES['foto']['tmp_name'], $target)){
                echo $res;
            }
            echo $res;
        }
        ?>
</div>

<?php include 'partials/footer.php'?>
