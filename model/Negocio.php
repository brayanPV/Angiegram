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
    
    public function mostrarPerfilBuscadoNegocio($usuario){
        $res=$this->user->mostrarPerfilBuscado($usuario);
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
    public function realizarComentarioNegocio($publicacion, $comentario){
        $res=$this->user->realizarComentario($publicacion, $comentario);
        return $res;
    }
    public function mostrarComentarioNegocio($publicacion){
        $res=$this->user->mostrarComentario($publicacion);
        return $res;
    }
    public function sonAmigosNegocio($idPersona){
        $res=$this->user->sonAmigos($idPersona);
        return $res;
    }
    public function enviarSolicitudNegocio($idPersona){
        $res=$this->user->enviarSolicitud($idPersona);
        return $res;
    }
    public function aceptarSolicitudNegocio($solicitante){
        $res=$this->user->aceptarSolicitud();
        return $res;
    }
    public function mostrarSolicitudNegocio(){
        $res=$this->user->mostrarSolicitud();
        return $res;
    }

}

?>