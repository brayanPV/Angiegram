<?php
require_once ('model/Negocio.php');
class Controller{
    public $negocio;
    
   public function __construct(){
        $this->negocio=new Negocio();
    }
     
    public function loginController($email, $pass){
        var_dump($email, $pass);
        //$email = $_REQUEST['email'];
        //$pass = $_REQUEST['pass'];
        $res=$this->negocio->loginNegocio($email, $pass);
        if($res==1){
        header('location: view/html/politicas.html');
        }
        else{
        header('location: index.php');
        }
        echo $res;
        return $res;
        
    }
}

?>