<?php
//require_once '../../model/conexion.php';
class UsuarioDAO{
   private $pdo;
    //public $conexion;
    
    /*public function __construct(){
        //  $this->conexion=new Conexion();
        //require_once '../../model/conexion.php';
        try
		{
      $this->pdo = Conexion::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }*/

    //Metodo para llamar la conexion a la BD
    public function conectar(){
        include_once './model/conexion.php';
        $conexion = new Conexion();
        return $conexion;
    }
    
    public function login($email, $pass){
    $exito = false;
    try{

    //include('model/conexion.php');
    //$conexion = new Conexion();
    $q="SELECT * FROM usuario WHERE email ='$email' AND pass='$pass'";
    //Una nueva conexion
    $con = $this->conectar();
    $res=$con->query($q);
    $num = $res->num_rows;
    if($num>0){
    //
    session_start();
    foreach ($res as $item){
    $id=$item["id"];
    $usuario = $item["usuario"];
    $nombre = $item["nombre"];
    $apellido = $item["apellido"];
    $email = $item["email"];
    $foto=$item["foto"];
} 
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['foto'] = $foto;
        $_SESSION['id'] = $id;
         $exito = true;
               
            }else{
               echo "no exite nadie OwO";
            }
         }catch(Exception $e){
            throw new Exception("Ocurrio un error".$e->getTraceAsString());
        }
        return $exito;
    }
    
    
    public function conectarDesdeView(){
        include_once('../../model/conexion.php');
        try
		{
        $pdo = Conexion::StartUp();  
        return $pdo;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
        
    }
    
    public function registro($usuario,$email, $nombre, $apellido, $pass, $fechaNacimiento){
        $exito=false;
        include_once('../../model/conexion.php');
        try{
            //$con = Conexion::StartUp();
            $con = $this->conectarDesdeView();
            $consulta = $con->prepare("INSERT INTO usuario(usuario, email, nombre, apellido, pass, fechanacimiento)
                   VALUES(?,?,?,?,?,?)");
            //$con=$this->__construct();
            //$res=$consulta->prepare($sql);
            $consulta->bindParam(1,$usuario,PDO::PARAM_STR);
            $consulta->bindParam(2,$email,PDO::PARAM_STR);
            $consulta->bindParam(3,$nombre,PDO::PARAM_STR);
            $consulta->bindParam(4,$apellido,PDO::PARAM_STR);
            $consulta->bindParam(5,$pass,PDO::PARAM_STR);
            $consulta->bindParam(6,$fechaNacimiento,PDO::PARAM_STR);
            $consulta->execute();
            $exito = true;
            //echo $exito;   
         }catch(Exception $e){
            throw new Exception("Ocurrio un error" . $e->getTraceAsString());
        }
        return $exito;
    }
    
    public function publicar($descripcion, $foto){
        $exito = false;
        session_start();
        try{
            $con = $this->conectarDesdeView();
          /*  $sql = "INSERT INTO publicacion (descripcion, usuario, fechapublicacion, foto)
                VALUES ('$descripcion','{$_SESSION['id']}','$foto')";*/
           //$con = $this->conectar();
       // $res=$con->query($q);
       // $num = $res->num_rows;
            $consulta = $con->prepare("INSERT INTO publicacion (descripcion, usuario, foto)
                VALUES (?,?,?)");
            $consulta->bindParam(1,$descripcion,PDO::PARAM_STR);
            $consulta->bindParam(2,$_SESSION['id'],PDO::PARAM_STR);
            $consulta->bindParam(3,$foto,PDO::PARAM_STR);
           $exito = $consulta->execute();
        }catch(Exception $e){
        throw new Exception("Ha ocurrido un error " . $e->getTraceAsString());    
        }
     return $exito;   
    }
    
    public function buscarPersonas($usuario){
        //$exito=false;
        session_start();
        $_SESSION['buscar'] = $usuario;
        try{
            $con = $this->conectarDesdeView();
            $consulta = $con->prepare('SELECT id,usuario, nombre, apellido FROM usuario WHERE nombre LIKE "%' .$usuario. '%" OR
            apellido LIKE "%' .$usuario. '%" OR
            usuario LIKE "%' .$usuario. '%";');
            $consulta->execute();
            //echo $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
            
        }catch(Exception $e){
          throw new Exception("Ha ocurrido un error " . $e->getTraceAsString());  
        }
    }
    
    public function mostrarPublicaciones(){
        try{
            $id=$_SESSION['id'];
            $con = $this->conectarDesdeView();
            $consulta = $con->prepare("SELECT * FROM publicacion WHERE usuario = '$id' ORDER BY fechapublicacion DESC");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            throw new Exception("Ha ocurrido un error " . $e->getTraceAsString());  
        }
    }
    
    public function mostrarPublicacionesPersonas($usuario){
        try{
            //$id=$_SESSION['id'];
            $con = $this->conectarDesdeView();
            $consulta = $con->prepare("SELECT * FROM publicacion WHERE usuario = '$usuario' ORDER BY fechapublicacion DESC");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            throw new Exception("Ha ocurrido un error " . $e->getTraceAsString());  
        }
    }
    
    public function mostrarPublicacionesFeed(){
        try{
            $id = $_SESSION['id'];
            $con = $this->conectarDesdeView();
            $consulta=$con->prepare("SELECT p.foto, p.descripcion, u.usuario 
from publicacion p 
inner join amistad a 
on a.amistad = p.usuario
inner join usuario u 
on u.id = p.usuario 
and a.usuario = '$id'
order by p.fechapublicacion DESC");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            throw new Exception("Ha ocurrido un error " . $e->getTraceAsString());  
        }
    }
    
    public function contarAmigos(){
        try{

            $id =$_SESSION['id'];
            $con = $this->conectarDesdeView();
            $consulta = $con->prepare("SELECT a.amistad, u.usuario, u.nombre, u.apellido
from amistad a
inner join usuario u
on a.amistad= u.id
and a.usuario = '$id' ");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);

        }catch(Exception $e){
            throw new Exception("Ha ocurrido un error " . $e->getTraceAsString());  
        }
    }
    
    public function editarPerfil($usuario, $nombre, $apellido, $pass, $foto){
        $exito = false;
        session_start();
        try{
            $id=$_SESSION['id'];
            $con=$this->conectarDesdeView();
            $consulta = $con->prepare("UPDATE usuario
            SET usuario = ?,
            nombre = ?,
            apellido = ?,
            pass=?,
            foto=?
            where id = ?");
            $consulta->bindParam(1,$usuario,PDO::PARAM_STR);
            $consulta->bindParam(2,$nombre,PDO::PARAM_STR);
            $consulta->bindParam(3,$apellido,PDO::PARAM_STR);
            $consulta->bindParam(4,$pass,PDO::PARAM_STR);
            $consulta->bindParam(5,$foto,PDO::PARAM_STR);
            $consulta->bindParam(6,$_SESSION['id'],PDO::PARAM_STR);
            $exito = $consulta->execute();
            return $exito;
        }catch(Exception $e){
            throw new Exception("Ha ocurrido un error " . $e->getTraceAsString()); 
        }
    }
    
}

?>
