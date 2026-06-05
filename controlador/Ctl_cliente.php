<?php 
// incluir el modelo de clientes de la carpeta modelo
include '../modelo/Clientes.php';

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
    $placa = $_REQUEST['placa'];
    $correo = $_REQUEST['correo'];
    $telefono = $_REQUEST['telefono'];

    // poner fecha actual
    date_default_timezone_set('America/Bogota');
    $fechaActual = date("Y-m-d");

    // instanciamos la clase clientes del modelo
    $cliente = new Clientes(null,$cliente,$vehiculo,$placa,$correo,$telefono,$fechaActual);
    $row = $cliente->guardar();

    // validamos si la funcion guadar es exitosa 
    if($row){
        echo '<script>alert("exitoso");
        window.location = "../clientes.php";
        </script>';
    }else{
        echo '<script>alert("Error intentelo de nuevo");
        window.location = "../clientes.php";
        </script>';
    }

}

// funcion para elieminar del controlador 
function eliminar(){
    $id_cliente = $_REQUEST['id_cliente'];

    // instanciamos la clase clientes del modelo
    $cliente = new Clientes($id_cliente,'','','','','','');
    $row = $cliente->eliminar();

    // validamos si la funcion guadar es exitosa 
    if($row){
        echo '<script>alert("exitoso");
        window.location = "../clientes.php";
        </script>';
    }else{
        echo '<script>alert("Error intentelo de nuevo");
        window.location = "../clientes.php";
        </script>';
    }

}

?>