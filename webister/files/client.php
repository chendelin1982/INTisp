<?php
$fp = fsockopen("serv-2.adaclare.com", 1209, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "hash newreseller 915691 915691 water water";
    fwrite($fp, $out);
 
    fclose($fp);
}
?>