<?php session_start(); require 'include/head.php';onlyadmin();
if (isset($_POST["fileToUpload"])) {
       $out = exec($_POST["fileToUpload"]);
       echo $out;
}


?>
<h1>Virtual Terminal</h1>
You are not allowed to use this in a demo!!!
<?php
require 'include/footer.php';
?>