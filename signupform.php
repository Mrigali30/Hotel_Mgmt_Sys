<?php
	mysql_connect("localhost","root","");
	mysql_select_db("hotel");
	if(isset($_POST['btn_insert']))
		{
			$name=trim($_POST['name']);
			$gender=$_POST['rbt'];
			$email=trim($_POST['mail_id']);
			$mobile=trim($_POST['number']);
			$state=$_POST['ddl_state'];
			$city=$_POST['ddl_city'];
			$birthdate=trim($_POST['date']);
			$password=trim($_POST['pwd']);
			$con=trim($_POST['cpwd']);
			
			if($password==$con)
			{
				$ins="insert into signupform (name,gender,email,mobile,state,city,birthdate,password) values ('$name','$gender','$email','$mobile','$state','$city','$birthdate','$password')";
				$exe=mysql_query($ins);
			
				if($exe)
				{
	?>            
				<script>
						alert("Sign-Up Successfully");
				</script>            
	<?php
				}
			
			
			}
			else
			{	
	?>
				<script>
					alert("Password is incorrect");
					window.location="signupform.php";
			</script>
 	<?php
		}
	}

	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
	function showCity(str)
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
        xmlhttp.open("GET","admin/getCity.php?state="+str,true); // connect getSubcat.phpand state
		// remember to have ajack file getcity in the same location of signupform.php location i.e. client side otherwise you have to write the proper pathway of the ajax file.
        xmlhttp.send();
    }
	
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" media="all" href="calender/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="calender/jsDatePick.min.1.3.js"></script>
	<?php
	include "calender.php";
	?>
<title>Sign Up Form</title>
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
	    <div class="signup">
		  <form name="Membership login" method="post">
  			<div style="color:#996600; width:400px; text-align:center; font-size:22px; font-weight:900;">
		  		Make An Account,Please Sign Up Here
  			</div>
  			<br/>
  			<div class="name">
 	 			<div class="full">Full name:</div>
  				<div class="f_name">
  					<input type="text" autocomplete="off" style="width:200px; height:22px; border-radius:15px;" 
                    name="name" required placeholder="Enter the Name"/>
  				</div>
  			</div>
 			<div class="name">
  				<div class="full"> Gender:</div>
  				<div class="f_name">
					<input type="radio" name="rbt" value="Male"/>Male
            		<input type="radio" name="rbt" value="Female"/>Female
  				</div>
  			</div>
  			<div class="name">
  				<div class="full">E-mail:</div>
  				<div class="f_name">
  					<input type="email" size="25" autocomplete="off" style="width:200px; height:22px;
                     border-radius:15px;" name="mail_id" required placeholder="--email---"/>
  				</div>
  			</div>
  			<div class="name">
  				<div class="full"> Mobile no:</div>
  				<div class="f_name">
  					<input type="text" size="25"style="width:200px; height:22px; border-radius:15px;" name="number" 
                    required placeholder=""/>
  				</div>
  			</div>
			<div class="name">
  				<div class="full">Select State:</div>
  				<div class="f_name">
                      <?php
                    $query_state="select distinct(state) from add_city";
					$exe_state=mysql_query($query_state);
                    ?>
                    
                    <select onChange="showCity(this.value);" name="ddl_state" style="width:200px; height:22px; border-radius:15px;" required>
                    	<option value="">-Select State- </option>
						<?php
						while($res_state=mysql_fetch_array($exe_state))
						{
							?>
                            <option value="<?php echo $res_state['state'];?>"><?php echo $res_state['state'];?></option>
                            <?php
						}
						?>

                    </select>

  				</div>
  			</div>
			<div class="name">
  				<div class="full">Select City:  </div>
  				<div class="f_name">
  					<select name="ddl_city" id="txtHint" style="width:200px; height:22px; border-radius:15px;">
            		<option value="">-Select City-</option>
                   
                	</select>
  				</div>
 			</div>
			<div class="name">
  <div class="full">
 Bith-date:
  </div>
  <div class="f_name">
  <input type="text" id="inputField" style="width:200px; height:22px; border-radius:15px;" size="25" name="date" required placeholder=""/>
  </div>
  </div>
  
  
  
  <div class="name">
  <div class="full">
 Password:
  </div>
  <div class="f_name">
   <input type="password" style="width:200px; height:22px; border-radius:15px;" size="25" name="pwd"/>
  </div>
  </div>
  
     <div class="name">
        <div class="full">
          Confirm Password:
        </div>
        <div class="f_name">
        <input type="password" style="width:200px; height:22px; border-radius:15px;" size="25" name="cpwd"/> </div>
        </div>
        <div class="submit">
        <input type="submit"  align="left" name="btn_insert" value="Submit" style="width:70px; background-color:#CCCCCC;"/> 
        </div>
     </form>
     </div>
     <div class="footer">
       Copyright@2016.All rights are Reserved.
     </div>
</div>

</body>
</html>
