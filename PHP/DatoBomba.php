<?php
$file = "bomba.txt";
$fp = fopen($file, "r");
while(!feof($fp)){
    echo fread($fp, 4092);
}
fclose($fp);
?>