<?php
require_once 'connection.php';
class common extends connection 
{
    public function __construct(){
        parent::__construct();
    }
    
    public function checkLogin($email, $password){
        echo $query  = "SELECT * FROM user WHERE email=? AND password=? LIMIT 1";
        $row    = $this->getAll($query, array($email, md5($password)));
        return $row;
    }
    
    public function registerUser($name, $email, $password){
		$query    = "INSERT INTO user(`name`, `email`, `password`) VALUES(?, ?, ?)";
		$res      = $this->query($query, array($name, $email, md5($password)));
		return $this->getInsertID();
    }
    
    public function addDevice($userId, $name, $deviceId, $lat, $long){
        $query    = "INSERT INTO device(`user_id`, `device_id`,`device_name`, `lat`, `long`) VALUES(?, ?, ?, ?, ?)";
        $res      = $this->query($query, array($userId, $deviceId, $name, $lat, $long));
        return $this->getInsertID();
    }
    
    public function getMyDevices($userId){
        $query  	= "SELECT * FROM device WHERE user_id=?";
        $rows   	= $this->getAll($query, array($userId));
        $arrData	= array();
        foreach ($rows as $row){
        	$arrData[]	= array('device_name'=>$row['device_name'], 'device_id'=>$row['device_id'], 'lat'=>$row['lat'], 'long'=>$row['long']);
        }
        return $arrData;
    }
    
    public function getLatLongOfDevice($deviceId){//357803046658494
        $content    = $this->download("http://location.eseye.net/location_getlastrecord.php?imei=".$deviceId);
        $arr=array();
        if(isset($content)){
            $data   = explode(';',$content);
            if(count($data) == 3){
                $arr    = explode(',',$data[1]);    
            }
        }    
        
        return $arr;
    }
    
    

    public function download($Url){
	    if (!function_exists('curl_init')){
	        die('Sorry cURL is not installed!');
	    }
	 
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $Url);
	    //curl_setopt($ch, CURLOPT_REFERER, "http://www.example.org/yay.htm");
	    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	    $output = curl_exec($ch);
	    curl_close($ch);
	    return $output;
    }

    
    

}
?>