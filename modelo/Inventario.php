<?php 

class Inventario{
    //parametros 
    private $codigo;
    private $producto;
    private $categoria;
    private $stock;
    private $stock_min;
    private $precio;
    private $estado;

    // constructor 
    public function __Construct($codigo,$producto,$categoria,$stock,$stock_min,$precio,$estado){
        $this->codigo = $codigo;
        $this->producto = $producto;
        $this->categoria = $categoria;
        $this->stock = $stock;
        $this->stock_min = $stock_min;
        $this->precio = $precio;
        $this->estado = $estado;
    }

    // metodo guardar 
    public function guardar(){
        // incluir la conexion
        include '../db/Conexion.php';
        // instanciar la conexion
        $con = new Conexion();
        $conexion = $con->conectar();

        // sentencia sql
        $sql = $conexion->prepare("INSERT INTO inventario (codigo,producto,categoria,stock,stock_min,precio,estado) VALUES (:codigo, :producto, :categoria, :stock, :stock_min, :precio, :estado)");
        $sql->bindParam(':codigo', $this->codigo);
        $sql->bindParam(':producto', $this->producto);
        $sql->bindParam(':categoria', $this->categoria);
        $sql->bindParam(':stock', $this->stock);
        $sql->bindParam(':stock_min', $this->stock_min);
        $sql->bindParam(':precio', $this->precio);
        $sql->bindParam(':estado', $this->estado);
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
        $sql = $conexion->prepare("DELETE FROM inventario WHERE codigo = :codigo");
        $sql->bindParam(':codigo', $this->codigo);
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
        $sql = $conexion->prepare("SELECT * FROM inventario");
        $sql->execute();
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    // contar inventario
    public function mostrarInventario(){
        // incluir la conexion
        require_once 'db/Conexion.php';
        // instanciar la conexion
        $con = new Conexion();
        $conexion = $con->conectar();

        // sentencia sql
        $sql = $conexion->prepare("SELECT COUNT(*) AS total FROM inventario");
        $sql->execute();
        $resultados = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultados;
    }

    // contar stock de inventario
    public function mostrarStock(){
        // incluir la conexion
        require_once 'db/Conexion.php';
        // instanciar la conexion
        $con = new Conexion();
        $conexion = $con->conectar();

        // sentencia sql
        $sql = $conexion->prepare("SELECT COUNT(*) AS total FROM inventario WHERE stock <= 5");
        $sql->execute();
        $resultados = $sql->fetch(PDO::FETCH_ASSOC);
        return $resultados;
    }

    // sumar valor del inventario
    public function sumarStock(){
        // incluir la conexion
        require_once 'db/Conexion.php';
        // instanciar la conexion
        $con = new Conexion();
        $conexion = $con->conectar();

        // sentencia sql
        $sql = $conexion->prepare("SELECT SUM(precio) AS total FROM inventario");
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
        $sql = $conexion->prepare("UPDATE inventario SET cliente=:cliente,vehiculo=:vehiculo,servicio=:servicio,prioridad=:prioridad,descripcion=:descripcion,estado=:estado,costo=:costo WHERE id_orden=:id_orden");
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