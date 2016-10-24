<?php
	mysql_connect("localhost","root","");
	mysql_select_db("hotel");
	
	$state=$_GET['state'];
	
	$query_city="select distinct(city) from add_city where state='$state'";
	$exe_city=mysql_query($query_city);
	
?>
	                <select name="ddl_city" required>
                    <option value="">-Select City- </option>
					<?php
					while($res_city=mysql_fetch_array($exe_city))
					{
						?>
                        <option value="<?php echo $res_city['city'];?>"><?php echo $res_city['city'];?></option>
                        <?php
					}
					?>

                    </select>
