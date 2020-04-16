<?php

class Controller{
    private $negocio;
    
    public function __construct(){
        $this->negocio=new Negocio();
    }
    
    public function loginController($email, $pass){
        echo 'Dani te amo';
       /* $email = $_REQUEST['email'];
        $pass = $_REQUEST['pass'];
        
        return $this->negocio->loginNegocio($email, $pass);
        */
    }
}

?>