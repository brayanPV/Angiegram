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
    include_once '../../model/Negocio.php';
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
    public function mostrarPublicacionesController(){
       // session_start(); 
        include_once '../../model/Negocio.php';
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
}

?>
