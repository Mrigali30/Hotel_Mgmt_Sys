<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("hotel");
if(!isset($_SESSION['client_email']))
{
?>
<script>
	window.location="index.php";
</script>

<?php
}

if(isset($_POST['btn_choose_hotel']))
{	
	$cat_s=$_POST['ddl_cat'];
	$subcat_s=$_POST['ddl_sub_category'];

	

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
        xmlhttp.open("GET","getsubcat.php?category="+str,true); 
        xmlhttp.send();
    }
	
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Choose Hotel - Hotel Management System</title>
</head>

<body>
<div class="main">
  <div class="header">
   Hotel Management System
  </div>
  <div class="header_footer">
  	<div class="menu">
    <?php
	 include "menu.php";
	?>
    </div>
  </div>
  <div class="con">
  </div>
  
  <div class="table" style="height:500px; overflow:scroll;">
  Choose Your Hotel
  <form name="frm_choose_hotel" method="post">
  <table border="1">
  <tr>
  <td>Choose Category: </td>
  	<td>
    	<?php
		$query_cat="select distinct(category) from add_rooms";
		$exe_cat=mysql_query($query_cat);
		?>
  		<select name="ddl_cat" onChange="showSubcat(this.value);" style="width:220px;height:22px; border-radius:15px;" required>
        	<option value="">-Select Category-</option>
            <?php
			while($res_hotel=mysql_fetch_array($exe_cat))
			{
				?>
                <option value="<?php echo $res_hotel['category'];?>"><?php echo $res_hotel['category'];?></option>
                <?php
			}
			?>
        </select>
  	</td>
  </tr>
  <tr>
  <td>Select Subcategory: </td>
  <td id="txtHint">
  <select name="ddl_sub_category"  style="width:220px; height:22px; border-radius:15px;">
            		<option value="">-Select Subcategory-</option>
                	</select>
  </td>
  </tr>
  <tr>
  	<td colspan="2"> 
  		<input type="submit" name="btn_choose_hotel" value="Search Hotel" style="width:100px; background-color:#CCCCCC;"/> 
   	</td> 
  </tr>
  </table>
  </form>
	<h3>Search Hotel Result</h3>
    <?php
	$query_s="select * from  add_rooms where category='$cat_s' and sub_category='$subcat_s'";
	$exe_s=mysql_query($query_s);
	?>
	<table border="1" width="80%">
    	<tr>
        	<th>Category</th>
            <th>Sub Category</th>
            <th>Hotel Name</th>
            <th>Photo</th>
            <th>Address</th>
            <th>Contact Number</th>
        </tr>
        <?php
		while($res_s=mysql_fetch_array($exe_s))
		{
		?>
        <tr align="center">
        	<td><?php echo $res_s['category'];?></td>
            <td><?php echo $res_s['sub_category'];?></td>
            <td><?php echo $res_s['hotel_name'];?></td>
            <td align="center"><img src="<?php echo 'admin/upload/'.$res_s['photo'];?>" width="100" height="100"/></td>
            <td><?php echo $res_s['address'];?></td>
            <td><?php echo $res_s['mobile'];?></td>
        </tr>
        <?php
		}
		?>
    </table>
  </div>
   <div class="footer">
  Copyright@2016.All rights are Reserved.
  </div>
</div>
</body>
</html>
