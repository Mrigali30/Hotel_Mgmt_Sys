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
		$category=$_POST['category'];
		$sub_category=($_POST['sub_category']);
		$hotel_name=trim($_POST['txt_nam']);
		$img=$_FILES['photo']['name'];
		$temp_img=$_FILES['photo']['tmp_name'];
		$address=$_POST['address'];
		$mobile=$_POST['no'];
		
		move_uploaded_file($temp_img,'upload/'.$img);
		
		$ins="insert into add_rooms (category,sub_category,hotel_name,photo,address,mobile) values ('$category','$sub_category','$hotel_name','$img','$address','$mobile')";
		$exe=mysql_query($ins);
		
		if($exe)
		{
			?>            
            <script>
				window.onload=function()
				{
					alert("Rooms Added Successfully");
				}			
			</script>            
            <?php
		}
	
	
}
?>
<?php
	// delete code
	
	if(isset($_GET['did']))
	{
		$del="delete from add_rooms where id='".$_GET['did']."'";
		$exe_del=mysql_query($del);
		
		if($exe_del)
		{
			?>
        	<script>
				window.onload=function()
				{
					alert("Delete successfully...");
					window.location="Add_rooms.php"; //so that we don't need to refresh the page again.... 
				}
			</script>
        <?php
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
	function showSubcat(str)
	{
		
		if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getSubcat.php?category="+str,true); // connect getSubcat.php
        xmlhttp.send();
    }
	
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Add Rooms</title>
</head>

<body>
	<div class="dashboard_main">
    	<div class="header">
         	<div class="header_left">
  			<label style="font-size:27px; color:#FFFFFF; font-weight:bold;"> DASHBOARD</label>
  		 	</div>
			<div class="header_right">
    		<label style="color:#FFFFFF;">Welcome ,<?php echo $_SESSION['admin_email'];?><a href="logout.php" style="color:#FFFFFF;">[LOGOUT]</a></label>
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
            ADD ROOMS</label>
            </div>
            <div class="add_cat">
            <form name="add_rooms" method="post" enctype="multipart/form-data">
            <table border="1">
                <tr>
                <td width="172">Category: </td>
                <td width="275"> 
                    <?php
                    $query_cat="select distinct(category) from add_sub_category";
					$exe_cat=mysql_query($query_cat);
                    ?>
                    
                    <select onChange="showSubcat(this.value);" name="category" required>
                    	<option value="">-Select Category- </option>
						<?php
						while($res_cat=mysql_fetch_array($exe_cat))
						{
							?>
                            <option value="<?php echo $res_cat['category'];?>"><?php echo $res_cat['category'];?></option>
                            <?php
						}
						?>

                    </select>
                </td>
                </tr>
                <tr>
                <td> Sub Category: </td>
                <td> 
                <select name="sub_category" id="txtHint" required>
                    <option value="">-Select Sub-category </option>
                    </select>
                </td>
                </tr>
                <tr>
                <td> Hotel Name: </td>
                <td><input type="text" size="30px" name="txt_nam" align="center" required /></td>
                </tr>
                <tr>
                <td>Photo</td>
                  <td>
                <input type="file" name="photo" required/>
                    </td>
                </tr>
                <tr>	
                <td>Address</td>
                <td>
                <textarea name="address" rows="6" cols="30" required></textarea>
                </td>
                </tr>
                <tr>
                <td>Mobile/Landline: </td>
                <td><input type="text" size="30px" name="no" align="center" required /></td>
                </tr>
               
                <tr>
                <td height="28">
                <input type="submit" name="btn_insert" value="Add Rooms" style="width:130px; background-color:#CCCCCC;"/>
                </td>
                </tr>
                
                
            </table>
            </form>
            <form name="form_search" method="post">
            <table border="1" align="center">
                <tr>
                <td><input type="text" name="txt_search" placeholder="Search"  /> </td>
                <td><input type="submit" name="btn_search" value="Search"  /> </td>
                </tr>
            </table>
            </form>
    
                <br />
                <?php
                
                if(isset($_POST['btn_search']))
                {
                    $search=trim($_POST['txt_search']);
                    $view="select * from add_rooms where category like '$search%'";
                    $exe_view=mysql_query($view);			
                }
                else if($_GET['ord']=='asc')
                {
                    $view="select * from add_rooms order by category asc";
                    $exe_view=mysql_query($view);
                }
                else if($_GET['ord']=='dsc')
                {
                    $view="select * from add_rooms order by category dsc";
                    $exe_view=mysql_query($view);			
                }
                else	 
                {	 
                $view="select * from add_rooms";
                $exe_view=mysql_query($view);
                }
                $num=mysql_num_rows($exe_view);
                
                if($num>0)
                {
                ?>
    
            <table width="858" border="1" align="center">
              <tr>
                <td width="125" bgcolor="#CCCCCC"> <label style="color:#000000; font-weight:bold"> Category 
                <a href="add_rooms.php">A</a>|<a href="add_rooms.php">D </a></label></td>       
                <td width="135" bgcolor="#CCCCCC"> <label style="color:#000000; font-weight:bold">Sub-category </label></td>
                <td width="127" bgcolor="#CCCCCC">  <label style="color:#000000; font-weight:bold"> Hotel-name </label> </td>
                <td width="245" bgcolor="#CCCCCC">  <label style="color:#000000;font-weight:bold"> Hotel-picture</label></td>
                <td width="83" bgcolor="#CCCCCC">  <label style="color:#000000; font-weight:bold" > Address</label> </td>
                <td width="103" bgcolor="#CCCCCC">  <label style="color:#000000; font-weight:bold" > Mobile No </label> </td>
                <td width="103" bgcolor="#CCCCCC">  <label style="color:#000000; font-weight:bold" > Action </label> </td>
              </tr>
              <?php
              
                while($result=mysql_fetch_array($exe_view))
                {
            ?>
                <tr style="color:#FFFFFF">
                    <td><?php echo $result['category'];?>  </td>
                    <td><?php echo $result['sub_category'];?>  </td>
                    <td><?php echo $result['hotel_name'];?>  </td>
                    <td><img src="<?php echo 'upload/'.$result['photo'];?>" height="100" width="100" />  </td>
                    <td><?php echo $result['address'];?>  </td>
                    <td><?php echo $result['mobile'];?>  </td>
                     <td><a  style="color:#FFFFFF" href="add_rooms.php?did=<?php echo $result['id'];?>" 
                     onClick="return confirm('Are u sure to delete....');"> Delete</a>  </td>
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
            <br />
            </div>
	</div>
    <div class="dash_footer">
        <label style="color:#FFFFFF; font-weight:bold; " >
    	@All rights reserved|Powered by NSIT</label>
    </div>
 </div>
</body>
</html>
