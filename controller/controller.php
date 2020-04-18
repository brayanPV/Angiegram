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
        header('location: view/html/politicas.html');
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
}

?>
