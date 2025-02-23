<?php
$valoractual = $_GET["valor"];
$file = "HumedadAm.txt";
$fp = fopen($file, "w+");
$textov = " ";
fwrite($fp, $textov.$valoractual);
fclose($fp);
echo "valor cambiado";
?>