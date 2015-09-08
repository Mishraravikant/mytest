<?php 
session_start();
include 'class/common.php';?>
<!DOCTYPE HTML>
    <html> 
    <head> 
        <title>My Devices</title> 
    </head> 
    <body> 
        <div align="center">
            <fieldset style="width:30%">
            <legend>My Devices </legend>
            <table border="0" cellpadding="5" cellspacing="2">
              	<tr> 
                     <td style="color:red"><?php if(isset($_SESSION['msg'])){
                         	echo $_SESSION['msg'];unset($_SESSION['msg']);
                        }
                      ?></td>
                      <td></td> 
                </tr>
                <tr>
                	<td>Id</td>
                    <td>Device Name</td>
                    <td>Imei No</td>
                </tr>
                <?php 
                $obj    = new common();
                $res    = $obj->getMyDevices($_SESSION['user_id']);
                if(count($res)){
                	$i=0;
                    foreach($res as $device){ 
                    	$i++;
                ?>
                <tr >
                	<td><?php echo $i;?></td>
                    <td><?php echo $device['device_name']?></td>
                    <td><?php echo $device['device_id']?></td>
                </tr>
                <?php }}else{?>
                <tr>
                    <td>No device found</td>
                </tr>
                <?php }?>
            </table>
            </fieldset> 
        </div> 
    </body> 
 </html>