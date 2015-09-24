<?php
session_start();

if (isset($_GET['logout'])) {
  # code...
  unset($_SESSION['user_design']);
  unset($_SESSION['user_design_id']);
  header("Location:index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Thoongavanam</title>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Titillium+Web">
	
    <style type="text/css">
    nav, #rules, #contacts{
    	font-family: 'Titillium Web';
    	font-weight: bold;
      font-size: 1.5em;	 
    
    }
    #rules , #contacts,#open{
background-color: rgba(0,0,0,0.7);
 color: white;
}
     body::after{

        content:"";
    
    opacity: 0.9;
    z-index: -1;
      /*position: fixed;
        top: 0px;
        left: 0px;
        bottom: 0px;
        right: 0px;*/
      	background: url(./thoongavanam.jpg);
      	background-repeat: no-repeat;
      	background-position: center center;
      	background-size: 99% 90%;
      position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;

      }
      .design{
        position: relative;
        top:5em;
        left: 2.5em;
        color: white;
        font-weight: bold;
        font-family: 'Titillium Web';
        font-size: 2.4em;
         background: rgba(0,0,0,0.9);
         border: 1px solid white;
         border-radius: 0.4em;
         width: 30em; 
        margin: 0 auto;
      }
      #move{
        color: green;
        font-family: 'Titillium Web';
        font-size: 1.5em; 
        font-weight: bold;
        background-image: -webkit-linear-gradient(left,rgba(0,0,0,0.9),white);/* for chrome and safari*/
        background-image: -moz-linear-gradient(left,rgba(0,0,0,0.9),white);/*for firefox */
        background-image: -o-linear-gradient(left,rgba(0,0,0,0.9),white);/*for opera */
        background-image: linear-gradient(left,rgba(0,0,0,0.9),white);/* for IE */ 
 
      }/*
     #moving_text{
      border-radius: 2px;
      background-image: -webkit-linear-gradient(right,rgba(0,0,0,0.9),green);/* for chrome and safari*/
        /*background-image: -moz-linear-gradient(left,rgba(0,0,0,0.9),white);/*for firefox */
        /*background-image: -o-linear-gradient(left,rgba(0,0,0,0.9),white);/*for opera */
       /* background-image: linear-gradient(left,rgba(0,0,0,0.9),white);/* for IE */ 
      
     /*}  */
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<!-- Latest compiled and minified JavaScript -->

<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>
<body onload="fit();">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
   <ul class="nav navbar-nav">
<li id="nav1"cclass="active" onclick="toggle_nav(1);"><a href="#">Home</a></li> 
<li id="nav2" class="inactive" onclick="toggle_nav(2);"><a href="#rules">Rules</a></li>
<li id="nav3" class="inactive" onclick="toggle_nav(3);"><a href="#contacts">Contacts</a></li> 
<?php if(!isset($_SESSION['user_design']))echo "<li id='login'><a href='login.php'>Login</a></li>
                                       <li id='register'><a href='register.php'>Register</a></li>"; ?>
<li id="upload"><a href="upload.php">Upload</a></li>
<?php if(isset($_SESSION['user_design'])) echo "<li><a href='index.php?logout=1'>Logout</a></li>
<li style='margin-right:0px;'> Welcome ".$_SESSION['user_design']." </li>"; ?>
  </ul>
  </div>
 </nav> 
<div id="open">
<br/><br/><br/><br/>
<div id="move">
<marquee> <span id='moving_text'>Thoongavanam Poster Design !!</span></marquee>
</div>
<div class="design">
Designers  &nbsp; attention!  <br/>   Channel  your  love  for  cinema and design and<br/> 
create a spell-binding poster for the most-awaited movie of the decade,
<br/> Thoongavanam, featuring Ulaga Nagayan Kamal Haasan, and stand a 
<br/> chance to have your poster be used for the movie&rsquo;s official branding.

</div >
</div>
<div id="rules">
	<h2>RULES</h2>
  <hr/>
	<ol>
		<li>Only the given stock images should be used. </li>
		<li>Entries should be submitted before 4th October 2015.</li>
		<li>Poster should contain original logos of Thoongaavanam and Festember.</li>
    <li>All the artist&rsquo;s name as mentioned in the Thoongaavanam&rsquo;s
     <br/> official logo must be present in the final poster made by each participant.</li>
    <li>Thoongaavanam&rsquo;s logo given for the event by Festember 
    <br/>should not be used by the participant for any other purpose. </li>
    <li>The logos which are to be used for the posters can be downloaded below.</li>
   <li>Judges decisions are final.</li>
  </ol>
  <p>&nbsp;</p>
  <p>&nbsp;</p><p>Link to the images : </p>
  <p><a style="color:white;" href="https://drive.google.com/folderview?id=0B_qdVHOmsSiLU2tLUHJSRXoxZm8&usp=sharing" target="_blank">https://drive.google.com/folderview?id=0B_qdVHOmsSiLU2tLUHJSRXoxZm8&amp;usp=sharing</a></p>
</div>
<br/>
<div id="contacts">
	<div style="margin-left:40%;">
  CONTACTS
  <br/><br/>
  <ul>
    <li>Adhi - 9840314753</li>
 <li>chandish -  9677584041</li>
  </ul>
  </div>
  
</div>
</body>
<script type="text/javascript">
window.onresize = fit;
	function fit () {
		// body...
		var p=window.outerHeight;
      document.getElementById('open').style.width = window.outerWidth + 'px';
      document.getElementById('open').style.height = p + 'px';
      document.getElementById('rules').style.width = window.outerWidth + 'px';
      document.getElementById('rules').style.height = p + 'px';
      document.getElementById('contacts').style.width = window.outerWidth + 'px';
      document.getElementById('contacts').style.height =p + 'px';
       
	}
window.onscroll = change;
function change(){

if(window.scrollY>=590 && window.scrollY<=1210)
	toggle_nav(2);
else if(window.scrollY>=1220)
	toggle_nav(3);
else
	toggle_nav(1);
}
function toggle_nav(k){
document.getElementById('nav'+k).className ="active";
	for(var i=1;i<=3;i++){
		if(String(i)!=k)
		//$("#li"+String(i)).toggleClass("active inactive");
		document.getElementById('nav'+ String(i)).className ="inactive";
		
	   //document.write(String(i));
	}
}
</script>
</html>
<!--
Adhi - 9840314753
chandish -  9677584041


-->