<?php
session_start();
require_once "../../../../../api/autoload/init.php";

$schema_uid = $_POST["schema_uid"];

$user_uid=$_SESSION["user_uid"];

$db = Database::getInstance();
SchemaMapping::constructStatic($db);

$wordsdata=SchemaMapping::removeSchema($schema_uid,$user_uid);
if($wordsdata->response["count"]>0){
    echo 'Word removed successfully';
}else{
    echo 'Error in removing word';
}


?>