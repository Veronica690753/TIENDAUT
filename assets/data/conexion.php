<?php

class Conexion{
    var $conn;

    function conectar(){
        $conn = null;
        try{
            $conn = new PDO('mysql:host=localhost;dbname=tienda_ut', 'root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //echo 'Conectado exitosamente <br><br>';
    }catch(PDOException $e){
        echo 'Error al conectarse a la base de datos: '.$e->getMessage();
    }
    return $conn;
}

function buscarUsuario($user, $pass){
    $con = $this->conectar();

    $consulta = 'SELECT nombre
                 FROM usuario
                 WHERE usuario=:usuario 
                 AND contrasena=:pass';

    $stmt = $con->prepare($consulta);
    $stmt->execute(array(':usuario'=>$user,':pass'=>$pass));
    $registro = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $numRegistros = count($registro);

    return $numRegistros;
}

function agregarUsuario($user, $pass, $nombre, $correo){
    $con = $this->conectar();

    $stmt= $con->prepare('INSERT INTO usuario(usuario, contrasena, nombre, correo)
                          VALUES(:user, :pass, :nom, :correo)');
   $rows = $stmt->execute(array(':user'=>$user,':pass'=>$pass,':nom'=>$nombre,':correo'=>$correo));

    return $rows;
} 
}

?>