<?php 
session_start();
$h = mysqli_connect("localhost","root","","thoongavanam");
if(!isset($_SESSION['user_design']))header("Location:login.php");
else{

        $u_id = mysqli_real_escape_string($h,$_SESSION['user_design_id']);
        $query_chck = "select uploaded from details where id=".$u_id.";";
        $r_chck = mysqli_query($h,$query_chck) or die("error....");
        $arr_chck = mysqli_fetch_array($r_chck);
        if($arr_chck['uploaded']=='no'){
if(isset($_POST['btn_sub'])){
  if(empty($_FILES['img']['name']) || (!(preg_match("/.jpg/", $_FILES['img']['name'])) && !(preg_match("/.ico/", $_FILES['img']['name'])) && !(preg_match("/.png/", $_FILES['img']['name']))))
		$new_photo_err="Pls upload a proper picture with extensions of .jpg or .png";
	else { 
		
		
        $img = (string)$_SESSION['user_design_id'].'.jpg';
        $id_user = mysqli_real_escape_string($h,$_SESSION['user_design_id']);
		move_uploaded_file($_FILES['img']['tmp_name'], "..\\"."thoongavanam"."\\uploads\\".$img);
		$query_up = "update details set uploaded='yes' where id=".$id_user.";";
		$r_up = mysqli_query($h,$query_up) or die("error ...");
          echo "Your photo is uploaded successfully !";  
          $arr_chck['uploaded']='yes';     
}
}
}
  
  else echo "You have already uploaded your poster .";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Chewy">
    <link rel="stylesheet" type="text/css" href="style4.css">
</head>
<body>

<div style="background:rgba(0,0,0,0.7);">
<a href="./">HOME</a>
</div>
<br/>	
<div style="position:relative;top:5em;">
<?php if(isset($arr_chck)){
	  if($arr_chck['uploaded']=='yes')
	  	echo "<!--";
	} ?>
<form method="post" action="upload.php" enctype="multipart/form-data">
UPLOAD HERE : <br/>
<input type="file" name='img'>
<br/>
<input id='submission' type="submit" name="btn_sub">
</form>
<?php if(isset($arr_chck)){
	  if($arr_chck['uploaded']=='yes')
	  	echo "-->";
	} ?>

</div>
</body>
</html>
