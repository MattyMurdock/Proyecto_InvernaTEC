<?php
$file = "Temperatura.txt";
$fp = fopen($file, "r");
while(!feof($fp)){
    echo fread($fp, 4092);
}
fclose($fp);
?>