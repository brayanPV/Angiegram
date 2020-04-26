<?php
//require_once ('../model/Negocio.php');
class Controller{
    //private $negocio;
    
  public function __construct(){
        //include_once('model/Negocio.php');
        //$negocio=new Negocio();
        //return $negocio;
      //$this->negocio = new Negocio();
    }
    
  /*  public function crearNegocio(){
        include('model/Negocio.php');
        $negocio=new Negocio();
        return $negocio;
    }*/
     
    public function loginController($email, $pass){
        //var_dump($email, $pass);
        //$email = $_REQUEST['email'];
        //$pass = $_REQUEST['pass'];
        //$res=$this->negocio->loginNegocio($email, $pass);
        include ('model/Negocio.php');
        $negocio=new Negocio();
        $res=$negocio->loginNegocio($email,$pass);
        if($res==1){
        header('location: view/html/perfil.php');
        }
        else{
        header('location: index.php');
        }
        echo $res;
        return $res;
        
    }
    
    public function registroController($usuario,$email, $nombre, $apellido, $pass, $fechaNacimiento){
    include '../../model/Negocio.php';
    $negocio=new Negocio();
    $res=$negocio->registroNegocio($usuario,$email, $nombre, $apellido, $pass, $fechaNacimiento);
    //echo $res;
    var_dump($res);
    if($res== true){
    echo "entró al if";
    header('location: ../../index.php');
    }else{
    echo "entra al else";
    header('location: registro.php');
    }
    //echo $res;
    //return $res;
    }
    
    public function publicarController($descripcion, $foto){
    include '../../model/Negocio.php';
    $negocio=new Negocio();
    $res=$negocio->publicarNegocio($descripcion, $foto);    
    if($res== true){
    echo "entró al if";
    header('location: perfil.php');
    }else{
    echo "entra al else";
    echo "ERROR PAPI ";
    }
    }
    
    public function buscarPersonasController($usuario){
        include '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->buscarPersonasNegocio($usuario); 
        if($res!=null){
            session_start();
            $_SESSION['busqueda'] = $res;
            header('location: search.php');
        }
    }
    
    public function mostrarPerfilBuscadoController($usuario){
        include_once '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->mostrarPerfilBuscadoNegocio($usuario); 
        if($res!=null){
            return $res;
        }
    }
    
    public function mostrarPublicacionesController(){
       // session_start(); 
        include '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->mostrarPublicacionesNegocio(); 
        if($res!=null){
            //echo $res;
            return $res;
           // $_SESSION['imagenes'] = $res;
        }else{
           echo "no se ha realizado ninguna publicacion";
        }
    }
    public function mostrarPublicacionesPersonasController($usuario){
       // session_start(); 
        include_once '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->mostrarPublicacionesPersonasNegocio($usuario); 
        if($res!=null){
            //echo $res;
            return $res;
           // $_SESSION['imagenes'] = $res;
        }else{
           echo "no se ha realizado ninguna publicacion";
        }
    }
    
    public function mostrarPublicacionesFeedController(){
        include '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->mostrarPublicacionesFeedNegocio();
        if($res!=null){
            return $res;
        }else{
            echo "agrega amigos";
        }
    }
  
    public function contarAmigosController(){
        include '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->contarAmigosNegocio();
        if($res!=null){
            //session_start();
            //$_SESSION['misamigos'] = $res;
            return $res;
           // header('location: misamigos.php');
        }else{
            echo "agregue amigos";
        }
    }
    
    public function editarPerfilController($usuario, $nombre, $apellido, $pass, $foto){
        include '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->editarPerfilNegocio($usuario, $nombre, $apellido, $pass, $foto);
        if($res!=null){
            header('location: perfil.php');
        }else{
            
        }
    }
    public function realizarComentarioController($publicacion, $comentario){
        include_once '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->realizarComentarioNegocio($publicacion, $comentario);
        
    }
    public function mostrarComentarioController($publicacion){
        include_once '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->mostrarComentarioNegocio($publicacion);
        if($res!=null){
            return $res;
        }else{
            echo "no hay comentarios aun";
        }
    }
    public function sonAmigosController($idPersona){
        include_once '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->sonAmigosNegocio($idPersona);
        if($res!=null){
            return $res;
        }else{
            return 0;
        }
    }
    public function enviarSolicitudController($idPersona){
        include_once '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->enviarSolicitudNegocio($idPersona);
        var_dump($res);
        if($res!=null){
            header('location: search.php');
        }else{
            echo "error";
        }
    }
    public function aceptarSolicitudController($solicitante){
        include_once '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->aceptarSolicitudNegocio($solicitante);
        return $res;
    }
    public function mostrarSolicitdController(){
       include_once '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->mostrarSolicitudNegocio();
        return $res; 
    }
    public function enviarMensajeController($idReceptor, $mensaje){
       include_once '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->enviarMensajeNegocio($idReceptor, $mensaje);
        return $res; 
    }
    public function mostrarMensajeAmigosController($idAmigo){
        include_once '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->mostrarMensajeAmigosNegocio($idAmigo);
        return $res; 
    }
    public function mostrarMensajeMiosController($idAmigo){
        include_once '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->mostrarMensajeMiosNegocio($idAmigo);
        return $res; 
    }
    public function mostrarBanejaEntradaController(){
        include_once '../../model/Negocio.php';
        $negocio=new Negocio();
        $res=$negocio->mostrarBanejaEntradaNegocio();
        return $res; 
    }
}

?>
