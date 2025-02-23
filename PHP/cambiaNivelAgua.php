/**
 * cambiaNivelAgua.php
 * 
 * Este script PHP cambia el valor del nivel de agua almacenado en un archivo de texto.
 * 
 * Parámetros de entrada:
 * - valor (GET): El nuevo valor del nivel de agua que se desea almacenar.
 * 
 * Funcionamiento:
 * 1. Obtiene el valor del nivel de agua desde los parámetros GET.
 * 2. Abre el archivo "NivelAgua.txt" en modo de escritura.
 * 3. Escribe el nuevo valor del nivel de agua en el archivo.
 * 4. Cierra el archivo.
 * 5. Imprime un mensaje indicando que el valor ha sido cambiado.
 * 
 * Archivo:
 * - NivelAgua.txt: Archivo de texto donde se almacena el valor del nivel de agua.
 * 
 * Salida:
 * - Mensaje "valor cambiado" indicando que el valor ha sido actualizado correctamente.
 */
<?php
$valoractual = $_GET["valor"];
$file = "NivelAgua.txt";
$fp = fopen($file, "w+");
$textov = " ";
fwrite($fp, $textov.$valoractual);
fclose($fp);
echo "valor cambiado";
?>