/**
 ** Este script PHP cambia el valor de la temperatura almacenado en un archivo de texto.
 * 
 * Parámetros de entrada:
 * - valor (GET): El nuevo valor de la temperatura que se desea almacenar.
 * 
 ** Funcionalidad:
 * 1. Obtiene el valor de la temperatura desde los parámetros GET.
 * 2. Abre el archivo "Temperatura.txt" en modo de escritura.
 * 3. Escribe el nuevo valor de la temperatura en el archivo.
 * 4. Cierra el archivo.
 * 5. Imprime un mensaje indicando que el valor ha sido cambiado.
 * 
 *? Archivo:
 * - Temperatura.txt: Archivo donde se almacena el valor de la temperatura.
 * 
 * Ejemplo de uso:
 * http://tu_dominio/cambiaTem.php?valor=25
 * 
 *! Advertencia:
 * Asegúrese de que el archivo "Temperatura.txt" tenga los permisos adecuados para ser escrito por el servidor web.
 */
/***
 <?php
$valoractual = $_GET["valor"];
$file = "Temperatura.txt";
$fp = fopen($file, "w+");
$textov = " ";
fwrite($fp, $textov.$valoractual);
fclose($fp);
echo "valor cambiado";
?>