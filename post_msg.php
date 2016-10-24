<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("hotel");

if(isset($_POST['btn_post']))
{
	$title=trim($_POST['txt_ttl']);
	$descr=trim($_POST['descr']);
	$email=$_SESSION['client_email'];
	
	$ins="insert into blog (title,descr,email) values ('$title','$descr','$email')";
	$exe_ins=mysql_query($ins);
	
	if($exe_ins)
	{
		?>
        <script>
			window.onload=function()
			{
				alert('Message has been posted');
				window.location="post_msg.php";
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
<title>Untitled Document</title>
</head>
<body>
	<form name="POST MESSAGE" method="post">
    <table border="1"> 
    <tr>
     <td> Title: </td>
     <td><input type="title" name="txt_ttl"  required placeholder="Enter the Title" size="30"/>  </td>
    </tr>
    <tr>
    <td> Description: </td>
  <td> <textarea cols="30" name="descr" rows="5"  required placeholder="Enter the description"></textarea> </td>
    </tr>
    <tr>
    <td><input type="submit"  name="btn_post" value="POST" style="width:50px; background-color:#CCCCCC;"/>   </td>
    </tr>
    
    </table>
      </form>
      
      <form name="frm_comment" method="post">
      <?php
	  $query_show="select * from blog";
	  $exe_show=mysql_query($query_show);
	
		while($res_show=mysql_fetch_array($exe_show))
		{		
	  ?>
      <table>
      	
        	
			
           
        <tr>
        	<td style="font-weight:800;">
            		 <label style="font-weight:900;"><?php echo $res_show['email'];?> </label>            : <?php echo $res_show['title'];?>
            </td>
        </tr>
        <tr>
        	<td>
            	<?php echo $res_show['descr'];?>
            </td>
        </tr>
        <tr>
        	<td>
            	<?php
				
				
					$blog_id=$res_show['id'];
					$comment=trim($_POST['txt_comment']);
					$email=$_SESSION['client_email'];
					
					$ins="insert into comment (blog_id,comment,email) values ('$blog_id','$comment','$email')";
					$exe_ins=mysql_query($ins);
					
					$query_comment="select blog.id,blog.title,comment.id,comment.email,comment.blog_id,comment.comment from blog,comment where blog.id=comment.blog_id";
					$exe_comment=mysql_query($query_comment);
					while($res_comment=mysql_fetch_array($exe_comment))
					{
						?>
                        <label style="font-weight:800;"><?php echo $res_comment['email'];?> <br/> <?php echo $res_comment['comment'];?></label>
                        <?php
					}
				
				?>
            </td>
        </tr>
        
        <tr>
        	<td>
            	<textarea name="txt_comment" rows="6" cols="30" required></textarea> 
            </td>
        </tr>	
        <tr>
        	<td>
            	<input type="submit" name="btn_comment" value="Post Comment"/>
            </td>
        </tr>
      </table>
      <?php
	  }
	  ?>
      </form>
</body>
</html>
