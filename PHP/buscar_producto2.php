<?php
    include 'conexion2.php';

    $marca = $_GET['marca'];

    $consulta = "SELECT * FROM  planta WHERE marca= '$marca'";
    $resultado = $c ->query($consulta);

    while($fila = $resultado->fetch_array()){
        $usuario[] = array_map('utf8_encode',$fila);
    }

    echo json_encode($usuario);
    $resultado->close();
?>