<?php 
$errs=0;
if(isset($_REQUEST['btn_sub'])){
	$h = mysqli_connect("localhost","root","","thoongavanam");
	if(empty($_REQUEST['name']))
		{$errs++;$err_name="Please enter your name";}
	 if(empty($_REQUEST['uname']))
       {$err_uname="Please enter in the username";$errs++;}
	 else{
	 	$username=mysqli_real_escape_string($h,$_REQUEST['uname']);
     	$query_uname = "select * from details where uname='$username';";
    $r=mysqli_query($h,$query_uname);
    if($r)
    $row_uname=mysqli_num_rows($r);
    if(isset($row_uname)&&$row_uname!=0){
    	$err_uname="This username already exists .";
     $errs++;}} 
	  if(empty($_REQUEST['pwd']))
		{$errs++;$err_pwd="Please enter in the password";}
      else{
      	$pwd_val=mysqli_real_escape_string($h,sha1($_REQUEST['pwd']));
    $query_pwd = "select * from details where pwd='$pwd_val';";
    $r=mysqli_query($h,$query_pwd);
    if($r)
    $row_pwd=mysqli_num_rows($r);
    if(isset($row_pwd)&&$row_pwd!=0){$errs++;
    	$err_pwd="This password already exists .";
    }
	}
	if(empty($_POST['dob'])){$errs++;
		$err_dob="Please enter your Date Of Birth";
	}
	if(empty($_POST['city'])){$errs++;
		$err_city="Please enter the City";
	}
	if(empty($_POST['coll'])){$errs++;
		$err_coll="Please enter your College";
	}
	if(empty($_POST['ph_no'])){$errs++;
		$err_ph_no="Please enter your Phone number";
	}
	else{

	}
	if(empty($_POST['email'])){$errs++;
		$err_email="Please enter your email";
	}
	
	     
  if($errs==0)
  { $dob = mysqli_real_escape_string($h,$_POST['dob']);
    $city = mysqli_real_escape_string($h,$_POST['city']);
    $coll = mysqli_real_escape_string($h,$_POST['coll']);
    $ph_no = mysqli_real_escape_string($h,$_POST['ph_no']);
    $email = mysqli_real_escape_string($h,$_POST['email']);
     
 $name_1 = mysqli_real_escape_string($h,$_POST['name']);
 $query_ins = "insert into details(name ,dob,city,college,phone_num,email, uname, pwd,uploaded) values('$name_1','$dob','$city','$coll',".$ph_no.",'$email','$username','$pwd_val','no');";
 $r_ins = mysqli_query($h,$query_ins) or die("error...");
 echo "successfully registered!!";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>REGISTER!</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Chewy">
<link rel="stylesheet" type="text/css" href="style3.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>	
</head>
<body>
<div>
	<a href="./">Home</a>
</div>
<br/><br/><br/><br/><br/><br/><br/><br/>
<div id="reg">
<form action="register.php" method="post" enctype="multipart/form-data">
<table>
	<tr>
		<td>NAME : </td>
		<td><input type="text" name="name" required placeholder="enter your name...">
		    <span class="error"><?php if(isset($err_name))echo $err_name;?></span></td>
	</tr>
	<tr>
		<td>USERNAME : </td>
		<td><input type="text" id="inp1" name="uname" required placeholder="enter a valid username..">
		     <span class="error"><?php if(isset($err_uname))echo $err_uname;?></span>
		     <span id="inp1_chck"></span></td>
	</tr>

	<tr>
		<td>PASSWORD : </td>
		<td> <input type="password" id="inp2" name="pwd" required placeholder="enter a password...">
		      <span class="error"><?php if(isset($err_pwd))echo $err_pwd;?></span>
		      <span id="inp2_chck"></span></td>	
	</tr>
	<tr>
		<td>DATE OF BIRTH : </td>
		<td><input type="date" name="dob" required>
		     <span class="error"><?php if(isset($err_date))echo $err_date;?></span>
		</td>
	</tr>
	<tr>
		<td>CITY : </td>
		<td><input type="text" name="city" required>
		     <span class="error"><?php if(isset($err_city))echo $err_city;?></span>
		</td>
	</tr>
	<tr>
		<td>COLLEGE NAME : </td>
		<td><input type="text" name="coll" required>
		     <span class="error"><?php if(isset($err_coll))echo $err_coll;?></span>
		</td>
	</tr>
	<tr>
		<td>PHONE NUMBER : </td>
		<td><input type="text" name="ph_no" required>
		     <span class="error"><?php if(isset($err_ph_no))echo $err_ph_no;?></span>
		</td>
	</tr>
	<tr>
		<td>EMAIL : </td>
		<td><input type="text" name="email" required>
		     <span class="error"><?php if(isset($err_email))echo $err_email;?></span>
		</td>
	</tr>
	<tr>
		<td><input type="submit" name="btn_sub"></td>
	</tr>
	
	
</table>
</form>
</div>
</body>

</html>
