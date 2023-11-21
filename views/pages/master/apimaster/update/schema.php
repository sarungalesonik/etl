<?php
session_start();
require_once "../../../../../api/autoload/init.php";
$db = Database::getInstance();
APIMaster::constructStatic($db);
SchemaMapping::constructStatic($db);
Functions::constructStatic($db);
$api_master_id = $_POST["api_master_id"];
$temp_payload = $_POST["temp_payload"];
$rowFields = $_POST["rowFields"];
$rowValues = $_POST["rowValues"];

if(APIMaster::updateAPITempData($api_master_id,$temp_payload)){
    if(SchemaMapping::manageSchemaMapping($api_master_id,$rowFields,$rowValues)){
        echo '<script>sucessPopup("Schema created");
        </script>';
        exit(); 
    }
    echo '<script>sucessPopup("Error while creating Schema");
    </script>';
    exit(); 
}
echo '<script>sucessPopup("Error while updating temp data");
</script>';
exit(); 



?>
