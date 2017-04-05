<?php
error_reporting(0);
session_start();
include 'config.php';
function onlyadmin () {
     if ($_SESSION['user'] == 'admin') {
         
     } else {
         die();
     }
}
if (!isset($_SESSION['user'])) {
    header('Location: index.php?page=main');
    die();
}
     function Connect($port)
     {
         $serverConn = @stream_socket_client("tcp://127.0.0.1:$port", $errno, $errstr);
         if ($errstr != '') {
             return false;
         }
         fclose($serverConn);

         return true;
     }
 function GetDirectorySize($path)
 {
     $bytestotal = 0;
     $path = realpath($path);
     if ($path !== false) {
         foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object) {
             $bytestotal += $object->getSize();
         }
     }

     return $bytestotal;
 }

$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     $quote = $row[4];
     if ($quote == '') {
         $quote = '∞';
     }
 }
   mysqli_free_result($result);
    mysqli_close($con);
?>
<?php
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     $myp = $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);
    ?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            .loadText{
    font-family: Arial;
    color:#000;
	font-size: 30px;
}
.preloader{
    background-color:#FFF;
    height: 100%;
	padding-top: 60px;
	margin-left: -20px;
	margin-top: -20px;
	position: fixed;
	width: 100%;
	z-index: 2;
}
        </style>
        <?php
        $cp = basename($_SERVER["SCRIPT_FILENAME"], '.php');
        if ($cp == "cp") {
            ?>
           <div class="preloader" id="preloader">
    <img src="http://www.arabianbusiness.com/skins/ab.main/gfx/loading_spinner.gif" class="img-responsive center-block">
	<p class="text-center loadText">Loading...</p>
</div>
<?php } ?>
                    <meta charset="UTF-8">
                    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
            <title>Webister</title>
            <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
            <link rel="icon" href="https://www.kalzediahosting.com/assets/kh.png">
          
            <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
            <?php if (file_Get_contents("data/theme") == "default") { ?>
            <link rel="stylesheet" type="text/css" href="cpanel\bootpanel\css\bootstrap.min.css">
                 <link rel="stylesheet" type="text/css" href="cpanel\bootpanel\css\admin.css">
            <link rel="stylesheet" type="text/css" href="cpanel\bootpanel\css\custom.css">
			            <link rel="stylesheet" type="text/css" href="cpanel\bootpanel\css\local.css">
            <?php } ?>
            
            <script src="cpanel\bootpanel\js\engine.js" type="text/javascript"></script>
     
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
            <![endif]-->   
              <?php if (file_Get_contents("data/theme") == "modern") { ?>
            <link rel="stylesheet" type="text/css" href="cpanel\bootpanel\css\modern.css">
            <?php } ?>
            <?php if (file_Get_contents("data/theme") == "dark") { ?>
            <link rel="stylesheet" type="text/css" href="cpanel\bootpanel\css\dark.css">
            <?php } ?>
            </head>
    <body class="skin-blue dashboard">


   <div id="cpanel">
        <div id="border-efx">
        <!--Handheld heading-->
    <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      	<a href="index.php?page=cp" class="navbar-brand">Webister on <b><?php
include 'config.php';
    $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data");
// Check connection
    $sql = "SELECT value FROM Settings WHERE code =  'title' LIMIT 0 , 30";
if ($result = mysqli_query($con, $sql)) {
    // Fetch one and one row
  while ($row = mysqli_fetch_row($result)) {
      printf($row[0]);
  }
  // Free result set
  mysqli_free_result($result);
}
mysqli_close($con);
?></b></a> 
    </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
               <li><a><span class="badge">build # <?php echo file_get_contents("data/version"); ?></span></a></li>
               <li><a><span class="badge"><?php echo php_uname("s"); ?> <?php echo php_uname("r"); ?>.<?php echo php_uname("m"); ?></span></a></li>
              </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="cp.php"><i class="fa fa-1x fa-home"></i></a></li>
         <li><a href="FileManager.php"><i class="fa fa-1x fa-file"></i></a></li>
         <li><a href="adminer-4.2.4.php?server=localhost"><i class="fa fa-1x fa-database"></i></a></li>
         <?php
			  function isSSL()
    {
        if( !empty( $_SERVER['https'] ) )
            return true;
        if( !empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' )
            return true;
        return false;
    }
			if (!isSSL()) {
				?>
				<li><A><i style="color:red" class="fa fa-1x fa-unlock"></i></A></li>
				<?php
			} else {
			?>
				<li><A><i style="color:green" class="fa fa-1x fa-lock"></i></A></li>
			<?php
			}
			?>
      <li><a href="" data-toggle="modal" data-target="#myModal"><i class="fa fa-1x fa-user"></i></a></li>
      <li><a href="logout.php">Log out</a></li>
            </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 <br>
 <br>
 <br>
 <br>

 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change My Password</h4>
        </div>
        <form method="POST" action="pass.php">
        <div class="modal-body">
             <form class="form-horizontal" role="form">
                  <div class="form-group">
                  	<input type="hidden" name="username" value="<?php echo $_SESSION['user'] ?>">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" 
                        id="inputEmail3" placeholder="password"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Change IT</button>
                    </div>
                  </div>
        </div></form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
            <section class="content">

                <div class="row">
                    <section class="col-lg-9">
        
             
                   
                       <hr>
                       