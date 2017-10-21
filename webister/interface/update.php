<?php session_start(); require 'include/head.php';onlyadmin();
ini_set('max_execution_time',60);
?>
 <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Updates</h2>
<?php
$current = file_get_contents("data/version");
$getVersions = file_get_contents("https://dl.adaclare.com/main/intisp/curversion.txt");
if ($getVersions != '')
{
    echo '<p>CURRENT VERSION: '.$current.'</p>';
    echo '<p>Reading Current Releases List</p>';
    if ($current != $getVersions) {
        echo '<p>New Update Found: v'.$getVersions.'</p>';
           if ( !is_file('data/wb-'.$getVersions.'.zip' )) {
                echo '<p>Downloading New Update</p>';
                $newUpdate = file_get_contents('https://dl.adaclare.com/main/intisp/wb-'.$getVersions.'.zip');
 
                $dlHandler = fopen('data/wb-'.$getVersions.'.zip', 'w');
                if ( !fwrite($dlHandler, $newUpdate) ) { echo '<p>Could not save new update. Operation aborted.</p>'; exit(); }
                fclose($dlHandler);
                echo '<p>Update Downloaded And Saved</p>';
            } else echo '<p>Update already downloaded.</p>';   
    } else {
        echo '<p>&raquo; No update is available.</p>';
    }
} else {
    echo '<p>Could not find latest realeases.</p>';
}
?>

<?php
require 'include/footer.php';
?>