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
    
    public function publicarNegocio($descripcion, $foto){
        $res=$this->user->publicar($descripcion, $foto);
        return $res;
    }
    
    public function buscarPersonasNegocio($usuario){
        $res=$this->user->buscarPersonas($usuario);
        return $res;
    }
    public function mostrarPublicacionesNegocio(){
        $res=$this->user->mostrarPublicaciones();
        return $res;
    }
     public function mostrarPublicacionesPersonasNegocio($usuario){
        $res=$this->user->mostrarPublicacionesPersonas($usuario);
        return $res;
    }
    public function mostrarPublicacionesFeedNegocio(){
        $res=$this->user->mostrarPublicacionesFeed();
        return $res;
    }
    public function contarAmigosNegocio(){
        $res=$this->user->contarAmigos();
        return $res; 
    }
    public function editarPerfilNegocio($usuario, $nombre, $apellido, $pass, $foto){
        $res=$this->user->editarPerfil($usuario, $nombre, $apellido, $pass, $foto);
        return $res;
    }

}

?>