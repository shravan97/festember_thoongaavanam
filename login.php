<?php 
$h=mysqli_connect("localhost","root","","thoongavanam");
if(isset($_REQUEST['btn_sub'])){

if(!empty($_REQUEST['email'])&& !empty($_REQUEST['pwd'])) {
//echo gettype($_REQUEST['roll_no']);
	
 $email=mysqli_real_escape_string($h,$_REQUEST['email']);$pwd=mysqli_real_escape_string($h,sha1($_REQUEST['pwd']));
 $h=mysqli_connect("localhost","root","","thoongavanam") or die("error.... ".mysqli_error($h));
	$query="select * from details where email='$email' and pwd='$pwd';";
 
 		
	
 
$r=mysqli_query($h,$query) or die("error.... ".mysqli_error($h));
$row=mysqli_num_rows($r);
 $arr = mysqli_fetch_assoc($r);

	if($row!=0)
	{session_start();$_SESSION['user_design']=$arr['uname'];
                     $_SESSION['user_design_id'] =$arr['id']; 
        
       header("Location:index.php");}
      
      else{
      	$err="Invalid Credentials.";
      	
      } 


}
else $err="One or more fields are empty.";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Chewy">
	    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<div>
	<a href="./">HOME</a>
</div>
<div>
<fieldset style="position:absolute;top:30%;left:40%;margin: auto;">
	<legend style="border:1px solid black;">
		LOGIN 
	</legend>
	<form method="post" action="login.php" enctype="multipart/form-data">
	EMAIL :<input type="text" name="email">
	<br/><br/>
	PASSWORD :<input type="password" name="pwd">
	<br/><br/>
	<span class="error"><?php if(isset($err)) echo $err."<br/>"; ?></span> 
	<input type="submit" value="SUBMIT" name="btn_sub">
	</form>
</fieldset>
</div>
</body>
</html>
