<?php
require_once 'api/common/init.php';
require_once "includes/Util.php";
require_once "includes/SystremInfo.php";

//$db_handle = new DBController();
$util = new Util();
$obj = new OS_BR();

// Get Current date, time
$current_time = time();
$current_date = date("Y-m-d H:i:s", $current_time);

// Set Cookie expiration for 1 hour
$cookie_expiration_time = $current_time + (1 * 1 * 60 * 60);  // for 1 hour

$isLoggedIn = false;
$cookiesExist=false;
$sessionsetwocookie = false;

// Check if loggedin session and redirect if session exists
if (isset($_SESSION["login"]) && $_SESSION['login']==true) {
    $isLoggedIn = true;
	
	if(isset($_COOKIE["member_login"]) && isset($_COOKIE["random_password"]) && isset($_COOKIE["random_selector"]) && isset($_COOKIE["user_orgid"])){
		$userToken = Auth::getTokenByUsername($_COOKIE["member_login"],$_COOKIE["user_orgid"],0);
		
		$expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);
		
		Auth::UpdateToken($userToken["id"],$expiry_date);
		
		$username = $_COOKIE["member_login"];
		$myorgid = $_COOKIE["user_orgid"];
	}
	else{
		$username = $_SESSION['user'];
		$myorgid = $_SESSION['orgid'];
		
		setcookie("member_login", $username, $cookie_expiration_time);
			
		setcookie("user_orgid", $myorgid, $cookie_expiration_time);
            
		$random_password = $util->getToken(16);
		setcookie("random_password", $random_password, $cookie_expiration_time);
            
		$random_selector = $util->getToken(32);
		setcookie("random_selector", $random_selector, $cookie_expiration_time);
			
		$user_ip = $obj->get_client_ip_server();
		setcookie("user_ip", $user_ip, $cookie_expiration_time);
            
		$random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
		$random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);
	}
}
// Check if loggedin session exists
else if (isset($_COOKIE["member_login"]) && isset($_COOKIE["random_password"]) && isset($_COOKIE["random_selector"]) && isset($_COOKIE["user_orgid"]) && $logout==false) {
    // Initiate auth token verification diirective to false
    $isPasswordVerified = false;
    $isSelectorVerified = false;
    $isExpiryDateVerified = false;
    $isIpVerified = false;
    
    // Get token for username
    $userToken = Auth::getTokenByUsername($_COOKIE["member_login"],$_COOKIE["user_orgid"],0);
    // Validate random password cookie with database
    if (password_verify($_COOKIE["random_password"], $userToken["password_hash"])) {
        $isPasswordVerified = true;
    }
    
    // Validate random selector cookie with database
    if (password_verify($_COOKIE["random_selector"], $userToken["selector_hash"])) {
        $isSelectorVerified = true;
    }
    
    // check cookie expiration by date
    if($userToken["expiry_date"] >= $current_date) {
        $isExpiryDateVerified = true;
    }
	
	if($_COOKIE["user_ip"] == $userToken["user_ip"]){
		$isIpVerified = true;
	}
	
	$username = $_COOKIE["member_login"];
	$myorgid = $_COOKIE["user_orgid"];
    
    // Redirect if all cookie based validation returns true
    // Else, mark the token as expired and clear cookies
    if (isset($userToken["id"]) && $isPasswordVerified && $isSelectorVerified && $isExpiryDateVerified && $isIpVerified) {
        $cookiesExist=true;
    } else {
    if(isset($userToken["id"])) {
        Auth::markAsExpired($userToken["id"]);
        }
       $util->clearAuthCookie();
    }
}
?>