
<?php

if(!session_start())
	session_start();
include("db.php");
if(isset($_POST['ch']))
{
	extract($_POST);
	extract($_FILES);
	if($ch=='Update')
	{
		$t=mysqli_query($cn,"select count(bagid) from bags");
		if($t)
			{
				$row=mysqli_fetch_array($t);
				$max=$row[0]+1;
			}
		else
			$max=0;
		if(!is_dir("img/$max"))
			mkdir("img/$max");
		$path="img/$max/".basename($mainimg1['name']);
		$path1="img/$max/".basename($addimg2['name']);
		$f1=move_uploaded_file($mainimg1['tmp_name'],$path);
		$f2=move_uploaded_file($addimg2['tmp_name'],$path1);
		if($f1 && $f2)
		{
			$t=mysqli_query($cn,"insert into bags values($max,'$category','$quantity','$name','$path','$path1','$color',$price,'$description')");
			if($t)
			{
				echo "<script>alert('Updation Successful')</script>";
			}
			else	
				echo "<script>alert('Updation failed')</script>";
			
		}
		else
			echo "Photo not uploaded";
	}
}
?>

<html>
<head>
<title>Bag Shop| Update Products</title>
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
			<h4 class="title">Update Bags</h4>
    		   <form action=# method="post"  enctype="multipart/form-data">
    				<table border=1 class=login-table>
					
			<tr><th>Bag Category </th><td> <select name='category'   required >
				<option> </option>
				<option value="College Bags">College Bags</option>
				<option value="Tourist Bags">Tourist Bags</option>
				<option value="Office Bags">Office Bags</option>
				<option value="Hand Bags">Hand Bags</option>
				</select>
			</td></tr>
		    	<tr><th>Bag Quantity </th><td><input type="text"  required name='quantity' placeholder="Bag-quantity" ></td></tr>
		    	<tr><th>Bag Name </th><td><input type="text"  required name='name' placeholder="Bag-Name" ></td></tr>
		    	<tr><th>Bag Color </th><td><input type="text"   required name='color'  placeholder="Bag -Color"></td></tr>
		    	<tr><th>Bag Price </th><td><input type="number"   required name='price'  placeholder="Bag - Price"></td></tr>
		    	<tr><th>Bag Front Image </th><td><input type="file"   required name='mainimg1'></td></tr>
		    	<tr><th>Bag Back image </th><td><input type="file"   required name='addimg2'></td></tr>
		    	<tr><th>Description </th><td><textarea   required name='description'></textarea></td></tr>
		    	<tr><th colspan="2"><input type="submit" name="ch" value="Update"></td></tr>
		    	</table>
				</form>		
				<div class="clear"></div>
			 </div>
						 </form>
						 <?php
						 	if(isset($f))
								echo "<script>alert('Update failed')</script>";
						 ?>
		</div>
	 <!---->
<?php include("footer.php"); ?>
<!---->

</body>
</html>
