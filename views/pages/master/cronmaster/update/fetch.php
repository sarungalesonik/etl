<?php
session_start();
require_once "../../../../../api/autoload/init.php";
$db = Database::getInstance();
APIMaster::constructStatic($db);

API::constructStatic($db);
SchemaMapping::constructStatic($db);

$s1 = APIMaster::fetchByGroup("1");
$s2 = APIMaster::fetchByGroup("2");
$s3 = APIMaster::fetchByGroup("3");

$s1Mapping = APIMaster::fetchMapping($s1["api_master_id"]);
$s2Mapping = APIMaster::fetchMapping($s2["api_master_id"]);
$s3Mapping = APIMaster::fetchMapping($s3["api_master_id"]);

$getallmv = APIMaster::fetchAllMaterializedView();

foreach($getallmv as $ucustomer){



    $token=$ucustomer["auth_token"];

 

    $customer = SchemaMapping::fetchDataByEmail($ucustomer["email"]);
    $customer_arr=array();
    foreach($customer as $key => $val){ $customer_arr[$key] = $val; }
 
 
     $s2data = API::FetchData($s2["api_code"],"",array($s2["api_db_key"]=>$customer_arr[$s2["api_db_val"]])); 
    
 
    if(isset($s2data["person"])){
        if(!$s2data["person"]){
            $isPrivate=true;
        }
    }
    if(!$isPrivate){
        $db2Array = Functions::materializedArr($s2Mapping,$s2data);
        $sql2 = Functions::materializedSql($db2Array);
        
        $condition = 'email = "'.$db2Array["email"].'"';
        SchemaMapping::updateMaterializedView($sql2, $condition);    
        $yesData=true;
    }else{


            $email=$ucustomer["email"];


        $s3 = APIMaster::fetchByGroup("3");
        $s3Mapping = APIMaster::fetchMapping($s3["api_master_id"]);

        $link="https://linkedin.com/in/".$ucustomer["username"]."/";


        $s3data = API::FetchData($s3["api_code"],$s3["api_bearer_token"],array($s3["api_db_key"]=>$link)); 
    
    
        $db3Array = Functions::materializedArr($s3Mapping,$s3data);
        if($db3Array){
            $customer = SchemaMapping::fetchDataByEmail($email);


            if($db3Array["full_name"]==$customer["full_name"]){
                $sql3 = Functions::materializedSql($db3Array);
                
                $sql3.=', username = "'.$ucustomer["username"].'",  url = "'.$link.'"';
                $condition = 'email = "'.$email.'"';

                SchemaMapping::updateMaterializedView($sql3, $condition);    
                $yesData=true;

                $full_name=$db3Array["full_name"];
                
            }else{
                $inValid=true;
            }

        }
    }
 
     

}
echo '<script>sucessPopup("Cron Tab set successfully");</script>';
?>
