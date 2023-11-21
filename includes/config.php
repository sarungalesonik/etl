<?php
@session_start();

$db = Database::getInstance();
//ModuleMaster::constructStatic($db);

/*

$usermodulelist=array();
/*
if($_SESSION['module_access']){
  $usermodulelist=json_decode($_SESSION['module_access']);
}
*/

/*
define('usermodulelist',$usermodulelist);

$modulesdata=ModuleMaster::fetchAllModuleWithParent();
$modulelist=array();
$allmodulelist=array();
foreach($modulesdata as $key => $modules){
  if(in_array($modules["module_code"],$usermodulelist) || $_SESSION["is_super_user"]=="1"){
    $modulelist[$modules["code"]]["parent_name"] = $modules["parent_name"];
    $modulelist[$modules["code"]]["icon"] = $modules["icon"];
    $modulelist[$modules["code"]]["modules"][$modules["module_code"]]["module_name"] = $modules["module_name"];
    $modulelist[$modules["code"]]["modules"][$modules["module_code"]]["location"] = $modules["location"];
  }
  $allmodulelist[] = $modules;
}
define('modulelist',$modulelist);
define('allmodulelist',$allmodulelist);
*/

?>