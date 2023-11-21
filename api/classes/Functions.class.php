<?php
class Functions
{
    public static $db;

    public static function constructStatic($db)
    {
        self::$db = $db;
    }   
	public static function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
    public static function GetUniqueID($column_name,$table_name,$len)
	{
		$GetUnqID = self::get_rand_critical($len);
		$CheckIfUniqueIDexist = self::CheckIfUniqueIDexist($GetUnqID,$column_name,$table_name);
		if (!$CheckIfUniqueIDexist) {
			return $GetUnqID;
		} else {
			return self::GetUniqueID($column_name,$table_name,$len);
		}
	}
	
    public static function GetUniqueIDSmall($column_name,$table_name,$len)
	{
		$GetUnqID = self::get_rand_critical_small($len);
		$CheckIfUniqueIDexist = self::CheckIfUniqueIDexist($GetUnqID,$column_name,$table_name);
		if (!$CheckIfUniqueIDexist) {
			return $GetUnqID;
		} else {
			return self::GetUniqueIDSmall($column_name,$table_name,$len);
		}
	}

	
	

	public static function CheckIfUniqueIDexist($GetUnqID,$column_name,$table_name)
	{  try
        {
		$db = self::$db;   
        $stmt = $db->prepare("SELECT * FROM $table_name  WHERE $column_name = :GetUnqID");
     
        $stmt->bindParam(':GetUnqID',$GetUnqID);
		$stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
			if(!$result){
				return false;
			}
			return true;
		
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
			return false;
        }
       return $result;
    }
    
    public static function assign_rand_value($numone)
	{
		// accepts 1 - 36
		switch ($numone) {
			case "1":
				$rand_value = "a";
				break;
			case "2":
				$rand_value = "b";
				break;
			case "3":
				$rand_value = "c";
				break;
			case "4":
				$rand_value = "d";
				break;
			case "5":
				$rand_value = "e";
				break;
			case "6":
				$rand_value = "f";
				break;
			case "7":
				$rand_value = "g";
				break;
			case "8":
				$rand_value = "h";
				break;
			case "9":
				$rand_value = "i";
				break;
			case "10":
				$rand_value = "j";
				break;
			case "11":
				$rand_value = "k";
				break;
			case "12":
				$rand_value = "l";
				break;
			case "13":
				$rand_value = "m";
				break;
			case "14":
				$rand_value = "n";
				break;
			case "15":
				$rand_value = "o";
				break;
			case "16":
				$rand_value = "p";
				break;
			case "17":
				$rand_value = "q";
				break;
			case "18":
				$rand_value = "r";
				break;
			case "19":
				$rand_value = "s";
				break;
			case "20":
				$rand_value = "t";
				break;
			case "21":
				$rand_value = "u";
				break;
			case "22":
				$rand_value = "v";
				break;
			case "23":
				$rand_value = "w";
				break;
			case "24":
				$rand_value = "x";
				break;
			case "25":
				$rand_value = "y";
				break;
			case "26":
				$rand_value = "z";
				break;
			case "27":
				$rand_value = "1";
				break;
			case "28":
				$rand_value = "1";
				break;
			case "29":
				$rand_value = "2";
				break;
			case "30":
				$rand_value = "3";
				break;
			case "31":
				$rand_value = "4";
				break;
			case "32":
				$rand_value = "5";
				break;
			case "33":
				$rand_value = "6";
				break;
			case "34":
				$rand_value = "7";
				break;
			case "35":
				$rand_value = "8";
				break;
			case "36":
				$rand_value = "9";
				break;
		}
		return $rand_value;
	}
    public static function get_rand_critical($length){
        if($length>0)
        {
            $rand_id="";
              mt_srand((double)microtime() * 1000000);
             for($i=1; $i<=$length; $i++)
             {
                 $numone = mt_rand(1,36);
                 $rand_id .= self::assign_rand_value($numone);
             }
        }
          return strtoupper($rand_id);
    }
	public static function randomNumber($length) {
		$result = '';
	
		for($i = 0; $i < $length; $i++) {
			$result .= mt_rand(1, 9);
		}
	
		return $result;
	}
    public static function get_rand_critical_small($length){
        if($length>0)
        {
            $rand_id="";
            mt_srand((double)microtime() * 1000000);
            for($i=1; $i<=$length; $i++)
            {
                $numone = mt_rand(1,36);
                $rand_id .= self::assign_rand_value($numone);
            }
        }
        return $rand_id;
    }
	public static function date_time_disp_format($date)
	{
		if($date==""){
			return $date;
		}elseif($date=="0000-00-00 00:00:00"){
			return "";
		}
		return date("d-m-Y H:i", strtotime($date));
	}
	public static function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	public static function date_disp_format($date)
	{
		if($date==""){
			return $date;
		}elseif($date=="0000-00-00 00:00:00"){
			return "";
		}
		return date("d-m-Y", strtotime($date));
	}
	
	public static function time_disp_format($date)
	{
		if($date==""){
			return $date;
		}elseif($date=="0000-00-00 00:00:00"){
			return "";
		}
		return date("H:i:s", strtotime($date));
	}
	public static function date_disp_time_format($date)
	{
		if($date==""){
			return $date;
		}elseif($date=="0000-00-00"){
			return "";
		}
		return date("d-m-Y", $date);
	}
	public static function date_db_format($date)
	{
		if($date==""){
			return $date;
		}elseif($date=="0000-00-00"){
			return "";
		}
		return date("Y-m-d", strtotime($date));
	}
	public static function transformRow($arr)
	{
		if(!$arr){
			return "";
		}
		if(!is_array($arr)){
			return $arr;
		}
		$data="";
		foreach($arr as $row){
			$data.=$row.", ";
		}
		return $data;
	}
	public static function flattenArray($input, $prefix = '')
	{
		$output = [];

		foreach ($input as $key => $value) {
			if(is_integer($key)){
				$newKey = empty($prefix) ? $key : $prefix . '[' . $key."]";
			}else{            
			$newKey = empty($prefix) ? $key : $prefix . '/' . $key;
			}
			if (is_array($value)) {
				$output = array_merge($output, self::flattenArray($value, $newKey));
			} else {
				$output[$newKey] = $value;
			}
		}

		return $output;

	}
	
	public static function materializedArr($sMapping,$sdata)
	{
		$sdata = self::flattenArray($sdata);


		$dbArray=array();
		foreach($sMapping as $mapping){
			if(isset($sdata[$mapping["field"]])){
				if(isset($dbArray[$mapping["dbValue"]])){
					$dbArray[$mapping["dbValue"]].=" ".$sdata[$mapping["field"]];
				}else{
					$dbArray[$mapping["dbValue"]]=$sdata[$mapping["field"]];
				}
			}
		}
		
		return $dbArray;

	}
	public static function materializedSql($dbArray)
	{
		
		
		$sqlArr = array();
		foreach($dbArray as $key => $val){
			array_push($sqlArr,$key.' = "'.$val.'"');
		}
		$sql = implode(' , ', $sqlArr);
	 

		return $sql;

	}
    public static function fetchTableColumn($table_name){

        try
        {
            $db = self::$db;

			$sql="SELECT 
			`COLUMN_NAME`
		FROM
			`INFORMATION_SCHEMA`.`COLUMNS`
		WHERE
			`TABLE_SCHEMA` = 'iia'
				AND `TABLE_NAME` = :table_name";
            $stmt = $db->prepare($sql);
			$param=array(
				"table_name"=>$table_name
			);
//			echo PdoDebugger::show($sql,$param);
            $stmt->execute($param);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
        }
        catch(PDOException $e)
        {
            //
			
        }
        return false;

    }
	public static function possibleUsername($full_name){
		return str_replace(' ', '', $full_name);
	}
}
