/**
 * Archivo: /home/lazaro/Documentos/Proyectos/ProyectoFinal Equipo7/Proyecto_InvernaTEC/PHP/ingreso2.php
 * 
 * Este script PHP recibe parámetros a través de la URL y los inserta en una base de datos.
 * 
 * Parámetros esperados:
 * - usuario: Nombre del usuario (string)
 * - actuador: Nombre del actuador (string)
 * - marca: Marca del actuador (string)
 * 
 * Funcionalidad:
 * 1. Establece la zona horaria a 'America/Mexico_City'.
 * 2. Obtiene la fecha y hora actual.
 * 3. Incluye el archivo de conexión a la base de datos 'conexion2.php'.
 * 4. Inserta un nuevo registro en la tabla 'planta' con los datos proporcionados.
 * 5. Muestra un mensaje indicando si la inserción fue exitosa o fallida.
 * 
 * Dependencias:
 * - conexion2.php: Archivo que contiene la configuración y conexión a la base de datos.
 * 
 * Mensajes de salida:
 * - "Registro insertado exitoso" si la inserción en la base de datos fue exitosa.
 * - "Fallo en el registro" si hubo un error en la inserción.
 */
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