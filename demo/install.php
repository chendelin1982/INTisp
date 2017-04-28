<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */


error_reporting(0);
$DBServer = 'localhost';
$DBUser = $_POST["username"];
$DBPass = $_POST["password"];
$DBName = $_POST["database"];

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

// check connection
if ($conn->connect_error) {
    echo "Error Connecting to your database server. Please retry by pressing the back button.";
    die();
}

 $sql = 'CREATE TABLE Settings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
code VARCHAR(1000),
value VARCHAR(1000)
)';
$conn->query($sql);

 $sql = 'CREATE TABLE Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(1000),
password TEXT,
bandwidth TEXT,
diskspace TEXT,
port TEXT
)';
$conn->query($sql);
 $sql = 'CREATE TABLE FailedLogin (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
ip TEXT,
time TEXT
)';
$conn->query($sql);

$sql = "INSERT INTO Users (id, username, password, bandwidth, diskspace, port) VALUES ('2', 'admin', '".sha1('admin')."', '', '', '80')";
$conn->query($sql);
$sql = "INSERT INTO Settings (id, code, value) VALUES ('1', 'title', 'My Web Host')";
$conn->query($sql);
unlink('config.php');
file_put_contents('config.php', '<?php

$'.'host'." = 'localhost';
$".'user'."   = '" .$DBUser ."';
$".'pass'."   = '" .$DBPass ."';
$".'data'."   = '" .$DBName ."';


");




#Depreciated
#mysql_connect('localhost', 'root', $argv[1]);
#mysql_query("CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin';");
#mysql_query('CREATE DATABASE admin');
#mysql_query("GRANT ALL ON admin.* TO 'admin'@'localhost'");
#mysql_close();
unlink(".lock");
echo "<b>Installation Complete</b>";
echo "The default username and password is admin like normal.";
