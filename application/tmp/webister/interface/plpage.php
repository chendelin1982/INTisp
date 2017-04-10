<?php
include ("include/head.php");
require("plugins/" . $_GET["pl"]);
if ($menu_only_admin) {
    onlyadmin();
}
page();
include ("include/footer.php");
?>