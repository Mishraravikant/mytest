<?php include 'class/common.php';?>
<!DOCTYPE HTML>
    <html> 
    <head> 
        <title><!-- Sign-Up --></title> 
    </head> 
    <body> 
        <div align="center">
            <fieldset style="width:30%">
            <legend><!-- Registration Form  --></legend>
            <table border="0" cellpadding="5" cellspacing="2">
                <tr>
                    <td>Name</td>
                    <td>Id</td>
                </tr>
                <?php 
                $obj    = new common();
                $res    = $obj->getMyDevices(1);
                if(count($res)){
                    foreach($res as $device){           
                ?>
                <tr>
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
        <div id="device" align="center"> 
            <form method="POST" action="action.php?action=device"> 
            <fieldset style="width:30%">
                <legend><!-- Registration Form  --></legend> 
                    <table border="0" cellpadding="5" cellspacing="2"> 
                        <tr> 
                            <td>Name</td>
                            <td> <input type="text" name="name"></td> 
                        </tr> 
                        <tr> 
                            <td>Id</td>
                            <td> <input type="text" name="device_id"></td> 
                        </tr> 
                        <tr> 
                            <td><input id="button" type="submit" name="submit" value="Save"></td> 
                        </tr>                         
                    </table> 
             </fieldset> 
             </form>
         </div> 
    </body> 
 </html>