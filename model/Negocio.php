<?php
require_once 'DAO/UsuarioDAO.php';
class Negocio{
    public $user;
    public function __construct(){
        $this->user= new UsuarioDAO;
    }
    
    public function loginNegocio($email, $pass){
        $res = $this->user->login($email, $pass);
        return $res;
    }
    
    public function registroNegocio($usuario,$email, $nombre, $apellido, $pass, $fechaNacimiento){
        $res = $this->user->registro($usuario,$email, $nombre, $apellido, $pass, $fechaNacimiento);
        return $res;
    }

}

?>