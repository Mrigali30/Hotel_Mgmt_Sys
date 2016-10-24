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

	mysql_connect("localhost","root","");
	mysql_select_db("hotel");
?>
?>
<?php
	
	
	if(isset($_GET['did']))
	{
		$del="delete from signupform where id='".$_GET['did']."'";
		$exe_del=mysql_query($del);
		
		if($exe_del)
		{
		?>
        	<script>
				window.onload=function()
				{
					alert("Delete successfully...");
					window.location="viewsignup.php"; 
				}
			</script>
        <?php
		}
	}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Sign up View</title>
</head>

<body>
<div class="dashboard_main">
      <div class="header">
         <div class="header_left">
  			<label style="font-size:27px; color:#FFFFFF; font-weight:bold;"> DASHBOARD-HOTEL MANAGEMENT SYSTEM</label>
  		 </div>
		<div class="header_right">
    		<label style="color:#FFFFFF;">Welcome <?php echo $_SESSION['admin_email'];?> <a href="logout.php" style="color:#FFFFFF;">[LOGOUT]</a></label>
	    </div>
      </div>
      <div class="menu">
  		<div class="Dashboard"><b><a href="index.php">
    		 Dashboard</a></b>
    	</div>
            <div class="add_category"><b>
          <a href="add_category.php"> Add category </a> </b>  
           </div>
        <div class="add_sub_category"><b>
           <a href="add_sub_category.php">Add sub category </a></b>
        </div>
        <div class="add_rooms"><b>
           <a href="Add_rooms.php">Add rooms</a></b>
        </div>
        <div class="change_password"><b>
           <a href="change_password.php">Change password</a></b>
    	</div>
 	  </div>
   	 <div class="content">
     <div class="content_head">
        <label style="color:#FFFFFF; font-size:20px; font-weight:bold;">
        	VIEW SIGNUP</label>
        </div>
         <div class="add_cat">
<?php
			$view="select * from signupform";
			$exe_view=mysql_query($view);

			$num_signup=mysql_num_rows($exe_view);
			
			if($num_signup>0)
			{
?>         
                
         
         <table border="1" width="100%">
     <tr >
       <td width="80" bgcolor="#CCCCCC"> <label style="color:#000000; font-weight:bold" > Name</label></td>
       <td width="80" bgcolor="#CCCCCC">  <label style="color:#000000; font-weight:bold" > Gender </label> </td>
       <td width="80" bgcolor="#CCCCCC">  <label style="color:#000000; font-weight:bold" > Email </label></td>
       <td width="80" bgcolor="#CCCCCC">  <label style="color:#000000; font-weight:bold" > Mobile </label></td>
       <td width="80" bgcolor="#CCCCCC">  <label style="color:#000000; font-weight:bold" > State </label></td>
       <td width="80" bgcolor="#CCCCCC">  <label style="color:#000000; font-weight:bold" > City </label></td>
       <td width="80" bgcolor="#CCCCCC">  <label style="color:#000000; font-weight:bold" > Birthdate </label></td>
       <td width="80" bgcolor="#CCCCCC">  <label style="color:#000000; font-weight:bold" > Password </label></td>
       <td width="80" bgcolor="#CCCCCC">  <label style="color:#000000; font-weight:bold" >Action </label></td>
     
     </tr>
        <?php
			
			while($result=mysql_fetch_array($exe_view))
			{
		?>
        	<tr style="color:#FFFFFF">
            	<td><?php echo $result['name'];?>  </td>
                <td><?php echo $result['gender'];?>  </td>
                <td><?php echo $result['email'];?>  </td>
                <td><?php echo $result['mobile'];?>  </td>
                <td><?php echo $result['state'];?>  </td>
                <td><?php echo $result['city'];?>  </td>
                <td><?php echo $result['birthdate'];?>  </td>
                <td><?php echo $result['password'];?>  </td>
                 <td><a style="color:#FFFFFF" href="viewsignup.php?did=<?php echo $result['id'];?>" onClick="return confirm('Are u sure to delete....');"> Delete</a>  </td>
            </tr>	
        
        <?php
			}
		?>        
        </table>
       
           <?php
		   }
		   else
		   {
		   ?>
            <table>
            	<tr>
                	<td>
                    	<?php echo "<font color='red'>No Record Found</font>";?>
                    </td>
                </tr>
            </table>
            <?php
		   
		   }
         ?>
         </div>
         
         <div class="dash_footer">
        <label style="color:#FFFFFF; font-weight:bold; " >
    	@All rights reserved|Powered by NSIT</label>
    	</div>
     
     </div>
</div>

</body>
</html>
