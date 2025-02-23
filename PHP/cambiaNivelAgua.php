<?php
$valoractual = $_GET["valor"];
$file = "NivelAgua.txt";
$fp = fopen($file, "w+");
$textov = " ";
fwrite($fp, $textov.$valoractual);
fclose($fp);
echo "valor cambiado";
?>