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
	if(isset($_POST['btn_insert']))
	{
		$category=trim($_POST['txt_name']);
		$status=$_POST['rbt'];
		$query_chk="select * from add_category where category='$category'";
		$exe_chk=mysql_query($query_chk);
		$num_chk=mysql_num_rows($exe_chk);
		if($num_chk==1)
		{
			?>
            <script>
				window.onload=function()
				{
					alert('Category already Exists');
					window.location="add_category.php";
				}
			</script>
            <?php		
		}
		else
		{
			$ins="insert into add_category (category,status) values ('$category','$status')";
			$exe=mysql_query($ins);
		
			if($exe)
			{
			?>            
            <script>
				window.onload=function()
				{
					alert("Category Added Successfully");
					window.location="add_category.php";
				}			
			</script>            
            <?php
			}
		}
	}
?>
<?php
	// delete code
	if(isset($_GET['did']))
	{
		$del="delete from add_category where id='".$_GET['did']."'";
		$exe_del=mysql_query($del);
		if($exe_del)
		{
		?>
        	<script>
				window.onload=function()
				{
					alert("Delete successfully...");
					window.location="add_category.php"; //so that we don't need to refresh the page again.... 
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
<title>ADD CATEGORY</title>
</head>
<body>
	<div class="dashboard_main">
      <div class="header">
         <div class="header_left">
  			<label style="font-size:27px; color:#FFFFFF; font-weight:bold;"> DASHBOARD-HOTEL MANAGEMENT SYSTEM</label>
  		 </div>
		<div class="header_right">
    		<label style="color:#FFFFFF;">Welcome <?php echo $_SESSION['admin_email'];?>, <a href="logout.php" style="color:#FFFFFF;">[LOGOUT]</a></label>
	    </div>
      </div>
      <div class="menu">
  		<div class="Dashboard"><b><a href="dashboard.php">
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
        <div class="change_password"><b>
           <a href="viewsignup.php">View Signup</a></b>
    	</div>
 	  </div>
      <div class="content">
      	<div class="content_head">
        <label style="color:#FFFFFF; font-size:20px; font-weight:bold;">
        ADD CATEGORY</label>
        </div>
        <div class="add_cat">
        <form name="add_category" method="post">
        <table border="1">
        	<tr>
            <td>Category: </td>
            <td> <input type="text" size="30px" name="txt_name" align="center"
             required placeholder="--Enter the Category--"/> </td>
            </tr>
            <tr>
            <td> Status: </td>
            <td> <input type="radio" name="rbt" value="Active" required/>Active
            <input type="radio" name="rbt" value="Deactive" required/>Deactive</td>
            </tr>
            <tr>
            <td height="28">
            <input type="submit" name="btn_insert" value="Add Category" style="width:170px; background-color:#CCCCCC;"/>
            </td>
          </tr>
        </table>
        </form>
        <br />
        <form name="form_search" method="post">
        	<table border="1" align="center">
            	<tr>
                <td><input type="text" name="txt_search" placeholder="Search"  /> </td>
                <td><input type="submit" name="btn_search" value="Search"  /> </td>
                </tr>
            </table>
        </form>
        <?php
			
			if(isset($_POST['btn_search']))
			{
				$search=trim($_POST['txt_search']);
				$view="select * from add_category where category like '$search%'";
				$exe_view=mysql_query($view);			
			}
			else if($_GET['ord']=='asc')
			{
				$view="select * from add_category order by category asc";
				$exe_view=mysql_query($view);
			}
			else if($_GET['ord']=='dsc')
			{
				$view="select * from add_category order by category dsc";
				$exe_view=mysql_query($view);			
			}
			else
			{
				$view="select * from add_category";
				$exe_view=mysql_query($view);
			}
			$num=mysql_num_rows($exe_view);
			if($num>0)
			{
		?>        
        <table border="1"  >
        <tr>
        <td width="215" bgcolor="#CCCCCC"> <label style="color:#000000; font-weight:bold" > Category 
        <a href="add_category.php">A</a>|<a href="add_category.php">D </a></label></td>
        <td width="88" bgcolor="#CCCCCC">  <label style="color:#000000; font-weight:bold" > Status </label> </td>
        <td width="106" bgcolor="#CCCCCC">  <label style="color:#000000; font-weight:bold" > Action </label></td>
        </tr>
		<?php
			while($result=mysql_fetch_array($exe_view))
			{
		?>
        	<tr style="color:#FFFFFF">
            	<td><?php echo $result['category'];?>  </td>
                <td><?php echo $result['status'];?>  </td>
                <td><a style="color:#FFFFFF" href="add_category.php?did=<?php echo $result['id'];?>" onClick="return confirm('Are u sure to delete....');"> Delete</a>  </td>
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
      </div>
      </div>
      	<div class="dash_footer">
        <label style="color:#FFFFFF; font-weight:bold; " >
    	@All rights reserved|Powered by NSIT</label>
    	</div>
	</div>
</body>
</html>
