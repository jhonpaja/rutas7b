<?php
    
    class Ruta extends Conexion{

        public function __construct(){
    
            /*Llamamos al constructor de la clase padre mediante el uso de parent lo que nos permite ejecutar el constructor de
            la clase conexión y el código extra que agreguemos en esta función que lo hereda*/
                
            parent::__construct();
    
        }

         /*Método que se encarga de hacer la consulta SQL y devuelve un array con los registros  */

        public function get_rutas(){
            /*Podemos usar la variable conexion_db gracias a la herencia */
    
            /*creamos una consulta SQL */
            //$resultado = $this->conexion_db->query('SELECT * FROM RUTAS');

            $rutas = null;

            $resultado = $this->conexion_db->query('SELECT * FROM ruta R INNER JOIN nivelruta NR ON NR.IDNIVEL = R.NIVEL');
    
            //creamos un array asociativo que contendrá toda la información que estamos demandando de la mase de datos.
    
            if ($resultado) {
                $rutas = $resultado->fetch_all(MYSQLI_ASSOC);
            } 
    
            //pedimos que nos devuelva el array
            return $rutas;
    
        }

        public function get_ruta(int $idruta){
            /*Podemos usar la variable conexion_db gracias a la herencia */
    
            /*creamos una consulta SQL */
            //$resultado = $this->conexion_db->query('SELECT * FROM RUTAS');
            $resultado = $this->conexion_db->query('SELECT * FROM ruta R INNER JOIN nivelruta NR ON NR.IDNIVEL = R.NIVEL WHERE R.IDRUTA = '.$idruta);
    
            //creamos un array asociativo que contendrá toda la información que estamos demandando de la mase de datos.
            
            if ($resultado) {
                $ruta = $resultado->fetch_all(MYSQLI_ASSOC);
            } 
    
            //pedimos que nos devuelva el array
            return $ruta;
    
        }
        
        public function get_bikers_ruta(int $idruta){
            $resultado = $this->conexion_db->query('SELECT count(*) as nrobikers FROM biker B INNER JOIN ruta R ON B.RUTAID = R.IDRUTA WHERE R.IDRUTA = '.$idruta);
            
            $nrobikers = $resultado->fetch_all(MYSQLI_ASSOC);
            
            return $nrobikers;
        }
        
        
        public function get_bikers(int $idruta){
            /*Podemos usar la variable conexion_db gracias a la herencia */
    
            /*creamos una consulta SQL */
            //$resultado = $this->conexion_db->query('SELECT * FROM RUTAS');
            $resultado = $this->conexion_db->query('SELECT * FROM biker B INNER JOIN ruta R ON B.RUTAID = R.IDRUTA WHERE R.IDRUTA = '.$idruta);
    
            //creamos un array asociativo que contendrá toda la información que estamos demandando de la mase de datos.
            if ($resultado) {
                $bikers = $resultado->fetch_all(MYSQLI_ASSOC);
            }
    
            //pedimos que nos devuelva el array
            return $bikers;
    
        }
        
        
    }    
?>