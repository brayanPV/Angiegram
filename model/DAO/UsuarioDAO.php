<?php
require_once '../../model/conexion.php';
class UsuarioDAO{
   private $pdo;
    //public $conexion;
    
    public function __construct(){
        //  $this->conexion=new Conexion();
        
        try
		{
      $this->pdo = Conexion::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    //Metodo para llamar la conexion a la BD
    public function conectar(){
        include_once('../../model/conexion.php');
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
                $usuario=$item["usuario"];
                $_SESSION['usuario'] = $usuario;
                $exito = true;
               
            }else{
               echo "no exite nadie OwO";
            }
         }catch(Exception $e){
            throw new Exception("Ocurrio un error".$e->getTraceAsString());
        }
        return $exito;
    }
    
    public function registro($usuario,$email, $nombre, $apellido, $pass, $fechaNacimiento){
        $exito=false;
        try{
            //$con = Conexion::StartUp();
            $consulta = $this->pdo->prepare("INSERT INTO usuario(usuario, email, nombre, apellido, pass, fechanacimiento)
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
            echo $exito;   
         }catch(Exception $e){
            throw new Exception("Ocurrio un error" . $e->getTraceAsString());
        }
        return $exito;
    }
    
}

?>
