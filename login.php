<?php
if(!session_start())
	session_start();
include('db.php');
if(isset($_POST['ch']))
{
	extract($_POST);
	if($ch=='Login')
	{
		$t=mysqli_query($cn,"select * from users where Email='$Email' and Password='$Password'");
		
		$row=mysqli_fetch_array($t);
		if($row)
		{
			extract($row);
			$_SESSION['userid']=$userid;
			$_SESSION['name']=$Name;
			$_SESSION['email']=$Email;
			$_SESSION['type']=$type;
			include('index.php');
			echo "<script>alert('Login Successfully')</script>";
			exit();		
		}
		else
		 $f=true;
	}	
}
?>
<html>
<head>
<title>Bag Shop| Login </title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Bike-shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css'>
<!--webfont-->
<!-- dropdown -->
<script src="js/jquery.easydropdown.js"></script>
<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/scripts.js" type="text/javascript"></script>
<!--js-->
</head>
<body>
<!--banner-->
<script src="js/responsiveslides.min.js"></script>
<script>  
    $(function () {
      $("#slider").responsiveSlides({
      	auto: false,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
<div class="banner-bg banner-sec">	
	  <div class="container">
			 <?php include("header.php"); ?>
	  </div> 				 
</div>
<!--/banner-->


	 <div class="container">
		<center>
		<br>
		<h1>Login</h1>
		
			<form action="#" method="post">
				<table class=login-table>
				<tr><th><label>Email</label></th>
				     <td> <input type="email" name="Email" size="18"></td></tr>
				<tr><th><label>Password</label></th>
				     <td> <input type="password" name="Password" size="18"></td></tr>
				<tr><th colspan=2  align=center><input type="submit" name="ch" class="button" value="Login"></th></td>
				</table>
				<div class="clear"></div>
		
			 </div>
						 </form>
						 <?php
						 	if(isset($f))
								echo "<script>alert('Login failed')</script>";
						 ?>
		</div>
	 <!---->
<?php include("footer.php"); ?>
<!---->

</body>
</html>

