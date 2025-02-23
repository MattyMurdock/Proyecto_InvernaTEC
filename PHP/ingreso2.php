<?php
$usuario=$_GET["usuario"];
$actuador=$_GET["actuador"];
$marca=$_GET["marca"];

date_default_timezone_set('America/Mexico_City');
$hora=date("Y-m-d H:i:s");

$cont=0;
include("conexion2.php");

$q=mysqli_query($c,"INSERT INTO planta(usuario, actuador, hora, marca) VALUES ('$usuario', '$actuador', '$hora', '$marca')");

if($q){
    echo "Registro insertado exitoso";
}
else{
    echo "Fallo en el registro";
}
?>