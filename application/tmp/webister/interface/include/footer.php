         
                       
                    </section>
                    <section class="col-lg-3">
                        <div class="list list-info">

   
 <form class="navbar-form" role="search">
                <div class="input-group">
             <h1><?php echo $_SESSION['user']; ?></h1>
             
                </div>
            </form>
                        </div>
                    <div class="list list-info">
                                      <?php echo file_get_contents('data/head'); ?>
                    </div>
                        <div class="list list-info">
    <div class="account-information">
        <div class="head">Client Information</div>
        <table id="account-information">
          <ul>
          				<li class="ts-label">Status of Server</li>
			 <li>Hostname: <span class="badge"><?php echo gethostname(); ?>:<?php
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     echo $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);
    ?></span></li>
			 <li>IP Address: <span class="badge"><?php echo gethostbyname(gethostname()); ?>:<?php
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     echo $row[5];
     $mm = $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);
    ?></li>
    <li>MySQL Status: <i class="fa fa-check" aria-hidden="true"></i></li>
			<li>MySQL Hostname: <span class="badge">localhost</span></li>
   <li>MySQL Username: <span class="badge"><?php echo $_SESSION['user']; ?></span></li>
   <li>MySQL Password: <span class="badge">Same as CP</span></li>
   <li>Database: <span class="badge"><?php echo $_SESSION['user']; ?></span></li>
   <li>Webister Status: <i class="fa fa-check" aria-hidden="true"></i></li>
   <li>Status: 
       <?php


     if (Connect($mm)) {
         echo '<i class="fa fa-check" aria-hidden="true"></i>';
     } else {
         echo '<i class="fa fa-times" aria-hidden="true"></i>';
     }
    ?> </li>
    <li>	Disk Space (<?php echo bcdiv(GetDirectorySize('/var/webister/'.$myp), 1048576, 2); ?>/<?php echo $quote; ?>):<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo bcdiv(GetDirectorySize('/var/webister/'.$myp), 1048576, 2); ?>"
  aria-valuemin="0" aria-valuemax="<?php 
  if ($quote == "∞") {echo "99999999999999999";} else {
  echo $quote;
  }
  ?>" style="width:<?php echo bcdiv(GetDirectorySize('/var/webister/'.$myp), 1048576, 2); ?>%">
    <span class="sr-only"><?php echo bcdiv(GetDirectorySize('/var/webister/'.$myp), 1048576, 2); ?>% Complete</span>
  </div>
</div></li>
<li>
    Data Folder (
    <?php
    
    function scan_dir($path){
    $ite=new RecursiveDirectoryIterator($path);
    $nbfiles=0;
    foreach (new RecursiveIteratorIterator($ite) as $filename=>$cur) {
        $filesize=$cur->getSize();
        $nbfiles++;
        $files[] = $filename;
    }

 

    return array('total_files'=>$nbfiles,'files'=>$files);
}
$files = scan_dir('data');
echo $files['total_files'];
?>
/100):
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $files['total_files']; ?>"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $files['total_files']; ?>%">
    <span class="sr-only"><?php echo $files['total_files']; ?>% Complete</span>
  </div>
</div>
</li>

          </ul>
          
          <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>IP</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
<?php  $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data"); $sql = "SELECT * \n"
    ."FROM `FailedLogin` \n"
    .'LIMIT 0 , 5';

if ($result = mysqli_query($con, $sql)) {
    // Fetch one and one row
    while ($row = mysqli_fetch_row($result)) {
        echo '
    <tr><th scope="row">'.$row[0].'</th>
													<td>'.$row[1].'</td>
													<td>'.$row[2].'</td></tr>';
    }
}
    ?>
  
                                            </tbody>
                                        </table>
        </table>
    </div>
   
</div>       
<div class="list list-info">
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="H7P5P7PY5C4EL">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt=""  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
</form>

        </div>
</div> 
 
</section>
                </div>
            </section>
        </div>
        <script src="cpanel/bootpanel/js/bootstrap.min.js" type="text/javascript"></script>
        <div id="branding">
    Copyright Adaclare Technologies
    
</div>

	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>

	<script src="js/main.js"></script>
<script src="js/tour.js"></script>

		</body>
</html>