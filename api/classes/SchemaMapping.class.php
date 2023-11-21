<?php
class SchemaMapping
{   
    public static $db;

    public static function constructStatic($db)
    {
        self::$db = $db;
    }
    public static function fetchAllMapping(){ 
        
        $fetch = new static();
        
        try
        {
        $db = self::$db;
        $stmt = $db->prepare("select sm.*, am.api_name, ag.api_group_name 
        FROM schema_mapping sm
        LEFT JOIN api_master am ON am.api_master_id = sm.api_master_id
        LEFT JOIN api_group ag ON ag.api_group_id = am.api_group_id");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

       }
        catch(PDOException $e)
       {
           $fetch->errors = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1);
           echo $e->getMessage();
       }
      return $result;
        
    }
    public static function updateMaterializedView($param,$condition){

        $fetch = new static();

        try
        {
            $db = self::$db;
            $sql="UPDATE materialized_view SET $param , updated_on = '".date("Y-m-d H:i:s", time())."' WHERE $condition";
            $stmt = $db->prepare($sql);
            if($stmt->execute()){
                return true;
            }
        }
        catch(PDOException $e)
        {
          /*  $fetch->errors = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1);
            echo $e->getMessage();*/
        }
        return false;

    }

    public static function insertMaterializedView($param){

        $fetch = new static();

        try
        {
            $db = self::$db;
            $sql="INSERT INTO materialized_view SET $param";
            $stmt = $db->prepare($sql);
            if($stmt->execute()){
                return true;
            }
        }
        catch(PDOException $e)
        {
          /*  $fetch->errors = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1);
            echo $e->getMessage();*/
        }
        return false;

    }
    
    public static function fetchDataByEmail($email){

        $fetch = new static();

        try
        {
            $db = self::$db;
            $stmt = $db->prepare("select * FROM materialized_view WHERE email = :email");
            $param = array(
                "email"=>$email
            );
            $stmt->execute($param);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e)
        {
            $fetch->errors = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1);
            echo $e->getMessage();
        }
        return false;

    }

    public static function fetchSchemaByAPI($api_master_id){
    
        try
        {
        $db = self::$db;
        $stmt = $db->prepare("select * from schema_mapping where api_master_id = :api_master_id");
        $param=array(
            'api_master_id'=>$api_master_id
        );

        $stmt->execute($param);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

       }
        catch(PDOException $e)
       {
           echo $e->getMessage();
       }
      return $result;
        
    }
    public static function fetchMapping($schema_mapping_id){
    
        try
        {
        $db = self::$db;
        $stmt = $db->prepare("select * from schema_mapping where schema_mapping_id = :schema_mapping_id");
        $param=array(
            'schema_mapping_id'=>$schema_mapping_id
        );

        $stmt->execute($param);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

       }
        catch(PDOException $e)
       {
           echo $e->getMessage();
       }
      return $result;
        
    }
    
    public static function manageSchemaMapping($api_master_id,$rowFields,$rowValues){
        
        $Save = new static();
        try
        {
             
        $db = self::$db;    
        $stmt = $db->prepare("DELETE FROM schema_mapping WHERE api_master_id = :api_master_id");
        $param=array(
            "api_master_id"=>$api_master_id
        );
        $stmt->execute($param);

        $stmt2 = $db->prepare("INSERT INTO schema_mapping SET api_master_id = :api_master_id, field = :field, tempValue = :tempValue");
        foreach($rowFields as $i => $field){
            $param=array(
                "api_master_id"=>$api_master_id,
                "field"=>$field,
                "tempValue"=>$rowValues[$i]
            );
            $stmt2->execute($param);
            if(!$stmt2->rowCount()){
                return false;
            }
        }
        return true;
       }
        catch(PDOException $e)
        {
           $Save->errors = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1);
//           echo $e->getMessage();
           return false;
        }
        return false;
      
    }
    public static function updateSchemaMapping($api_master_id,$config_arr){
        
        $Save = new static();

        try
        {
             
        $db = self::$db;    
        $sql="UPDATE schema_mapping SET isActive = :isActive, dbValue = :dbValue WHERE schema_mapping_id = :schema_mapping_id";
        $stmt2 = $db->prepare($sql);
        foreach($config_arr as $schema_mapping_id => $data){
            $param=array(
                "schema_mapping_id"=>$schema_mapping_id,
                "isActive"=>$data["isActive"],
                "dbValue"=>$data["dbValue"]
            );
            if(!$stmt2->execute($param)){
                return false;
            }
        }
        return true;

        }
       catch(PDOException $e)
       {
           //echo $e->getMessage();
       }
      return false;
    }
    
    
}
