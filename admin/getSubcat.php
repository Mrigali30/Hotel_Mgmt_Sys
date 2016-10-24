<?php
	mysql_connect("localhost","root","");
	mysql_select_db("hotel");
	
	$cat=$_GET['category'];
	
	
	$query_subcat="select distinct(sub_category) from add_sub_category where category='$cat'";
	$exe_subcat=mysql_query($query_subcat);
	
?>
	                <select name="sub_category" required>
                    <option value="">-Select Sub-category </option>
					<?php
					while($res_subcat=mysql_fetch_array($exe_subcat))
					{
						?>
                        <option value="<?php echo $res_subcat['sub_category'];?>"><?php echo $res_subcat['sub_category'];?></option>
                        <?php
					}
					?>

                    </select>
