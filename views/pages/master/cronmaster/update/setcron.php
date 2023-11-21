<?php
session_start();
require_once "../../../../../api/autoload/init.php";
$db = Database::getInstance();
Cron::constructStatic($db);
$getallcron = Cron::fetchAllCronTab();

$cronlist="";

if($getallcron){
    foreach($getallcron as $cron){
        $cronstr=$cron["cron_time"].' php -f '.$cron["path"].$cron["file"];
        if($cron["isActive"]=="0"){
            $cronstr="#".$cronstr;
        }
        $cronlist.=$cronstr.PHP_EOL;
    }
}

file_put_contents('/tmp/crontab.txt', $cronlist);
echo exec('crontab /tmp/crontab.txt');
echo '<script>sucessPopup("Cron Tab set successfully");</script>';
?>