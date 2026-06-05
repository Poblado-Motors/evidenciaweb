<?php 

class Ordenes{
    //parametros 
    private $id_orden;
    private $cliente;
    private $vehiculo;
    private $servicio;
    private $prioridad;
    private $descripcion;
    private $estado;
    private $costo;

    // constructor 
    public function __Construct($id_orden,$cliente,$vehiculo,$servicio,$prioridad,$descripcion,$estado,$costo){
        $this->id_orden = $id_orden;
        $this->cliente = $cliente;
        $this->vehiculo = $vehiculo;
        $this->servicio = $servicio;
        $this->prioridad = $prioridad;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->costo = $costo;
    }

    // metodo guardar 
    public function guardar(){
        // incluir la conexion
        include '../db/Conexion.php';
        // instanciar la conexion
        $con = new Conexion();
        $conexion = $con->conectar();

        // sentencia sql
        $sql = $conexion->prepare("INSERT INTO ordenes (id_orden,cliente,vehiculo,servicio,prioridad,descripcion,estado,costo) VALUES (:id_orden, :cliente, :vehiculo, :servicio, :prioridad, :descripcion, :estado, :costo)");
        $sql->bindParam(':id_orden', $this->id_orden);
        $sql->bindParam(':cliente', $this->cliente);
        $sql->bindParam(':vehiculo', $this->vehiculo);
        $sql->bindParam(':servicio', $this->servicio);
        $sql->bindParam(':prioridad', $this->prioridad);
        $sql->bindParam(':descripcion', $this->descripcion);
        $sql->bindParam(':estado', $this->estado);
        $sql->bindParam(':costo', $this->costo);
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
        $sql = $conexion->prepare("DELETE FROM ordenes WHERE id_orden = :id_orden");
        $sql->bindParam(':id_orden', $this->id_orden);
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
        $sql = $conexion->prepare("SELECT * FROM ordenes");
        $sql->execute();
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    // contar ordenes activas
    public function mostrarOrdenes(){
        // incluir la conexion
        require_once 'db/Conexion.php';
        // instanciar la conexion
        $con = new Conexion();
        $conexion = $con->conectar();

        // sentencia sql
        $sql = $conexion->prepare("SELECT COUNT(*) AS total FROM ordenes WHERE estado = 1");
        $sql->execute();
        $resultados = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultados;
    }

    // contar ordenes inactivas
    public function mostrarOrdenesI(){
        // incluir la conexion
        require_once 'db/Conexion.php';
        // instanciar la conexion
        $con = new Conexion();
        $conexion = $con->conectar();

        // sentencia sql
        $sql = $conexion->prepare("SELECT COUNT(*) AS total FROM ordenes WHERE estado = 0");
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
        $sql = $conexion->prepare("UPDATE ordenes SET cliente=:cliente,vehiculo=:vehiculo,servicio=:servicio,prioridad=:prioridad,descripcion=:descripcion,estado=:estado,costo=:costo WHERE id_orden=:id_orden");
        $sql->bindParam(':id_orden', $this->id_orden);
        $sql->bindParam(':cliente', $this->cliente);
        $sql->bindParam(':vehiculo', $this->vehiculo);
        $sql->bindParam(':servicio', $this->servicio);
        $sql->bindParam(':prioridad', $this->prioridad);
        $sql->bindParam(':descripcion', $this->descripcion);
        $sql->bindParam(':estado', $this->estado);
        $sql->bindParam(':costo', $this->costo);
        $sql->execute();
    }


}


?>