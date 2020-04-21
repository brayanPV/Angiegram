<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Perfil</title>
    <link rel="icon" href="../imagenes/logo.png">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>


<body>

    <div class="modal-dialog text-center">
        <div class="col-sm-8  main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="../imagenes/logo.png" alt="">
                    <h1>AngieGram</h1>
                    <h4>Editar Perfil</h4>

                </div>

                <form class="col-12 form" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group" id="user-group">
                        <input class="form-control" type="text" placeholder="Usuario" name="usuario" />
                    </div>

                    <div class="form-group" id="nombre-group">
                        <input class="form-control" type="text" placeholder="Nombre" name="nombre" />
                    </div>

                    <div class="form-group" id="apellido-group">
                        <input class="form-control" type="text" placeholder="Apellido" name="apellido" />
                    </div>

                    <div class="form-group" id="contraseña-group">
                        <input class="form-control" type="password" placeholder="Contraseña" name="pass" />
                    </div>

                    <div id="cargar-foto">
                        <i class="fas fa-images"></i>
                        <input type="file" name='foto'>
                    </div><br>

                    <button class="btn btn-primary" type="submit" name="editar"><i class="fas fa-sign-in-alt"></i>Editar</button>
                </form>
                <?php
                if(isset($_POST["editar"])){
                require_once('../../controller/Controller.php');
                $usuario=$_POST["usuario"];
                $nombre=$_POST["nombre"];
                $apellido=$_POST["apellido"];
                $pass=$_POST["pass"];
                $foto=$_FILES['foto']['name'];
                $send = new Controller();
                $res = $send->editarPerfilController($usuario,$nombre, $apellido, $pass, $foto);
                
                echo $res;
                }
                ?>


                <!-- controlador -->
                <!-- 	public function store(CreateEmpresaRequest $request){
        $input = $request->all();
        if($request->hasFile('banner')){
            $file = $request->file('banner');
            $extension= $file->getClientOriginalExtension();
            $nombreImagen = 'logo.'.$extension;
            $file->move(public_path().'/img/uploads/empresa',$nombreImagen);
            $input['banner']=$nombreImagen;
        }
		$empresa = $this->empresaRepository->store($input);
		Flash::message('Datos Almacenados Correctamente.');
		return redirect(route('empresas.index'));
	}-->
            </div>

        </div>

    </div>

</body>

</html>