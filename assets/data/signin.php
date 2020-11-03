<?php
include('conexion.php');

$obj = new Conexion;

$user = $_POST['inputUser'];
$pass    = $_POST['inputPassword'];
$nombre = $_POST['inputName'];
$correo = $_POST['inputEmail'];




$res= $obj->agregarUsuario($user, $pass, $nombre, $correo);

if($res == 1){
    $datos = array('dato' => 'ok');
}else{
    $datos = array('dato' => 'NO EXISTE');
}


//$datos = array('datos' => $texto);//que guarde lo que viene en texto

echo json_encode($datos, JSON_FORCE_OBJECT);
?>