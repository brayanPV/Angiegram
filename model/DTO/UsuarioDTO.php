<?php

class UsuarioDTO{
    
    private $id;
    private $usuario;
    private $email;
    private $nombre;
    private $apellido;
    private $pass;
    private $fecharegistro;
    private $fechanacimiento;
    private $pais;
    
    function __construct($usuario,$email,$nombre,$apellido, $pass,$fecharegistro,$fechanacimiento, $pais){
        $this->usuario = $usuario;
        $this->email = $email:
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->pass = $pass;
        $this->fechanacimiento = $fechanacimiento;
        $this->fecharegistro = $fecharegistro;
        $this->pais = $nombre;
        
    }
    //getters
    function getUsuario(){
        return $this->usuario;
    }
    function getEmail(){
        return $this->email;
    }
    function getNombre(){
        return $this->nombre;
    }
    
    function getApellido(){
        return $this->apellido;
    }
    
    function getPass(){
        return $this->pass;
    }
    
    function getFechanacimiento(){
        return $this->fechanacimiento;
    }
    
    function getFechaRegistro(){
        return $this->fecharegistro;
    }
    
    function getPais(){
        return $this->pais;
    }
    //setters
    function setUsuario($usuario){
        $this->usuario=$usuario;
    }
    function setNombre($nombre){
        $this->nombre=$nombre;
    }
    function setApellido($apellido){
        $this->apellido=$apellido;
    }
    function setPass($pass){
        $this->pass=$pass;
    }
    function setFechanacimiento($fechanacimiento){
        $this->fechanacimiento=$fechanacimiento;
    }
    function setFecharegistro($fecharegistro){
        $this->fecharegistro=$fecharegistro;
    }
    function setPais($pais){
        $this->pais=$pais;
    }
    
}

?>