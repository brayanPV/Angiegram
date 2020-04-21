
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar</title>
</head>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group" id="descripcion-group">
                        <input class="form-control" type="text" placeholder="Descripcion" name="descripcion" />
                    </div>
               
                    <div class="form-group" id="foto-group">
                        <input class="form-control" type="file" name="foto"/>
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
            echo $res;
        }
        ?>
<body>
    
</body>
</html>