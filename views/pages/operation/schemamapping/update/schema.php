<?php
session_start();
require_once "../../../../../api/autoload/init.php";

$api_master_id = $_POST["up_api_master_id"];

$schema_mapping_ids = $_POST["schema_mapping_id"];
$schema_mapping_id_checkeds = $_POST["schema_mapping_id_checked"];
$dbValue = $_POST["dbValue"];

$config_arr=array();

if($schema_mapping_ids){
    foreach($schema_mapping_ids as $i => $schema_mapping_id){
        $config_arr[$schema_mapping_id]=array("isActive"=>0,"dbValue"=>$dbValue[$i]);
    }
}
if($schema_mapping_id_checkeds){
    foreach($schema_mapping_id_checkeds as $schema_mapping_id_checked){
        $config_arr[$schema_mapping_id_checked]["isActive"]=1;
    }
}

$db = Database::getInstance();
SchemaMapping::constructStatic($db);

if(SchemaMapping::updateSchemaMapping($api_master_id,$config_arr)){
    echo '<script>sucessPopup("Schema Mapping updated");$("#updateschemamodal").modal("hide");$(".modal-backdrop").remove();
    </script>
    ';
}else{    
    echo '<script>errorPopup("Error while mapping");
    </script>
    ';
}


?>