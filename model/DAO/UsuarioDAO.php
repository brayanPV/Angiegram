<?php
//require_once 'model/conexion.php';
class UsuarioDAO{
   
    public $conexion;

   /* public function __construct(){
        $this->conexion=new Conexion();
    }*/

    public function login($email, $pass){
        $exito = false;
        try{
            //$email=$UsuarioDTO->getEmail();
            //$pass=$UsuarioDTO->getPass();
           // $res=$this->conexion->crearConexion();
         //  if($res!=null){
           /* $consulta= $res->prepare("SELECT usuario, email, nombre, apellido, pass, fechanacimiento, fecharegistro FROM usuario WHERE email = :email and pass = :pass ");
            $consulta->bindParam(':email',$email,PDO::PARAM_STR);
            $consulta->bindParam(':pass',$email,PDO::PARAM_STR);
            $consulta->execute();
            $existe=$consulta->rowCount();
            $respuesta=$consulta->fetch();*/
            include('model/conexion.php');
            $conexion = new Conexion();
	        $q="SELECT * FROM usuario WHERE email ='$email' AND pass='$pass'";
            $res=$conexion->query($q);
            $num = $res->num_rows;
            if($num>0){
                //
                session_start();
                $usuario=$item["usuario"];
                $_SESSION['usuario'] = $usuario;
                $exito = true;
                //header('Location: ../../view/html/politicas.html');
            }else{
               // header('location: ../../index.html');
               echo "no exite nadie OwO";
            }
           // }
            
        }catch(Exception $e){
            throw new Exception("Ocurrio un error".$e->getTraceAsString());
        }
        return $exito;
    }
    
}

?>