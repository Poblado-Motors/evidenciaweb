<?php 

// crear clase de conexion
class Conexion{
    private $host = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $db = "pobladomotors";

    // funcion publica de conectar 
    public function conectar(){
        try {
            $con = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8",$this->usuario,$this->clave);
            // echo 'Exitoso';
            return $con;
        } catch (PDOException $e) {
            echo "Error en la conexión o consulta: " . $e->getMessage();
        }
    }
}

?>