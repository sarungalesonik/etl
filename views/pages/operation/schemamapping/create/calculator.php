<?php
session_start();
require_once "../../../../../api/autoload/init.php";

$configlist = Config::setConfigConstant();

$user_uid=$_SESSION["user_uid"];
$orgid=$_SESSION["orgid"];

$name = $_POST["schema_name"];
$code = $_POST["schema_code"];
$origin = $_POST["schema_origin"];
$shipper = $_POST["schema_shipper"];

$origin_currency = $_POST["origin_currency"];
$destination_currency = $_POST["destination_currency"];

$config_arr=array();

if($configlist){
    foreach($configlist as $config){
        if(isset($_POST[$config["conf_key"]])){
            $config_arr[$config["id"]]=array(
                "conf_name" => $config["conf_name"],
                "conf_key" => $config["conf_key"],
                "val_type" => $config["val_type"],
                "conf_value" => $_POST[$config["conf_key"]]
            );
        }
    }
}

$slab_no=1;
$margin_data=array();
$margins=$_POST["margin"];
if($margins){
    foreach($margins as $margin){
        if($margin["min_price"]!="" && $margin["max_price"]!="" && $margin["profit_usd"]!="" && $margin["profit_per"]!=""){
            $margin_data[]=array(
                "slab_no" => $slab_no,
                "min_price" => $margin["min_price"],
                "max_price" => $margin["max_price"],
                "profit_usd" => $margin["profit_usd"],
                "profit_per" => $margin["profit_per"]
            );
            $slab_no++;
        }
            
    }
}

$additionalmargin=$_POST["additionalmargin"];
$addmargin_data=array();
if($additionalmargin){
    foreach($additionalmargin as $addmargin){
        if($addmargin["amount"]!=""){
            $addmargin_data[]=array(
                "product_type" => $addmargin["product_type"],
                "amount" => $addmargin["amount"]
            );
        }
    }
}



$db = Database::getInstance();
SchemaMapping::constructStatic($db);

$schemadata=SchemaMapping::addSchema($orgid,$name,$code,$origin,$shipper,$config_arr,$margin_data,$addmargin_data,$origin_currency,$destination_currency,$user_uid);
if($schemadata->response["count"]>0){
    echo '<script>sucessPopup("Schema added");viewalldatatable("operation/schemamapping/datatable.php","schema-dt-box");
    $("#schemauploadform").trigger("reset");
    $("#addschemamodal").modal("hide");$(".modal-backdrop").remove();
    </script>
    ';
}else{
    echo '<script>errorPopup("'.$schemadata->response["Message"].'");
    </script>
    ';
}


?>