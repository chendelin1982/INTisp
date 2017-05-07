<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */
 shell_exec("sudo service apache2 stop");
shell_exec("cd /var/webister/interface && sudo php -S 0.0.0.0:8081 &>/dev/null &");
include '/var/webister/interface/config.php';
 $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data"); 
    $sql = "SELECT port \n"
    ."FROM `Users`";

if ($result = mysqli_query($con, $sql)) {
    // Fetch one and one row
    while ($row = mysqli_fetch_row($result)) {
        if (!file_exists("/var/webister/" . $row[0])) {
            echo "Creating Port File " . $row[0];
            mkdir("/var/webister/" . $row[0]);
        }
shell_exec("cd /var/webister/" . $row[0] . "/ && php -S 0.0.0.0:" . $row[0]. " &>/dev/null &");
    }
}
