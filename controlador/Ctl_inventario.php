<?php 
// incluir el modelo de clientes de la carpeta modelo
include '../modelo/Inventario.php';

// pasamos la variable que biene des de el boton del formulario
$operacion = $_REQUEST['operacion'];

// usamos un switch

switch ($operacion) {
    // clase que llama a la funcion fuardar y egecuta el metodo guardar
    case 'Guardar':guardar();break;
    case 'Eliminar':eliminar();break;
}

// funcion guardar del controlador
function guardar(){
    $codigo = $_REQUEST['codigo'];
    $producto = $_REQUEST['producto'];
    $categoria = $_REQUEST['categoria'];
    $stock = $_REQUEST['stock'];
    $stock_min = $_REQUEST['stock_min'];
    $precio = $_REQUEST['precio'];
    $estado = 1;

    // instanciamos la clase clientes del modelo
    $inventario = new Inventario($codigo,$producto,$categoria,$stock,$stock_min,$precio,$estado);
    $row = $inventario->guardar();

    // validamos si la funcion guadar es exitosa 
    if($row){
        echo '<script>alert("exitoso");
        window.location = "../inventario.php";
        </script>';
    }else{
        echo '<script>alert("Error intentelo de nuevo");
        window.location = "../inventario.php";
        </script>';
    }

}

// funcion para elieminar del controlador 
function eliminar(){
    $codigo = $_REQUEST['codigo'];

    // instanciamos la clase clientes del modelo
    $inventario = new Inventario($codigo,'','','','','','');
    $row = $inventario->eliminar();

    // validamos si la funcion guadar es exitosa 
    if($row){
        echo '<script>alert("exitoso");
        window.location = "../inventario.php";
        </script>';
    }else{
        echo '<script>alert("Error intentelo de nuevo");
        window.location = "../inventario.php";
        </script>';
    }

}

function editar(){
    $codigo = $_REQUEST['codigo'];
    $producto = $_REQUEST['producto'];
    $categoria = $_REQUEST['categoria'];
    $stock = $_REQUEST['stock'];
    $stock_min = $_REQUEST['stock_min'];
    $precio = $_REQUEST['precio'];
    $estado = 1;

    // instanciamos la clase clientes del modelo
    $inventario = new Inventario($codigo,$producto,$categoria,$stock,$stock_min,$precio,$estado);
    $row = $inventario->editar();

    // validamos si la funcion guadar es exitosa 
    if($row){
        echo '<script>alert("exitoso");
        window.location = "../inventario.php";
        </script>';
    }else{
        echo '<script>alert("Error intentelo de nuevo");
        window.location = "../inventario.php";
        </script>';
    }

}

?>