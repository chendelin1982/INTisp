<?php session_start(); require 'include/head.php';onlyadmin();
if (isset($_POST["fileToUpload"])) {
file_put_contents("patch.deb",file_get_contents($_POST["fileToUpload"]));
       $out = exec("cd /var/webister/interface && dpkg -i patch.deb > log.log");
       echo $out;
}


?>
<h1>Update to New Version</h1>
<form action="#" method="post" enctype="multipart/form-data">
    Enter url to patch:
    <input type="text" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php
require 'include/footer.php';
?>