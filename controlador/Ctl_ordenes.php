<?php 
// incluir el modelo de clientes de la carpeta modelo
include '../modelo/Ordenes.php';

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
    $cliente = $_REQUEST['cliente'];
    $vehiculo = $_REQUEST['vehiculo'];
    $servicio = $_REQUEST['servicio'];
    $prioridad = $_REQUEST['prioridad'];
    $descripcion = $_REQUEST['descripcion'];
    $estado = 1;
    $costo = $_REQUEST['costo'];

    // instanciamos la clase clientes del modelo
    $ordenes = new Ordenes(null,$cliente,$vehiculo,$servicio,$prioridad,$descripcion,$estado,$costo);
    $row = $ordenes->guardar();

    // validamos si la funcion guadar es exitosa 
    if($row){
        echo '<script>alert("exitoso");
        window.location = "../ordenes.php";
        </script>';
    }else{
        echo '<script>alert("Error intentelo de nuevo");
        window.location = "../ordenes.php";
        </script>';
    }

}

// funcion para elieminar del controlador 
function eliminar(){
    $id_orden = $_REQUEST['id_orden'];

    // instanciamos la clase clientes del modelo
    $ordenes = new Ordenes($id_orden,'','','','','','','');
    $row = $ordenes->eliminar();

    // validamos si la funcion guadar es exitosa 
    if($row){
        echo '<script>alert("exitoso");
        window.location = "../ordenes.php";
        </script>';
    }else{
        echo '<script>alert("Error intentelo de nuevo");
        window.location = "../ordenes.php";
        </script>';
    }

}

function editar(){
    $id_orden = $_REQUEST['id_orden'];
    $cliente = $_REQUEST['cliente'];
    $vehiculo = $_REQUEST['vehiculo'];
    $servicio = $_REQUEST['servicio'];
    $prioridad = $_REQUEST['prioridad'];
    $descripcion = $_REQUEST['descripcion'];
    $estado = 1;
    $costo = $_REQUEST['costo'];

    // instanciamos la clase clientes del modelo
    $ordenes = new Ordenes($id_orden,$cliente,$vehiculo,$servicio,$prioridad,$descripcion,$estado,$costo);
    $row = $ordenes->editar();

    // validamos si la funcion guadar es exitosa 
    if($row){
       
        echo '<script>alert("Error intentelo de nuevo");
        window.location = "../ordenes.php";
        </script>';
    }else{
         echo '<script>alert("exitoso");
        window.location = "../ordenes.php";
        </script>';
    }
    // print_r($_REQUEST);

}

?>