<?php
session_start();
require_once "../../../../../api/autoload/init.php";

$prohibated_word_uid = $_POST["prohibated_word_uid"];


$db = Database::getInstance();
ProhibitedWord::constructStatic($db);

$wordsdata=ProhibitedWord::removeProhibitedWord($prohibated_word_uid);
if($wordsdata->response["count"]>0){
    echo 'Word removed successfully';
}else{
    echo 'Error in removing word';
}


?>