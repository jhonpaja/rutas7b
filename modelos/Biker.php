<?php
//require_once "conexionpdo.php"; 

class Biker extends Conexion {

    private $id;
    private $rutaid;
    private $nombres;
    private $celular;
    private $estado;
    const TABLA = 'biker';
    
    public function getId() {
        return $this->id;
    }

    public function getRutaid() {
        return $this->rutaid;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setRutaid($rutaid){
        $this->rutaid = $rutaid;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }
   
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

        
    public function __construct($rutaid, $nombres, $celular, $estado) {

        /* Llamamos al constructor de la clase padre mediante el uso de parent lo que nos permite ejecutar el constructor de
          la clase conexión y el código extra que agreguemos en esta función que lo hereda */

        $this->rutaid   = $rutaid;   
        $this->nombres  = $nombres;
        $this->celular  = $celular;
        $this->estado  = $estado;
        //parent::__construct();
    }

    public function guardar_biker(){
        $conexion = new Conexion();

        $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (rutaid, nombrebiker, celularbiker, estadobiker) VALUES(:rutaid, :nombres, :celular, :estado)');
        $consulta->bindParam(':rutaid', $this->rutaid);
        $consulta->bindParam(':nombres', $this->nombres);
        $consulta->bindParam(':celular', $this->celular);
        $consulta->bindParam(':estado', $this->estado);
        $consulta->execute();
        $this->id = $conexion->lastInsertId();
    /*  if($this->id) {
         $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET rutaid = :rutaid, nombres = :nombres, celular = :celular WHERE idbiker = :id');
         $consulta->bindParam(':rutaid', $this->rutaid);
         $consulta->bindParam(':nombres', $this->nombres);
         $consulta->bindParam(':celular', $this->celular);
         $consulta->bindParam(':id', $this->id);
         $consulta->execute();
      }else{
         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (rutaid, nombres, celular) VALUES(:rutaid, :nombres, :celular)');
         $consulta->bindParam(':rutaid', $this->rutaid);
         $consulta->bindParam(':nombres', $this->nombres);
         $consulta->bindParam(':celular', $this->celular);
         $consulta->execute();
         $this->id = $conexion->lastInsertId();
      }*/
        $conexion = null;
   }
    
    


}

?>