<?php

require("/var/www/html/interface/configdatabase.php");

if (isset($_SESSION["reseller"])) {
    $data = $_SESSION["reseller"];
}