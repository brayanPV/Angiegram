<?php

class Conexion{
private $host="localhost";
private $db="cosogram";
private $usuario="root";
private $clave="";
    public function __construct() {
    $this->conexion = new mysqli( $this->host, $this->usuario, $this->clave, $this->db );		
    if ( mysqli_connect_errno() ) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $this->conexion->set_charset("utf8");
    
		return true;
}
    public function query($query){
        $consulta=$this->conexion->query($query);
       	return $consulta;
    } 
    
    
     public static function StartUp()
    {
        
        $pdo = new PDO('mysql:host=localhost;dbname=cosogram;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
    
   /* public function crearConexion() {
        
        try{
            $conexion = new PDO("mysql:host=localhost;dbname=cosogram","root","",array(PDO::ATTR_PERSISTENT => true,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));;
            return $conexion;
        } catch (Exception $ex) {
            throw new Exception("Se ha presentado un error al conectar con la base de datos");
        }
        
    }*/
}

