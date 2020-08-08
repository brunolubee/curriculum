<?php
require_once 'conexion.php';
 class Personaje {
   private $nombre;
   private $email;
   private $asunto;
   private $descripcion;
   public function getNombre() {
      return $this->nombre;
   }
   public function getEmail() {
      return $this->email;
   }
   public function getAsunto() {
      return $this->asunto;
   }
   public function getDescripcion() {
      return $this->descripcion;
   }
   public function setNombre($nombre) {
      $this->nombre = $nombre;
   }
     public function setEmail($email) {
      $this->email = $email;
   }
    public function setAsunto($asunto) {
      $this->email = $asunto;
   } 
   public function setDescripcion($descripcion) {
      $this->descripcion = $descripcion;
   }
   public function __construct($nombre,$email, $asunto, $descripcion) {
      $this->nombre = $nombre;
      $this->email = $email;
      $this->asunto = $asunto;
      $this->descripcion = $descripcion;
   }
   public function guardar(){
      $conexion = new Conexion();
      if($conexion) /*Modifica*/ 
        {
         $consulta = $conexion->prepare('INSERT INTO contactos(name, email, asunto, mensaje) VALUES(:nombre, :email, :asunto, :descripcion)');
         $consulta->bindParam(':nombre', $this->nombre);
         $consulta->bindParam(':email', $this->email);
         $consulta->bindParam(':asunto', $this->asunto);
         $consulta->bindParam(':descripcion', $this->descripcion);
         $consulta->execute();
         
      }
      $conexion = null;
   }
 }
if(isset($_POST["nombre"]) && !empty($_POST["nombre"])and 
    isset($_POST["email"]) && !empty($_POST["email"])and     
    isset($_POST["subject"]) && !empty($_POST["subject"])and     
    isset($_POST["message"]) && !empty($_POST["message"]))    
    
    {
    
 $insert= new Personaje($_POST["nombre"],$_POST["email"],$_POST["subject"],$_POST["message"]);
 
$insert->guardar();
    header('Location: ../index.php');
}
?>