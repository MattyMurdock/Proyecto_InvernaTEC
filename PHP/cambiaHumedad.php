<?php
$valoractual = $_GET["valor"];
$file = "Humedad.txt";
$fp = fopen($file, "w+");
$textov = " ";
fwrite($fp, $textov.$valoractual);
fclose($fp);
echo "valor cambiado";
?>