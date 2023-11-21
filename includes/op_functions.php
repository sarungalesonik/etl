<?php
function getfiletype($file_name){
    $imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
    if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
    || $imageFileType == "gif" ) {
        //image
        return 1;
    }
    elseif($file_name==""){
        return 2;
    }
    //video
    return 0;
}
function getcoordinates($coordinates){
    $coords=explode(', ', $coordinates);
    if($coords){
        return $coords;
    }
    return array();
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function timestamp_format($date)
{
    if($date==""){
        return time();
    }
    return strtotime($date);
}
function date_disp_day_format($date)
{
    if($date==""){
        return $date;
    }
    return date("d/m", strtotime($date));
}
function date_disp_format($date)
{
    if($date==""){
        return $date;
    }
    return date("d-m-Y", strtotime($date));
}
function press_date_disp_format($date)
{
    if($date==""){
        return $date;
    }
    return date("m/d", strtotime($date));
}
function date_time_disp_format($date)
{
    if($date==""){
        return $date;
    }
    return date("d-m-Y H:i", strtotime($date));
}
function date_time_db_format($date)
{
    if($date==""){
        return null;
    }
    return  date('Y-m-d H:i:s',strtotime($date));
}
function date_db_format($date)
{
    if($date==""){
        return null;
    }
    return  date('Y-m-d',strtotime($date));
}
function slash_date_db_format($date)
{
    if($date==""){
        return null;
    }
    $date = str_replace('/', '-', $date);
    return  date('Y-m-d',strtotime($date));
}
function to_date_db_format($date)
{
    if($date==""){
        return null;
    }
    
    return  date('Y-m-d',$date);
}

function get_rand_critical($length){
    if($length>0)
    {
        $rand_id="";
          mt_srand((double)microtime() * 1000000);
         for($i=1; $i<=$length; $i++)
         {
             $numone = mt_rand(1,36);
             $rand_id .= assign_rand_value($numone);
             usleep(50);
         }
    }
      return strtoupper($rand_id);
}
function x_week_range($date) {
    $ts = strtotime($date);
    $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
    return array(date('Y-m-d', $start),
                 date('Y-m-d', strtotime('next saturday', $start)));
}
function assign_rand_value($numone)
{
    switch($numone)
    {
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
        $rand_value = "0";
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
function moneyFormatIndia($num) {
return $num;
    $decimal="";
    if (($pos = strpos($num, ".")) !== FALSE) { 
        $decimal = ".".substr($num, $pos+1); 
        $num = substr($num, 0, $pos); 
    }

    $explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash.$decimal; // writes the final format where $currency is the currency symbol.
}
function roundval($number,$d)
{
    if($number=="" || $number==null){
        return "";
    }
    return number_format((float)$number, $d, '.', '');
}
function checkzero($number)
{
    if((float) $number>0){
        return $number;        
    }
    return "";
}
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}



function get_time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}

?>