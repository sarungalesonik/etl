<?php
class APIMaster
{   
    public static $db;

    public static function constructStatic($db)
    {
        self::$db = $db;
    }
    public static function fetchAllAPILogs(){ 
        
        $fetch = new static();
        
        try
        {
        $db = self::$db;
        $stmt = $db->prepare("select al.*,am.api_name,ag.api_group_name 
        FROM api_logs al
        LEFT JOIN api_master am ON am.api_master_id = al.api_id
        LEFT JOIN api_group ag ON ag.api_group_id=am.api_group_id
        ORDER BY al.log_id DESC
        ");
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
    //materialized_view
    public static function fetchAllMaterializedView(){ 
        
        $fetch = new static();
        
        try
        {
        $db = self::$db;
        $stmt = $db->prepare("select mv.* 
        FROM materialized_view mv");
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
    public static function fetchAllAPI(){ 
        
        $fetch = new static();
        
        try
        {
        $db = self::$db;
        $stmt = $db->prepare("select am.*,ag.api_group_name FROM api_master am
        LEFT JOIN api_group ag ON ag.api_group_id=am.api_group_id");
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
    public static function fetchMapping($api_master_id){
        $fetch = new static();
        
        try
        {
            $db = self::$db;
            $stmt = $db->prepare("select * FROM schema_mapping WHERE api_master_id = :api_master_id AND isActive = 1");
            $param=array(
                "api_master_id"=>$api_master_id
            );
            $stmt->execute($param);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                return $result;
            }
        }
        catch(PDOException $e)
        {
           $fetch->errors = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1);
           return false;
           //echo $e->getMessage();
       }
      return false;

    }
    public static function fetchByGroup($api_group_id){
        $fetch = new static();
        
        try
        {
            $db = self::$db;
            $stmt = $db->prepare("select * FROM api_master WHERE api_group_id = :api_group_id AND api_status = 1");
            $param=array(
                "api_group_id"=>$api_group_id
            );
            $stmt->execute($param);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result){
                return $result;
            }
        }
        catch(PDOException $e)
        {
           $fetch->errors = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1);
           return false;
           //echo $e->getMessage();
       }
      return false;

    }
    public static function fetchAPIByCode($api_code){
    
        try
        {
        $db = self::$db;
        $stmt = $db->prepare("select * from api_master where api_code = :api_code");
        $param=array(
            'api_code'=>$api_code
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
    public static function fetchApiGroup(){

        $fetch = new static();

        try
        {
            $db = self::$db;
            $stmt = $db->prepare("select ag.* FROM api_group ag");
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

    public static function fetchAPI($api_master_id){
    
        try
        {
        $db = self::$db;
        $stmt = $db->prepare("select * from api_master where api_master_id = :api_master_id");
        $param=array(
            'api_master_id'=>$api_master_id
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
    
    public static function manageAPI($api_type,$api_group_id,$api_name,$api_code,$api_url,$api_path,$credentials_type,$api_key,$key_param,$api_method,$api_db_key,$api_db_val,$api_bearer_token,$api_key_type){
        
        $Save = new static();
        try
        {
             
        $db = self::$db;    
        $stmt = $db->prepare("INSERT INTO api_master SET api_type = :api_type, api_group_id = :api_group_id, api_name = :api_name, api_code = :api_code, api_url = :api_url, api_path = :api_path, credentials_type = :credentials_type, api_key = :api_key, key_param = :key_param, api_method = :api_method, api_db_key = :api_db_key, api_db_val = :api_db_val, api_bearer_token = :api_bearer_token, api_key_type = :api_key_type");
        $param=array(
            "api_type"=>$api_type,
            "api_group_id"=>$api_group_id,
            "api_name"=>$api_name,
            "api_code"=>$api_code,
            "api_url"=>$api_url,
            "api_path"=>$api_path,
            "credentials_type"=>$credentials_type,
            "api_key"=>$api_key,
            "key_param"=>$key_param,
            "api_method"=>$api_method,
            "api_db_key"=>$api_db_key,
            "api_db_val"=>$api_db_val,
            "api_bearer_token"=>$api_bearer_token,
            "api_key_type"=>$api_key_type
        );
        $stmt->execute($param);
        if($stmt->rowCount()){
            return true;
        }
       }
        catch(PDOException $e)
        {
           $Save->errors = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1);
//           echo $e->getMessage();
           return false;
        }
        return false;
      
    }
    
    public static function manageAPILogs($api_id,$url,$method,$payload){
        
        $Save = new static();
        try
        {
             
        $db = self::$db;    
        $stmt = $db->prepare("INSERT INTO api_logs SET api_id = :api_id, `url` = :url, method = :method, payload = :payload");
        $param=array(
            "api_id"=>$api_id,
            "url"=>$url,
            "method"=>$method,
            "payload"=>$payload
        );
        $stmt->execute($param);
        if($stmt->rowCount()){
            return true;
        }
       }
        catch(PDOException $e)
        {
           $Save->errors = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1);
//           echo $e->getMessage();
           return false;
        }
        return false;
      
    }
    public static function updateAPI($api_master_id,$api_type,$api_group_id,$api_name,$api_code,$api_url,$api_path,$credentials_type,$api_key,$key_param,$api_method,$api_status,$api_db_key,$api_db_val,$api_bearer_token,$api_key_type){
        
        $Save = new static();

        try
        {
             
        $db = self::$db;    
        $stmt = $db->prepare("UPDATE api_master SET api_type = :api_type, api_group_id = :api_group_id, api_name = :api_name, api_code = :api_code, api_url = :api_url, api_path = :api_path, credentials_type = :credentials_type, api_key = :api_key, key_param = :key_param, api_method = :api_method, api_status = :api_status, api_db_key = :api_db_key, api_db_val = :api_db_val, api_bearer_token = :api_bearer_token, api_key_type = :api_key_type WHERE api_master_id = :api_master_id");

        $param=array(
            "api_master_id"=>$api_master_id,
            "api_type"=>$api_type,
            "api_group_id"=>$api_group_id,
            "api_name"=>$api_name,
            "api_code"=>$api_code,
            "api_url"=>$api_url,
            "api_path"=>$api_path,
            "credentials_type"=>$credentials_type,
            "api_key"=>$api_key,
            "key_param"=>$key_param,
            "api_method"=>$api_method,
            "api_status"=>$api_status,
            "api_db_key"=>$api_db_key,
            "api_db_val"=>$api_db_val,
            "api_bearer_token"=>$api_bearer_token,
            "api_key_type"=>$api_key_type
        );
        $stmt->execute($param);
        if($stmt->rowCount()){
            return true;
        }

        }
       catch(PDOException $e)
       {
           //echo $e->getMessage();
       }
      return false;
    }
    public static function updateAPITempData($api_master_id,$temp_payload){
        
        $Save = new static();

        try
        {
             
        $db = self::$db;    
        $stmt = $db->prepare("UPDATE api_master SET temp_payload = :temp_payload WHERE api_master_id = :api_master_id");

        $param=array(
            "api_master_id"=>$api_master_id,
            "temp_payload"=>$temp_payload
        );
        $stmt->execute($param);
        if($stmt->rowCount()){
            return true;
        }

        }
       catch(PDOException $e)
       {
           //echo $e->getMessage();
       }
      return false;
    }
    public static function deleteAPI($org,$api_master_uid,$userid){ 
        
        $Save = new static();
        try
        {
             
        $db = self::$db;    
        $stmt = $db->prepare("UPDATE api_master SET isDeleted = :api_master_uid, modified_by = :modified_by WHERE api_master_uid = :api_master_uid AND orgid = :orgid");
        $stmt->bindParam(':orgid',$org);
        $stmt->bindParam(':api_master_uid',$api_master_uid);
        $stmt->bindParam(':modified_by',$user_id);
        $stmt->execute();
        $result = $stmt->rowCount();
        
        }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
      return $result;
    }

    
}
