<?php session_start();?>
<!DOCTYPE HTML>
    <html> 
    <head> 
        <title>Sign-Up</title> 
    </head> 
    <body id="body-color"> 
        <div id="Sign-Up" align="center"> 
            <form method="POST" action="action.php?action=register"> 
            <fieldset style="width:30%">
                <legend>Registration Form</legend> 
                    <table border="0" cellpadding="5" cellspacing="2"> 
                       	<tr> 
                            <td style="color:red"><?php if(isset($_SESSION['msg'])){
                            	echo $_SESSION['msg'];unset($_SESSION['msg']);
                            }
                            ?></td>
                            <td></td> 
                        </tr>
                    
                        <tr> 
                            <td>User Name</td>
                            <td> <input type="text" name="name"></td> 
                        </tr> 
                        <tr> 
                            <td>Email</td>
                            <td> <input type="text" name="email"></td> 
                        </tr> 
                        <tr> 
                            <td>Password</td>
                            <td> <input type="password" name="password"></td> 
                        </tr> 
                        <tr> 
                            <td>Confirm Password </td>
                            <td><input type="password" name="cpass"></td> 
                        </tr> 
                        <tr> 
                            <td><input id="button" type="submit" name="submit" value="Sign-Up"></td> 
                        </tr>                         
                    </table> 
             </fieldset> 
             </form>
         </div> 
    </body> 
 </html>