<?php
session_start();
if(!isset($_SESSION['admin_email']))
{
?>
<script>
	window.location="index.php";
</script>
<?php

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Change Password</title>
</head>

<body>
<div class="dashboard_main">
      <div class="header">
         <div class="header_left">
  			<label style="font-size:27px; color:#FFFFFF; font-weight:bold;"> DASHBOARD</label>
  		 </div>
		<div class="header_right">
    		<label style="color:#FFFFFF;">Welcome ,<?php echo $_SESSION['admin_email'];?> <a href="logout.php" style="color:#FFFFFF;">[LOGOUT]</a></label>
	    </div>
      </div>
      <div class="menu">
  		<div class="Dashboard"><b>
    		<a href="dashboard.php"> Dashboard</a></b>
    	</div>
        <div class="add_category"><b>
          <a href="add_category.php"> Add category </a> </b>  
        </div>
        <div class="add_sub_category"><b>
          <a href="add_sub_category.php"> Add sub category </a></b>
        </div>
        <div class="add_rooms"><b>
          <a href="Add_rooms.php"> Add rooms</a></b>
        </div>
        <div class="change_password"><b>
         <a href="change_password.php">  Change password</a></b>
    	</div>
        <div class="change_password"><b>
           <a href="viewsignup.php">View Signup</a></b>
    	</div>
 	  </div>      
      <div class="content">
      	<div class="content_head">
        <label style="color:#FFFFFF; font-size:20px; font-weight:bold;">
        Change Password</label>
        </div>
        <div class="add_cat">
        <table border="1">
        	<tr>
            <td>Old Password </td>
            <td> <input type="password" name="pwd"/></td>
            </tr>
            <tr>
            <td>New Password </td>
            <td> <input type="password" name="pwd"/> </td>
            </tr>
            <tr>
            <td> Confirm Password </td>
            <td> <input type="password" name="pwd"/></td>
            </tr>
             <tr>
            <td height="28">
            <input type="submit" name="btn_insert" value="Add Category" style="width:130px; background-color:#CCCCCC;"/>
            </td>
          </tr>
            
            
        </table>
        <br />
       </div>
      </div>
      <div class="dash_footer">
        <label style="color:#FFFFFF; font-weight:bold; " >
    	@All rights reserved|Powered by NSIT</label>
    	</div>
      </div>
 </div>  
</body>
</html>
