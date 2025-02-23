/**
 * Archivo: cambiaVentilador.php
 * 
 * Este script PHP recibe un valor a través de una solicitud GET y lo escribe en un archivo de texto llamado "ventilador.txt".
 * 
 * Parámetros de entrada:
 * - valor (string): El valor que se desea escribir en el archivo "ventilador.txt".
 * 
 * Funcionalidad:
 * 1. Obtiene el valor del parámetro "valor" de la solicitud GET.
 * 2. Abre el archivo "ventilador.txt" en modo de escritura.
 * 3. Escribe el valor obtenido en el archivo.
 * 4. Cierra el archivo.
 * 5. Imprime un mensaje indicando que el valor ha sido cambiado.
 * 
 * Salida:
 * - Muestra el mensaje "valor cambiado" después de escribir en el archivo.
 * 
 * Uso:
 * Este script se puede invocar mediante una URL con el parámetro "valor", por ejemplo:
 * http://example.com/cambiaVentilador.php?valor=1
 * 
 * Notas:
 * - Asegúrese de que el archivo "ventilador.txt" tenga los permisos adecuados para ser escrito por el servidor web.
 * - Este script sobrescribirá el contenido existente en "ventilador.txt".
 */
<?php
$valoractual = $_GET["valor"];
$file = "ventilador.txt";
$fp = fopen($file, "w+");
$textov = " ";
fwrite($fp, $textov.$valoractual);
fclose($fp);
echo "valor cambiado";
?>