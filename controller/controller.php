<?php

class Controller{
    private $negocio;
    
    public function __construct(){
        $this->negocio=new Negocio();
    }
    
    public function loginController($email, $pass){
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['pass'];
        
        return $this->negocio->loginNecogio($email, $pass);
        
    }
}

?>