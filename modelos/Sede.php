<?php

    class Sede extends Conexion {
        private $idsede;
        private $nombre;
        private $descripcion;    
        const TABLA = 'sede';

        public function __construct(){
    
            /*Llamamos al constructor de la clase padre mediante el uso de parent lo que nos permite ejecutar el constructor de
            la clase conexión y el código extra que agreguemos en esta función que lo hereda*/
                
            parent::__construct();
    
        }
        /*
        public function __construct($idsede, $nombre, $descripcion) {

            
            $this->idsede       = $idsede;   
            $this->nombre       = $nombre;
            $this->descripcion  = $descripcion;
        }*/

        public function get_sedes(){
            /*Podemos usar la variable conexion_db gracias a la herencia */
    
            /*creamos una consulta SQL */
            //$resultado = $this->conexion_db->query('SELECT * FROM RUTAS');

            $sedes = null;

            $resultado = $this->conexion_db->query('SELECT * FROM sede ORDER BY idsede');
    
            //creamos un array asociativo que contendrá toda la información que estamos demandando de la mase de datos.
    
            if ($resultado) {
                $sedes = $resultado->fetch_all(MYSQLI_ASSOC);
            } 
    
            //pedimos que nos devuelva el array
            return $sedes;
    
        }
    }

?>