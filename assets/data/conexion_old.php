<?php
try{
    $con = new PDO('mysql:host=localhost;dbname=agenda','root','');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo 'Conectado exitosamente <br><br>';

    /**$stmt = $con->prepare('SELECT nombre FROM usuarios');
    $stmt->execute();

    while($datos = $stmt->fetch() ){
        echo 'Nombre: ' . $datos[0] . '<br>';
    }*/

    $user = 'Alma Rosa';
    /*
//Refresa el registro de Alejandro
    $stmt = $con->prepare('SELECT nombre, correo FROM usuarios WHERE nombre=:usuario');
    //$stmt->execute(array(':usuario'=>$user));
    $stmt->bindParam(':usuario',$user, PDO::PARAM_STR);
    $stmt->execute();

    while($datos = $stmt->fetch() ){
        echo 'Nombre: ' . $datos[0] . '<br>' . 'Correo: ' . $datos[1];
    }*/
        $nom = 'Luzma';
        $correo = 'vero.arcxvos@gamil.com';
        $celular = '234325436';
    //INSERCIÓN DE UN REGISTRO
    /*
    $stmt = $con->prepare('INSERT INTO usuarios(nombre, correo, celular) VALUES(:nom, :correo,:cel)');
    $rows = $stmt->execute(array(':nom'=>$nom,
                                 ':correo'=>$correo,
                                 ':cel'=>$celular));
    if($rows == 1){
        echo '¡Insercción exitosa!';
    }*/

    //MODIFICACIÓN DE UN REGISTRO
    $stmt = $con->prepare('UPDATE usuarios SET nombre=:user WHERE nombre=:nom');
    $rows = $stmt->execute(array(':user'=>$user, ':nom'=>$nom));

    if($rows > 0){
        echo '¡Modificación exitosa!';
    }
/*
    $stmt = $con->prepare('DELETE FROM usuarios WHERE nombre=:user');
    $rows = $stmt->execute(array(':user'=>$user));
    if($rows > 0){
        echo 'Eliminación exitosa!';
    }*/

}catch(PDOException $e){
    echo 'Error al conectarse a la base de datos: '.$e->getMessage();
}
?>