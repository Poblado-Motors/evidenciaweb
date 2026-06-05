<?php 

class Clientes{
    //parametros 
    private $id_cliente;
    private $cliente;
    private $vehiculo;
    private $placa;
    private $correo;
    private $telefono;
    private $fecha;

    // constructor 
    public function __Construct($id_cliente,$cliente,$vehiculo,$placa,$correo,$telefono,$fecha){
        $this->id_cliente = $id_cliente;
        $this->cliente = $cliente;
        $this->vehiculo = $vehiculo;
        $this->placa = $placa;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->fecha = $fecha;
    }

    // metodo guardar 
    public function guardar(){
        // incluir la conexion
        include '../db/Conexion.php';
        // instanciar la conexion
        $con = new Conexion();
        $conexion = $con->conectar();

        // sentencia sql
        $sql = $conexion->prepare("INSERT INTO clientes (id_cliente,cliente,vehiculo,placa,correo,telefono,fecha) VALUES (:id_cliente, :cliente, :vehiculo, :placa, :correo, :telefono, :fecha)");
        $sql->bindParam(':id_cliente', $this->id_cliente);
        $sql->bindParam(':cliente', $this->cliente);
        $sql->bindParam(':vehiculo', $this->vehiculo);
        $sql->bindParam(':placa', $this->placa);
        $sql->bindParam(':correo', $this->correo);
        $sql->bindParam(':telefono', $this->telefono);
        $sql->bindParam(':fecha', $this->fecha);
        $resultado = $sql->execute();
        return $resultado;
    }

    // metodo eliminar 
    public function eliminar(){
        // incluir la conexion
        include '../db/Conexion.php';
        // instanciar la conexion
        $con = new Conexion();
        $conexion = $con->conectar();

        // sentencia sql
        $sql = $conexion->prepare("DELETE FROM clientes WHERE id_cliente = :id_cliente");
        $sql->bindParam(':id_cliente', $this->id_cliente);
        $result = $sql->execute();
        return $result;
    }

    // metodo mostrar 
    public function mostrar(){
        // incluir la conexion
        include 'db/Conexion.php';
        // instanciar la conexion
        $con = new Conexion();
        $conexion = $con->conectar();

        // sentencia sql
        $sql = $conexion->prepare("SELECT * FROM clientes");
        $sql->execute();
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    // contar clientes
    public function mostrarClientes(){
        // incluir la conexion
        require_once 'db/Conexion.php';
        // instanciar la conexion
        $con = new Conexion();
        $conexion = $con->conectar();

        // sentencia sql
        $sql = $conexion->prepare("SELECT COUNT(*) AS total FROM clientes");
        $sql->execute();
        $resultados = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultados;
    }

    // contar servicios del mes
    public function mostrarServicios(){
        // incluir la conexion
        require_once 'db/Conexion.php';
        // instanciar la conexion
        $con = new Conexion();
        $conexion = $con->conectar();

        // poner fecha actual
        date_default_timezone_set('America/Bogota');
        $fechaActual = date("Y-m-d");

        // sentencia sql
        $sql = $conexion->prepare("SELECT COUNT(*) AS total FROM clientes WHERE fecha >= '$fechaActual'");
        $sql->execute();
        $resultados = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultados;
    }

    // metodo actualizar
    public function editar(){
        // incluir la conexion
        include '../db/Conexion.php';
        // instanciar la conexion
        $con = new Conexion();
        $conexion = $con->conectar();

        // sentencia sql
        $sql = $conexion->prepare("UPDATE clientes SET cliente=:cliente,vehiculo=:vehiculo,placa=:placa,correo=:correo,telefono=:telefono,fecha=:fecha WHERE id_cliente=:id_cliente");
        $sql->bindParam(':id_cliente', $this->id_cliente);
        $sql->bindParam(':cliente', $this->cliente);
        $sql->bindParam(':vehiculo', $this->vehiculo);
        $sql->bindParam(':placa', $this->placa);
        $sql->bindParam(':correo', $this->correo);
        $sql->bindParam(':telefono', $this->telefono);
        $sql->bindParam(':fecha', $this->fecha);
        $sql->execute();
    }


}


?>