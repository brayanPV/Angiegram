<?php

class UsuarioDAO{
   
    function login($email, $pass){
        $exito = false;
        try{
            //$email=$UsuarioDTO->getEmail();
            //$pass=$UsuarioDTO->getPass();
            
            $conexion = Conexion::crearConexion();
            
            $consulta = $conexion->prepare("SELECT usuario, email, nombre, apellido, pass, fechanacimiento, fecharegistro FROM usuario WHERE email = :email and pass = :pass ");
            $consulta->bindParam(':email',$email,PDO::PARAM_STR);
            $consulta->bindParam(':pass',$email,PDO::PARAM_STR);
            $consulta->execute();
            $existe=$consulta->rowCount();
            $respuesta=$consulta->fetch();
            if(existe>0){
                //
                session_start();
                $usuario=$item["usuario"];
                $_SESSION['usuario'] = $usuario;
                $exito = true;
                header('Location: ../../view/html/politicas.html');
            }else{
                header('location: ../../index.html');
            }
        }catch(Exception $e){
            throw new Exception("Ocurrio un error".$e->getTraceAsString());
        }
        return exito;
    }
    
}

?>