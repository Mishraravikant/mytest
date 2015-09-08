<?php 
session_start();
include 'class/common.php';

if('login' === $_REQUEST['action']){
    $cObj   = new common();
    $_POST
    $email  = isset($_POST['email']) ? $_POST['email'] : '';
    $pass   = isset($_POST['password']) ? $_POST['password'] : '';print_r($_POST);
    $login  = $cObj->checkLogin($email, $pass);
    
    if(count($login)){
        $_SESSION['user_id']	= $login[0]['id'];
        $_SESSION['name']		= $login[0]['name'];
        $_SESSION['email']		= $login[0]['email'];
    }else{
    	$_SESSION['msg']		= 'Invalid login credentials';
    	//header('Location: index.php');
    }

}elseif('register' === $_REQUEST['action']){
    $cObj   = new common();
    
    $name   = isset($_POST['name']) ? $_POST['name'] : '';
    $email  = isset($_POST['email']) ? $_POST['email'] : '';
    $pass   = isset($_POST['password']) ? $_POST['password'] : '';
    
    $id     = $cObj->registerUser($name, $email, $pass);
    if($id){
    	$_SESSION['msg']		= 'User registered successfully.';
    	header('Location: index.php');
    	 
    }else{
    	$_SESSION['msg']		= 'Invalid login credentials';
    	header('Location: registration.php');
    }

}elseif('device' === $_REQUEST['action']){
    $cObj   = new common();
    $userId = $_SESSION['user_id'];
    $name   = isset($_POST['name']) ? $_POST['name'] : '';
    $did    = isset($_POST['device_id']) ? $_POST['device_id'] : '';
    
    $arr    = $cObj->getLatLongOfDevice($did);

    if(count($arr) == 2){
        $id     = $cObj->addDevice($userId, $name, $did, $arr[0], $arr[1]);
	    if($id){
	    	$_SESSION['msg']		= 'Device added successfully.';
	    	header('Location: device.php');
	    }else{
	    	$_SESSION['msg']		= 'Something went wrong.';
	    	header('Location: add-device.php');
	    }
    }else{
       echo "Invalid location";
    }    
}else{

}


?>