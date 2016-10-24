<?php
session_start();

mysql_connect("localhost","root","");
mysql_select_db("hotel");

if(isset($_POST['btn_login']))
{
	
	$email=trim($_POST['email_id']);
	$pass=trim($_POST['pwd']);
	
	$query_login="select * from admin_login where email='$email' and passsword='$pass'";
	$exe_login=mysql_query($query_login);
	
	$num=mysql_num_rows($exe_login);

	if($num==1)
	{
		$_SESSION['admin_email']=$email;
		?>
        <script>
			window.location="dashboard.php";
		</script>
        <?php
	}
	else
	{
		?>
        <script>
			window.onload=function()
			{
				alert('Email or Password is incorrect');
				window.location="index.php";
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
<title>LOGIN PAGE</title>
</head>

<body bgcolor="#B9BEC4">

	<div class="main">
    	<div class="table">
        <fieldset style="width:250px; height:120px;">
        <legend>ADMIN LOGIN</legend>
        <form name="login page" method="post">
        <div class="email">
        	<div class="mail">
	            E-mail
            </div>
            <div class="email-login">
        
        		<input type="email" size="40" name="email_id" required placeholder="Enter the Email"/>
              
        	</div>
        </div>
        <div class="password">
        	<div class="pass">
            <center>
            Password</center>
            </div>
            <div class="word">
            
            <input type="password" name="pwd" size="40" required placeholder="Enter the Password"/>
            
            </div>
        </div>
        <div class="submit">
        		<input type="submit" name="btn_login" value="Login" style="width:80px; background-color:#CCCCCC;"/>
        </div>
        </form>
        </fieldset>
        </div>
    
    </div>
</body>
</html>
