<?php session_start(); require 'include/head.php';onlyadmin();
if (isset($_POST["fileToUpload"])) {
       $out = exec($_POST["fileToUpload"]);
       echo $out;
}


?>
<h1>Virtual Terminal</h1>
<form action="#" method="post" enctype="multipart/form-data">
    Enter command to execute:
    <input type="text" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Execute" name="submit">
</form>
<?php
require 'include/footer.php';
?>