<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */
 session_start();
 function onlyadmin () {
     if ($_SESSION['user'] == 'admin') {
         
     } else {
         die();
     }
}
onlyadmin();
if (!isset($_SESSION['user'])) {
    header('Location: index.php?page=main');
    die();
}

if ($_GET['act'] == 'pwr') {
    exec("sudo nohup service webister stop &>/dev/null &");
    header('Location: index.php?page=cp');
    die();
}
if ($_GET['act'] == 'restart') {
    exec("sudo nohup service webister restart &>/dev/null &");
    header('Location: index.php?page=cp');
    die();
}
if ($_GET['act'] == 'mysql') {
    exec("sudo nohup service mysql restart &>/dev/null &");
    header('Location: index.php?page=cp');
    die();
}
if ($_GET['act'] == 'server') {
    exec("sudo nohup reboot &>/dev/null &");
    header('Location: index.php?page=cp');
    die();
}
