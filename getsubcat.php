<?php
	mysql_connect("localhost","root","");
	mysql_select_db("hotel");
	
	$cat=$_GET['category'];
	
	$query_sub_cat="select distinct(sub_category) from add_rooms where category='$cat'";
	$exe_sub_cat=mysql_query($query_sub_cat);
	
?>
<select name="ddl_sub_category"  style="width:220px; height:22px; border-radius:15px;">
   <option value="">-Select Subcategory-</option>
   <?php
   while($res_subcat=mysql_fetch_array($exe_sub_cat))
   {
   	?>
    <option value="<?php echo $res_subcat['sub_category'];?>"><?php echo $res_subcat['sub_category'];?></option>
    <?php
   }
   ?>
</select>