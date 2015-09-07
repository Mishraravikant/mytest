<?php 
include 'class/common.php';

if('login' === $_REQUEST['action']){
    $cObj   = new common();
    $email  = isset($_POST['email']) ? $_POST['email'] : '';
    $pass   = isset($_POST['password']) ? $_POST['password'] : '';
    $login  = $cObj->checkLogin($email, $pass);
    
    if(count($login)){
        
    }else{
        echo 'Invalid details';
    }

}elseif('register' === $_REQUEST['action']){
    $cObj   = new common();
    
    $name   = isset($_POST['name']) ? $_POST['name'] : '';
    $email  = isset($_POST['email']) ? $_POST['email'] : '';
    $pass   = isset($_POST['password']) ? $_POST['password'] : '';
    
    $id     = $cObj->registerUser($name, $email, $pass);
    if($id){
        
    }else{
        echo 'Invalid details';
    }

}elseif('device' === $_REQUEST['action']){
    $cObj   = new common();
    print_r($_POST);
    $userId = 1;
    $name   = isset($_POST['name']) ? $_POST['name'] : '';
    $did    = isset($_POST['device_id']) ? $_POST['device_id'] : '';
    
    $arr    = $cObj->getLatLongOfDevice($did);
    print_r($arr);die;
    if(count($arr) == 2){
        $id     = $cObj->addDevice($userId, $name, $did, $arr[0], $arr[1]);
	    if($id){
	        
	    }else{
	        echo 'Invalid details';
	    }
    }else{
       echo "Invalid location";
    }    
}else{

}


?>