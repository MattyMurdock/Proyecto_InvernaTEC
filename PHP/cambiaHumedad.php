/**
 *
 * Este script actualiza el valor de humedad almacenado en un archivo de texto.
 * Recupera el nuevo valor de humedad de una solicitud GET y lo escribe en "Humedad.txt".
 *
 * @package Proyecto_InvernaTEC
 * @subpackage PHP
 * @version 1.0
 *
 * @param string $_GET["valor"] El nuevo valor de humedad que se escribirá en el archivo.
 *
 * @return void Muestra un mensaje de confirmación indicando que el valor ha sido cambiado.
 */
<?php
$valoractual = $_GET["valor"];
$file = "Humedad.txt";
$fp = fopen($file, "w+");
$textov = " ";
fwrite($fp, $textov.$valoractual);
fclose($fp);
echo "valor cambiado";
?>