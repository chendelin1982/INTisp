<?php require 'include/head.php';
?>
   
            <?php if ($_SESSION['user'] == 'admin') {
    ?>
                                
  <ul class="list-group">
  <li class="list-group-item">Power Management</li>
  <li class="list-group-item">            <a type="button" href="action.php?act=pwr" class="btn btn-default"><i class="fa  fa-5x fa-power-off"></i><hr>Stop</a>
                                        <a type="button" href="action.php?act=restart" class="btn btn-default"><i class="fa fa-5x fa-refresh"></i><hr>Restart</a>
                                        <a type="button" href="action.php?act=server" class="btn btn-default"><i class="fa fa-5x fa-server"></i><hr>Restart</a>
                                        <a type="button" href="action.php?act=mysql" class="btn btn-default"><i class="fa fa-5x fa-database"></i><hr>Restart</a></li>
  </li>
  </ul>
<ul class="list-group">
  <li class="list-group-item">Servers</li>
  <li class="list-group-item">  

                                        <a type="button" href="newserv.php" class="btn btn-default"><i class="fa fa-5x fa-plus"></i><hr>New Server</a>
                                        <a type="button" href="index.php?page=list#" class="btn btn-default"><i class="fa fa-5x fa-user"></i><hr>Users</a>
                                        <a type="button" href="plans.php" class="btn btn-default"><i class="fa fa-5x fa-columns" aria-hidden="true"></i><hr>Plans</a>
                                         </li>
  </ul>
                                      <ul class="list-group">
  <li class="list-group-item">System</li>
  <li class="list-group-item">  

                                  <a type="button" href="settings.php" class="btn btn-default"><i class="fa fa-5x fa-sliders"></i><hr>Settings</a>
                                        <a type="button" href="terminal.php" class="btn btn-default"><i class="fa fa-5x fa-terminal"></i><hr>Terminal</a>
                                        <a type="button" href="update.php" class="btn btn-default"><i class="fa fa-5x fa-arrow-up"></i><hr>Update</a>
                                         </li>
  </ul>  
                               
            <?php 
} ?>
<br>
  <ul class="list-group">
  <li class="list-group-item">My Server</li>
  <li class="list-group-item">  

                                        <a type="button" href="FileManager.php" class="btn btn-default"><i class="fa fa-5x fa-file"></i><hr>Files</a>
                                        <a type="button" href="adminer-4.2.4.php?server=localhost" class="btn btn-default"><i class="fa fa-5x fa-database"></i><hr>Database</a>
                                        <a type="button" href="wp.php" class="btn btn-default"><i class="fa fa-5x fa-wordpress"></i><hr>Wordpress</a>
                                        <a type="button" href="phpinfo.php" class="btn btn-default"><i class="fa fa-5x fa-code"></i><hr>PHP Info</a>
                                        <a type="button" href="mobiapp.php" class="btn btn-default"><i class="fa fa-5x fa-mobile"></i><hr>App</a>
                                        
                                                         </li>
  </ul>  
                               
                                      


    
<?php require 'include/footer.php'; ?>
