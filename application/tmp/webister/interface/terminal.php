<?php session_start(); require 'include/head.php';onlyadmin();include("include/mail.php");
if (isset($_POST["fileToUpload"])) {
       $out = exec($_POST["fileToUpload"]);
       sendemailuser("New Command Terminal","<b>A new command has been executed in the terminal. The command was " . $_POST["fileToUpload"] . "</b><p>If you feel that you did not run this command, we highly recommend that you change the password of both the admin panel and linux.</p><p>This email is automatically sent out everytime a setting is changed. To disable this feature please visit the control panel and set the email to nothing.");
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