<?php echo file_get_contents('data/loginhead'); ?>
<!-- Selim Doyranlı Tarafından Hazırlanmıştır : 08.10.2016 | Material Form -->
<!-- https://selimdoyranli.com -->
<!-- http://www.radkod.com -->
<!-- https://www.sanalyer.com -->

<!DOCTYPE HTML>
<html lang="en-US">
<head>

    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
    <meta charset="UTF-8">
    <title>Login to Webister</title>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="css/grid12.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/login.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="css/animate.css" media="all"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
     <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: black;
                font-family: 'Raleway', sans-serif;
                font-weight: 150;
                height: 100vh;
                margin: 0;
                
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
               
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                 border: 1px solid;
                     padding-top: 50px;
    padding-right: 50px;
    padding-bottom: 50px;
    padding-left: 50px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: black;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    
</head>
<body>


<div class="col-lg-4 col-md-7 col-sm-6 col-xs-12     login-card">

 
    <form id="login-form" name="form" class="col-lg-12" method="POST" action="index.php?page=val" novalidate="novalidate">


        <div class="col-lg-12 logo-kapsul">
            <img width="300" height="300" class="logo" src="<?php echo file_get_contents('data/logo'); ?>" alt="Logo" />
        </div>
     

        <div style="clear:both;"></div>

        <div class="group">
            <input type="text"  name="user" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label><i class="material-icons input-ikon">person_outline</i><span class="span-input">Username</span></label>
        </div>
    

 
        <div class="group">
            <input type="password" name="pass" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label><i class="material-icons input-sifre-ikon">lock</i><span class="span-input">Password</span></label>
        </div>
    
        
<a href="#" onclick="document.forms['form'].submit(); return false;" class="giris-yap-buton">Login</a>

        <div class="forgot-and-create tab-menu">
     
        </div>
      

    </form>
  
</div>
 <div class="flex-center position-ref full-height">
          
            <div class="content">
                <div class="title m-b-md">
                    Webister
                </div>
<hr>
                <div class="links">
                    <a href="http://www.adaclare.com/forums/">Forums</a>
                    <a href="https://tflare.atlassian.net/wiki/">Documentation</a>
                    <a href="http://www.adaclare.com:8080/">Builds</a>
                    <a href="https://github.com/alwaysontop617/webister">GitHub</a>
                </div>
                <hr>
               <div style="font-weight: bold;"> Powered By Webister</div>
            </div>
            
        </div>
                <?php if (isset($_GET['error'])) {
    ?>
<div style="position:fixed; top:10px; right:10px; padding:25px; background:#fff; border:1px solid #ddd;">
    Wrong username or password
</div>
<?php 
} ?>

    
</body>
</html>
<?php echo file_get_contents('data/loginfoot'); ?>