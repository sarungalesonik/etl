<?php
class API
{   
    public static $db;

    public static function constructStatic($db)
    {
        self::$db = $db;
    }
    
    public static function FetchData($code,$token,$dataarray){

        $db = self::$db;
        APIMaster::constructStatic($db);
        $api = APIMaster::fetchAPIByCode($code);

        $link = $api["api_url"]."/".$api["api_path"];

        $header=array();
        if($api["credentials_type"]==3){
            if($api["api_bearer_token"]!=""){
                array_push($header,'Authorization: Bearer '.$api["api_bearer_token"]);
            }else{
                array_push($header,'Authorization: Bearer '.$token);
            }
        }
        if($api["credentials_type"]==2){
            if($api["api_key_type"]==0){
                $link.="?".$api["key_param"]."=".$api["api_key"];
            }elseif($api["api_key_type"]==1){
                array_push($header,'Content-Type: application/json');
                array_push($header,$api["key_param"].': '.$api["api_key"]);
            }
        }
        if($api["api_method"]=="GET"){
            if($dataarray){
                foreach($dataarray as $key=>$val){
                    if($key!=""){
                        if($api["credentials_type"]==2){
                            $link.="&";
                        }else{
                            $link.="?";
                        }
                        $link.=$key."=".$val;
                    }
                }
            }
        }
        /*
        var_dump($header);
        var_dump($dataarray);
        var_dump($link);
 */
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $link,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $api["api_method"],
            CURLOPT_HTTPHEADER => $header,
          ));
          if($api["api_method"]=="POST"){
          curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($dataarray));
          }
        $response = curl_exec($curl);

        APIMaster::manageAPILogs($api["api_master_id"],$link,$api["api_method"],json_encode($dataarray));

        $err = curl_error($curl);
        if ($err) {
            return array();
        }
        curl_close($curl);

        return json_decode($response,true);
    }

}