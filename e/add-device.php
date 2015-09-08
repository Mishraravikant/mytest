<?php 
include 'class/common.php';
$obj    = new common();
$obj->isUserLoggedIn();
?>
<!DOCTYPE HTML>
    <html> 
    <head> 
        <title>Add Device</title> 
    </head> 
    <body> 
        <div id="device" align="center"> 
            <form method="POST" action="action.php?action=device"> 
            <fieldset style="width:30%">
                <legend>Add Device</legend> 
                    <table border="0" cellpadding="5" cellspacing="2"> 
                      	<tr> 
                            <td style="color:red"><?php if(isset($_SESSION['msg'])){
                            	echo $_SESSION['msg'];unset($_SESSION['msg']);
                            }
                            ?></td>
                            <td></td> 
                        </tr>
                        <tr> 
                            <td>Device Name</td>
                            <td> <input type="text" name="name"></td> 
                        </tr> 
                        <tr> 
                            <td>IMEI No</td>
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