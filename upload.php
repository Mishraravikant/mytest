<?php
include_once('Connection.php');

class Coupons extends sql
{
	public function __construct(){
		echo "<pre>";
		parent::__construct();
	}
	
	public function getCode($postId){
        echo $q  = "SELECT meta_value FROM `wp_postmeta` WHERE `post_id`=".$postId." AND `meta_key`='clpr_coupon_code'";
        $q    = sql::$db->prepare($q);   
	    $q->execute();
	    
	    $code  = '';
	    $r = $q->fetchAll(PDO::FETCH_ASSOC);
	    if(count($r)){
	       $code   = $r[0]['meta_value'];      
	    }
	    return $code;
	}
	
	public function updatePost($postId){
		$postedDate   = date('Y-m-d H:i:s');
		echo $q  = "UPDATE `wp_posts` SET `post_date`='" . $postedDate . "' WHERE `ID`=" . $postId;
		sql::$db->query($q);
	}
	
	public function request(){
        $q1   = "SELECT * FROM `wp_postmeta` WHERE `meta_key`='clpr_expire_date' and datediff(curdate(),`meta_value`) > 0";
		$q    = sql::$db->prepare($q1);
		$q->execute();
		while( $r = $q->fetch() ){
		    echo $code = $this->getCode($r['post_id']);      
		    
		    if(empty($code)){ 
		        $this->updatePost($r['post_id']);
		        
			    $expiryDate   = date('Y-m-d', strtotime('+10 days'));  
				echo $q2  = "UPDATE `wp_postmeta` SET `meta_value`='" . $expiryDate . "' WHERE `meta_id`=" . $r['meta_id'];
				sql::$db->query($q2);
		    }	
		}	
	}
}
	$obCJ	= new Coupons();
	$obCJ->request();
	
?>