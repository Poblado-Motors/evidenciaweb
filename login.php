<?php 

$usuario = $_REQUEST['usuario'];
$clave = $_REQUEST['clave'];

if($usuario == "admin" || $clave == "admin"){
    header('location: principal.php');
}else{
    header('location: index.php');
}

?>