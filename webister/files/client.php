<?php
$fp = fsockopen("localhost", 1210, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "restart";
    fwrite($fp, $out);
 
    fclose($fp);
}
?>