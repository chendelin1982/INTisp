<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */

 shell_exec("sudo service apache2 stop");
//shell_exec("cd /var/webister/interface && sudo nohup php -c /var/webister/php.ini -S 0.0.0.0:8081 > exhibitor.out 2>&1 &");
include '/var/www/html/web/config.php';
 $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data"); 
    $sql = "SELECT * \n"
    ."FROM `Users`";


$file = "from pyftpdlib.authorizers import DummyAuthorizer
from pyftpdlib.handlers import FTPHandler
from pyftpdlib.servers import FTPServer
authorizer = DummyAuthorizer()
";

$file_end = 'handler = FTPHandler
handler.banner = "Webister By Adaclare"
handler.authorizer = authorizer
server = FTPServer(("0.0.0.0", 21), handler)
server.max_cons_per_ip = 5
server.serve_forever()';


$u = "";

if ($result = mysqli_query($con, $sql)) {
    // Fetch one and one row
    while ($row = mysqli_fetch_row($result)) {
        if (!file_exists("/var/webister/" . $row[5])) {
            echo "Creating Port File " . $row[5];
            mkdir("/var/webister/" . $row[5]);
        }

$u = $u . 'authorizer.add_user("' . $row[1] . '", "' . $row[2] . '", "/var/webister/' . $row[5] . '", perm="elradfmw")

';
    }
}
$fttl = $file . $u . $file_end;
file_put_contents("/var/webister/ftpserv.py",$fttl);
exit;
