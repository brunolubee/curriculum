<?php 
 class Conexion extends PDO { 
   private $nombre_de_base = 'contactos';
   private $host = 'localhost'; 
   private $usuario = 'root';
   private $contrasena = ''; 
   public function __construct() {
      //Sobreescribo el método constructor de la clase PDO.
      try{
       parent::__construct("mysql:host={$this->host};dbname={$this->nombre_de_base};charset=utf8", $this->usuario, $this->contrasena);
       echo "hola";
      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
   } 
 } 
?>