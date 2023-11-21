<?php
class User
{
    public static $db;

    public static function constructStatic($db)
    {
        self::$db = $db;
    }
    public static function fetchAllUser()
	{  
        try{
            $db = self::$db;
            $stmt = $db->prepare("SELECT * FROM users ORDER BY user_id DESC");
        
            $stmt->execute();

            $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
            if($result){
                return $result;
            }
            return false;            
        }
        catch(PDOException $e){
            return false;
        }
        return false;
    }
    public static function fetchAllUserWithAuth()
	{  
        try{
            $db = self::$db;
            $stmt = $db->prepare("SELECT 
            u.*,
            (SELECT login_on FROM auth_token aut WHERE aut.user_id = u.user_id ORDER BY session_id DESC LIMIT 1) as loggedin_on,
            (SELECT user_ip FROM auth_token aut WHERE aut.user_id = u.user_id ORDER BY session_id DESC LIMIT 1) as user_ip
        FROM
            users u
        ORDER BY u.user_id DESC");
        
            $stmt->execute();

            $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
            if($result){
                return $result;
            }
            return false;            
        }
        catch(PDOException $e){
            return false;
        }
        return false;
    }

    public static function addUser($full_name,$email,$password){        
        $db = self::$db;
        try
        {         
            $created_on = date("Y-m-d H:i:s", time());    
            $sql="INSERT INTO users SET full_name = :full_name, email = :email, password = :password, created_on = :created_on, `address` = ''";
            $stmt = $db->prepare($sql);

            $params=array(
                'full_name'=>$full_name,
                'email' => $email,
                'password' =>$password,
                'created_on' => $created_on
            );
            $stmt->execute($params);
            if($stmt->rowCount()){
                return $db->lastInsertId();
            }

        }
        catch(PDOException $e)
        {
            return false;
        }
        return false;
    }
    
    public static function updateEKYC($user_id,$full_name,$addhar_file,$address){        
        $db = self::$db;
        try
        {         
            $modified_on = date("Y-m-d H:i:s", time());    
            $sql="UPDATE users SET full_name = :full_name, addhar_file = :addhar_file, `address` = :address, modified_on = :modified_on, isKYC = 1, isDocVerified = 1 WHERE user_id = :user_id";
            $stmt = $db->prepare($sql);

            $params=array(
                'full_name'=>$full_name,
                'address' => $address,
                'addhar_file' =>$addhar_file,
                'modified_on' => $modified_on,
                'user_id' => $user_id
            );
            $stmt->execute($params);
            if($stmt->rowCount()){
                return true;
            }

        }
        catch(PDOException $e)
        {
            return false;
        }
        return false;
    }
    
    
    public static function isExist($email){        
        $db = self::$db;
        try{          
            $sql="SELECT user_id FROM users WHERE email = :email LIMIT 1";
            $stmt = $db->prepare($sql);

            $params=array(
                'email' => $email
            );
            $stmt->execute($params);
            if($stmt->rowCount()){
                return true;
            }

        }
        catch(PDOException $e){
            return false;
        }
        return false;
    }
    
    public static function fetchUserByEmail($email){        
        $db = self::$db;
        try{          
            $sql="SELECT * FROM users WHERE email = :email LIMIT 1";
            $stmt = $db->prepare($sql);

            $params=array(
                'email' => $email
            );
            $stmt->execute($params);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
			if($result){
				return $result;
			}

        }
        catch(PDOException $e){
            return false;
        }
        return false;
    }
    
    public static function addUserAuth($session_uid,$user_id,$auth_token,$user_ip){        
        $db = self::$db;
        try
        {         
            $login_on = date("Y-m-d H:i:s", time());    
            $sql="INSERT INTO auth_token SET session_uid = :session_uid, user_id = :user_id, auth_token = :auth_token, login_on = :login_on, user_ip = :user_ip";
            $stmt = $db->prepare($sql);

            $params=array(
                'session_uid'=>$session_uid,
                'user_id' => $user_id,
                'auth_token' =>$auth_token,
                'login_on' => $login_on,
                'user_ip' => $user_ip
            );
            $stmt->execute($params);
            if($stmt->rowCount()){
                return true;
            }

        }
        catch(PDOException $e){
            return false;
        }
        return false;
    }
}

?>