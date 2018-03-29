<?php
include("db.php");
if(isset($_POST['ch']))
{
	extract($_POST);
	$t=mysqli_query($cn,"insert into users values(null,2,'$name','$email','$password','$door','$street','$city','$state','$country',$pincode,$phoneno)");
	if($t)
	{
		echo "<script>alert('Registration Successful')</script>";

	}
	else	
		echo "<script>alert('Registration failed')</script>";
}
?>

<html>
<head>
<title>Bag Shop| 404 Error </title>
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
	

	function checkpassword(str,str1)
	{
		if(str != str1)
			document.getElementById("result").innerHTML="<br>Password Not Match";
		else			
			document.getElementById("result").innerHTML="";
	}
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
		<h1>Registration</h1>
		
			<form action="#" method="post">
				<table class=table>
				<tr><th><label>Name</label></th>
				     <td> <input type="text" name="name" size="18" placeholder="Name"  required></td></tr>
				<tr><th><label>Email</label></th>
				     <td> <input type="email" name="email" size="18"  placeholder="Email"  required></td></tr>
				<tr><th><label>Password</label></th>
				     <td> <input type="password" name="password" size="18"  placeholder="Password"  required></td></tr>
				<tr><th><label>confirmPassword</label></th>
				     <td> <input type="password" name="cpassword"  required onChange="checkpassword(this.value,password.value)" size="18"  placeholder="Password">
							<h4 id=result></h4>
					 </td></tr>
				<tr><th><label>Address</label></th>
				     <td><input type="text" name="door" size="18"  placeholder="Doorno"  required><br><br>
						 <input type="text" name="street" size="18"  placeholder="Street"  required><br>
							</td></tr>
		<script>		
		function getstates(str)
		{
		
			document.getElementById("city").innerHTML="<option></option>";
			if(str=='')
			
				document.getElementById("stat").innerHTML="<option>sample</option>";
			else
			{
				if(window.XMLHttpRequest)
						xml=new XMLHttpRequest();
				else
					xml=new ActiveXObject("Microsoft.XMLHTTP");
				xml.onreadystatechange=function(){
					if(this.readyState==4 && this.status==200)
					{
						document.getElementById("stat").innerHTML=this.responseText;
					}
				};
				xml.open("GET","getstates.php?id="+str,true);
				xml.send();
			}
		 
		}
		function getcities(str)
		{
			if(str=='')
				document.getElementById("city").innerHTML="<option>Sample</option>";
			else
			{
				if(window.XMLHttpRequest)
						xml=new XMLHttpRequest();
				else
					xml=new ActiveXObject("Microsoft.XMLHTTP");
				xml.onreadystatechange=function(){
					if(this.readyState==4 && this.status==200)
					{
						document.getElementById("city").innerHTML=this.responseText;
					}
				};
				xml.open("GET","getcities.php?id="+str,true);
				xml.send();
			}
		}
		</script>
				<tr><th><label>Country</label></th>
				     <td> <select name=country onChange="getstates(this.value)" required>
					 <option></option>
				<?php
				$t=mysqli_query($cn,"select * from countries");
				while($j=mysqli_fetch_array($t))
					echo "<option value=$j[id]>$j[name]</option>";				
				?>
				</select></td></tr>
				<tr><th><label>State</label></th>
				     <td> <select name=state id="stat" onChange="getcities(this.value)" required>
					  <option></option>
					 </select></td></tr>
				<tr><th><label>City</label></th>
				     <td> <select name=city id=city  required>
					 <option></option>
					 </select></td></tr>
				<tr><th><label>Postal Code</label></th>
				     <td> <input type="number" name="pincode" size="18" max=999999  required></td></tr>
				<tr><th><label>Phone No</label></th>
				     <td> <input type="number" name="phoneno" size="18" max=9999999999 min=1000000000 required></td></tr>
				<tr><th colspan=2><center><input type="submit" name="ch" class="button" value="Register"></th></td>
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