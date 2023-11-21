<?php
class Cron
{
    public static $db;

    public static function constructStatic($db)
    {
        self::$db = $db;
    }
    public static function fetchAllCronTab()
	{  
        try{
            $db = self::$db;   
            $stmt = $db->prepare("SELECT * FROM cron_tab ORDER BY cron_tab_id DESC");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if($result){
				return $result;
			}
			return false;		
        }
        catch(PDOException $e)
        {
            return false;
        }
        return false;
    }
    public static function fetchCronTab($cron_tab_id)
	{  try
        {
        $db = self::$db;   
        $stmt = $db->prepare("SELECT * FROM cron_tab WHERE cron_tab_id = :cron_tab_id");
     
		$param=array(
            'cron_tab_id'=>$cron_tab_id
        );
        $stmt->execute($param);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
			if($result){
				return $result;
			}
			return false;
		
        }
        catch(PDOException $e)
        {
  //          $fetch->errors = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1);
//            echo $e->getMessage();
            return false;
        }
       return false;
    }

    public static function fetchCronTabByType($cron_type)
	{  
        try
        {
            $db = self::$db;   
            
            $cron_type_list = "'" . implode( "','", $cron_type ) . "'";

            $sql="SELECT cron_log_id FROM cron_log WHERE cron_type in ($cron_type_list) AND isCompleted='0' GROUP BY cron_type";
            $stmt = $db->prepare($sql);
        
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if($result){
                return true;
            }
            return false;
		
        }
        catch(PDOException $e)
        {
  //          $fetch->errors = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1);
//            echo $e->getMessage();
            return false;
        }
       return false;
    }

    public static function fetchCron($cron_uid)
	{  try
        {
        $db = self::$db;   
        $stmt = $db->prepare("SELECT * FROM cron_log WHERE cron_log_id = :cron_log_id");
     
		$param=array(
            'cron_uid'=>$cron_uid
        );
        $stmt->execute($param);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
			if($result){
				return $result;
			}
			return false;
		
        }
        catch(PDOException $e)
        {
  //          $fetch->errors = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1);
//            echo $e->getMessage();
            return false;
        }
       return false;
    }

    public static function fetchAll()
	{  try
        {
        $db = self::$db;    
        $stmt = $db->prepare("SELECT * FROM cron_log ORDER BY cron_log_id DESC");
		$stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if($result){
				return $result;
			}
			return false;
		
        }
        catch(PDOException $e)
        {
  //          $fetch->errors = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1);
//            echo $e->getMessage();
            return false;
        }
       return false;
    }
    public static function addCron($cron_uid,$cron_type,$cron_name,$total_rows,$rows_affected){
        
        $Save = new static();

        $db = self::$db;
        $db->beginTransaction();


        try
        {
         
            $created_on = date("Y-m-d H:i:s", time());   
            $count=0;
            
            $sql="INSERT INTO cron_log SET cron_type = :cron_type, 
            cron_name = :cron_name, total_rows = :total_rows, rows_affected = :rows_affected, cron_start = :created_on";
            $stmt = $db->prepare($sql);

            $params=array(
                'cron_type'=>$cron_type,
                'cron_name'=>$cron_name,
                'total_rows' => $total_rows,
                'rows_affected' => $rows_affected,
                'created_on'=>$created_on,
            );
            $stmt->execute($params);
            $count+=$stmt->rowCount();


            $Save->response = array('Result'=>1,'Message'=>'Data added','HasError'=>0,"count"=>$count);
        }
        catch(PDOException $e)
        {
            $Save->response = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1,'count'=>0);
            $db->rollBack();
            return $Save;
        }
        $db->commit();
        return $Save;
      
    }
    
    public static function updateCronTab($cron_tab_id,$cron_name,$cron_time,$cron_path, $cron_file, $is_active, $user_uid){
        
        $Save = new static();

        $db = self::$db;

        try
        {
         
            $modified_on = date("Y-m-d H:i:s", time());   
            $count=0;
            
            $sql="UPDATE cron_tab SET cron_time = :cron_time, 
            cron_name = :cron_name, path = :path, file = :file, isActive = :isActive, modified_by = :modified_by, modified_on = :modified_on WHERE cron_tab_id = :cron_tab_id";
            $stmt = $db->prepare($sql);

            $params=array(
                'cron_tab_id'=>$cron_tab_id,
                'cron_name'=>$cron_name,
                'cron_time'=>$cron_time,
                'path' => $cron_path,
                'file' => $cron_file,
                'isActive' => $is_active,
                'modified_by' => $user_uid,
                'modified_on'=>$modified_on,
            );
//            echo PdoDebugger::show($sql,$params);
            if($stmt->execute($params)){
                return true;
            }

        }
        catch(PDOException $e)
        {
//            $Save->response = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1,'count'=>0);
            return false;
        }
        return false;
      
    }
    public static function addCronTab($cron_name,$cron_time,$cron_path, $cron_file, $user_uid){
        
        $Save = new static();

        $db = self::$db;

        try
        {
         
            $created_on = date("Y-m-d H:i:s", time());   
            $count=0;
            
            $sql="INSERT INTO cron_tab SET cron_time = :cron_time, 
            cron_name = :cron_name, path = :path, file = :file, created_by = :created_by, created_on = :created_on";
            $stmt = $db->prepare($sql);

            $params=array(
                'cron_name'=>$cron_name,
                'cron_time'=>$cron_time,
                'path' => $cron_path,
                'file' => $cron_file,
                'created_by' => $user_uid,
                'created_on'=>$created_on,
            );
            $stmt->execute($params);
            if($stmt->rowCount()){
                return true;
            }

        }
        catch(PDOException $e)
        {
//            $Save->response = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1,'count'=>0);
            return false;
        }
        return false;
      
    }
    public static function updateRemark($cron_log_id,$remark){
        
        $Save = new static();

        $db = self::$db;


        try
        {
         
            $created_on = date("Y-m-d H:i:s", time());   
            $count=0;
            $isError="1";
            
            $sql="UPDATE cron_log SET remark = :remark WHERE cron_log_id = :cron_log_id";
            $stmt = $db->prepare($sql);
            
            $params=array(
                'cron_log_id'=>$cron_log_id,
                'remark'=>$remark
            );
            $stmt->execute($params);
//            echo PdoDebugger::show($sql,$params);
            if($stmt->rowCount()){
                return true;
            }

            return false;
        }
        catch(PDOException $e)
        {
            $Save->response = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1,'count'=>0);
            return false;
        }
        return false;
      
    }
    public static function stopCron($cron_log_id){
        
        $Save = new static();

        $db = self::$db;


        try
        {
         
            $created_on = date("Y-m-d H:i:s", time());   
            $count=0;
            $isError="1";
            
            $sql="UPDATE cron_log SET isCompleted = '1' WHERE cron_log_id = :cron_log_id";
            $stmt = $db->prepare($sql);
            
            $params=array(
                'cron_log_id'=>$cron_log_id
            );
            $stmt->execute($params);
//            echo PdoDebugger::show($sql,$params);
            if($stmt->rowCount()){
                return true;
            }

            return false;
        }
        catch(PDOException $e)
        {
            $Save->response = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1,'count'=>0);
            return false;
        }
        return false;
      
    }
    public static function updateCronRowsAffected($cron_log_id,$rows_affected){
        
        $Save = new static();

        $db = self::$db;

//        $db->beginTransaction();


        try
        {
         
            $now = date("Y-m-d H:i:s", time());   
            $count=0;
            
            $sql="UPDATE cron_log SET rows_affected = :rows_affected, cron_last_updated = :curr_now WHERE cron_log_id = :cron_log_id";
            $stmt = $db->prepare($sql);

            $params=array(
                'cron_log_id'=>$cron_log_id,
                'rows_affected' => $rows_affected,
                'curr_now'=>$now,
            );
            $stmt->execute($params);
            $count+=$stmt->rowCount();
            echo "count:";
//var_dump($count);

            $Save->response = array('Result'=>1,'Message'=>'Data added','HasError'=>0,"count"=>$count);
        }
        catch(PDOException $e)
        {
            $Save->response = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1,'count'=>0);
//            $db->rollBack();
            return $Save;
        }
//        $db->commit();
        return $Save;
      
    }
    public static function updateCronComplete($cron_log_id){
        
        $Save = new static();

        $db = self::$db;
        $db->beginTransaction();


        try
        {
         
            $now = date("Y-m-d H:i:s", time());   
            $count=0;
            
            $sql="UPDATE cron_log SET isCompleted = '1', cron_end = :curr_now WHERE cron_log_id = :cron_log_id";
            $stmt = $db->prepare($sql);

            $params=array(
                'cron_log_id'=>$cron_log_id,
                'curr_now'=>$now,
            );
            $stmt->execute($params);
            $count+=$stmt->rowCount();


            $Save->response = array('Result'=>1,'Message'=>'Data added','HasError'=>0,"count"=>$count);
        }
        catch(PDOException $e)
        {
            $Save->response = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1,'count'=>0);
            $db->rollBack();
            return $Save;
        }
        $db->commit();
        return $Save;
      
    }
    
    public static function addCronError($cron_log_id,$error){
        
        $Save = new static();

        $db = self::$db;
        $db->beginTransaction();


        try
        {
         
            $now = date("Y-m-d H:i:s", time());   
            $count=0;
            
            $sql="UPDATE cron_log SET error = :error, cron_last_updated = :now WHERE cron_log_id = :cron_log_id";
            $stmt = $db->prepare($sql);

            $params=array(
                'cron_log_id'=>$cron_log_id,
                'error'=>$error,
                'now'=>$now,
            );
            $stmt->execute($params);
            $count+=$stmt->rowCount();


            $Save->response = array('Result'=>1,'Message'=>'Data added','HasError'=>0,"count"=>$count);
        }
        catch(PDOException $e)
        {
            $Save->response = array('Result'=>0,'Message'=>$e->getMessage(),'HasError'=>1,'count'=>0);
            $db->rollBack();
            return $Save;
        }
        $db->commit();
        return $Save;
      
    }

}

?>