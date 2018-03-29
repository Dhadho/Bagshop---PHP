
<?php
include("db.php");
if(!isset($_SESSION))
	session_start();
	
if(isset($_SESSION['flag']))
{
	echo "<script>alert('$_SESSION[flag]');</script>";
	unset($_SESSION['flag']);
}
?>

<html>
<head>
<title>Bag Shop| Bags</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
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
<div class="bikes">		 
	 <div class="mountain-sec">
		 <h2>College Bags</h2>
		 <?php
		 	$t1=mysqli_query($cn,"select * from  bags where category='College Bags'");
			if($t1)
			{
				foreach($t1 as $j)
				{
				extract($j);
				echo "				
		 <a href='single.php'><div class='bike'>				 
			 <img src='$mainimg1' alt='$name'/>
		     <div class='bike-cost'>
					 <div class='bike-mdl'>
						 <h4>$name<span>Price :$price</span></h4>
					 </div>
					 <div class='bike-cart'>						 
						 <a class='buy' href='single.php'>BUY NOW</a>
					 </div>
					 <div class='clearfix'></div>
				 </div>
				 <div class='fast-viw'>
						<a href='single.php'>Quick View</a>
				 </div>
			 </div></a>
			
				";
				}
			}
		 
		 ?>
		  <div class="clearfix"></div>
	  </div>
		 
	   
		 
	 </div>
</div>
<!---->
<?php include("footer.php"); ?>
<!---->

</body>
</html>

