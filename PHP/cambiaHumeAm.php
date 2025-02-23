/**
 * Este script PHP actualiza el contenido de un archivo de texto con un valor proporcionado a través de una solicitud GET.
 * 
 * Parámetros de entrada:
 * - valor (string): El nuevo valor que se escribirá en el archivo "HumedadAm.txt".
 * 
 * Funcionamiento:
 * 1. Obtiene el valor actual desde la solicitud GET.
 * 2. Abre el archivo "HumedadAm.txt" en modo de escritura.
 * 3. Escribe el valor obtenido en el archivo.
 * 4. Cierra el archivo.
 * 5. Imprime un mensaje indicando que el valor ha sido cambiado.
 * 
 * Archivo:
 * 
 * Salida:
 * - Mensaje "valor cambiado" indicando que la operación se realizó con éxito.
 */
<?php
$valoractual = $_GET["valor"];
$file = "HumedadAm.txt";
$fp = fopen($file, "w+");
$textov = " ";
fwrite($fp, $textov.$valoractual);
fclose($fp);
echo "valor cambiado";
?>