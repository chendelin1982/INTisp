<?php
session_start();
if (isset($_GET['yes'])) {
    function newserv($port, $disk, $username, $password)
    {
        $returnval = '';
        $returnval = $returnval.'<br>Creating Port'.$port;
        mkdir('/var/webister/'.$port);
        $returnval = $returnval.'<br>Creating User'.$username;
        include 'config.php';
        
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     if ($username == $row[1]) {
         die("Error Username is not Unique");
     }
     if ($port == $row[5]) {
         die("Port number is not unique");
     }
 }
 
   mysqli_free_result($result);
    mysqli_close($con);
    
        $conn = mysqli_connect("$host", "$user", "$pass", 'webister');

        $sql = "INSERT INTO Users (id, username, password, bandwidth, diskspace, port)
VALUES ('".rand(10000, 99999)."', '".$username."', '".sha1($password)."','0','".$disk."','".$port."')";

        if ($conn->query($sql) === true) {
        } else {
            die('error');
        }

        $conn->close();

        $returnval = $returnval.'<br>Creating Database';
        
        $databasename = $_POST["databasename"];
        $dbpass = $_POST["dbpass"];



        // store connection info...

        $connection=mysqli_connect("localhost", "root", "$pass");


        // check connection...

        if (mysqli_connect_errno()) {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }


        $sql="CREATE DATABASE $username";

        mysqli_query($connection, $sql);

        // Create user

        $sql='grant usage on *.* to ' . $username . '@localhost identified by ' . "'" . "$password" . "'";

        mysqli_query($connection, $sql);


  

        $sql="grant all privileges on admin.* to admin@localhost";

        // echo "$sql";
        mysqli_query($connection, $sql);


        // mysql_connect('localhost', 'root', "$pass");
        // mysql_query("CREATE USER '$username'@'localhost' IDENTIFIED BY '$username';");
        // mysql_query("CREATE DATABASE $username");
        // mysql_query("GRANT ALL ON $username.* TO '$username'@'localhost'");
        // mysql_close();
        $returnval = $returnval.'<br>Trying to Restart Webister';
        shell_exec('sudo nohup killall python > exhibitor.out 2>&1 &');
        mkdir("/var/webister/" . $port);
        shell_exec("cd /var/webister/" . $port . "/ && sudo nohup php -S 0.0.0.0:" . $port. " > exhibitor.out 2>&1 &");
    

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */
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

        shell_exec("python /var/webister/ftpserv.py > exhibitor.out 2>&1 &");
        $returnval = $returnval.'<br>Done! Please restart webister';
        header('Location: ?pa='.urlencode($returnval));
    }
    newserv($_POST['pstart'], $_POST['disk'], $_POST['username'], $_POST['pend']);
}
require 'include/head.php';
onlyadmin();
?>
    <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">New Server</h2>
                        <p><?php if (isset($_GET['pa'])) {
                            echo ''.$_GET['pa'].'';
} ?></p>
                        <p>This could take a very long time. Once you create a user, please do not exit away from this page.</p>
                <form method="POST" action="?yes">
  <fieldset class="form-group">
    <label for="formGroupExampleInput">Username</label>
    <input type="text" class="form-control" name="username" id="formGroupExampleInput" placeholder="">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput">Disk Space in MB</label>
    <input type="text" class="form-control" name="disk" id="formGroupExampleInput" placeholder="">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput">Port</label>
    <input type="text" class="form-control" name="pstart" id="formGroupExampleInput" placeholder="">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput">Password</label>
    <input type="text" class="form-control" name="pend" id="formGroupExampleInput" placeholder="">
  </fieldset>
<button type="submit" class="btn btn-primary">Add User</button>
</form>			
<?php
require 'include/footer.php';
?>