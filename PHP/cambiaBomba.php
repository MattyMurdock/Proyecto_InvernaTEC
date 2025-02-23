/**
 * Este script PHP cambia el valor almacenado en un archivo de texto llamado "bomba.txt".
 * 
 * Parámetros de entrada:
 * - valor (string): El nuevo valor que se escribirá en el archivo "bomba.txt".
 * 
 * Funcionalidad:
 * 1. Obtiene el valor actual desde los parámetros GET de la URL.
 * 2. Abre el archivo "bomba.txt" en modo de escritura.
 * 3. Escribe el nuevo valor en el archivo.
 * 4. Cierra el archivo.
 * 5. Imprime un mensaje indicando que el valor ha sido cambiado.
 * 
 * Advertencia:
 * - Este script sobrescribirá cualquier contenido existente en el archivo "bomba.txt".
 * - Asegúrese de que el archivo "bomba.txt" tenga los permisos adecuados para ser escrito.
 */
<?php
$valoractual = $_GET["valor"];
$file = "bomba.txt";
$fp = fopen($file, "w+");
$textov = " ";
fwrite($fp, $textov.$valoractual);
fclose($fp);
echo "valor cambiado";
?>