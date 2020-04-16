<?php

class Negocio{
    
    public function loginNegocio($email, $pass){
        return UsuarioDAO::login($email, $pass);
    }

}

?>