<?php
session_start();
require_once "../../../../../api/autoload/init.php";

$api_master_id = $_POST['up_api_master_id'];
$api_type = $_POST['up_api_type'];
$api_group_id = $_POST['up_api_group'];
$api_name = $_POST['up_api_name'];
$api_code = $_POST['up_api_code'];
$api_url = $_POST['up_api_url'];
$api_path = $_POST['up_api_path'];
$credentials_type = $_POST['up_api_credentials_type'];
$api_key = $_POST['up_api_key'];
$key_param = $_POST['up_api_key_param'];
$api_method = $_POST['up_api_method'];
$api_status = $_POST['up_api_status'];
$api_db_key = $_POST['up_api_db_key'];
$api_db_val = $_POST['up_api_db_val'];
$api_bearer_token = $_POST['up_api_bearer_token'];
$api_key_type = $_POST['up_api_key_type'];


$db = Database::getInstance();
APIMaster::constructStatic($db);

if(APIMaster::updateAPI($api_master_id,$api_type,$api_group_id,$api_name,$api_code,$api_url,$api_path,$credentials_type,$api_key,$key_param,$api_method,$api_status,$api_db_key,$api_db_val,$api_bearer_token,$api_key_type)){
    echo '<script>sucessPopup("Source updated");
        $("#upapimasterform").trigger("reset");
        $("#updateapimodal").hide();
        $(".modal-backdrop").remove();
        viewalldatatable("master/apimaster/datatable.php","apimaster-dt-box");
        </script>';
        exit(); 
}else{
    echo '<script>errorPopup("Error in updating source");</script>';
    exit();
}


?>