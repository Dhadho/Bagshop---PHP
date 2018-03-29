
<?php
include("db.php");
if(!isset($_SESSION))
	session_start();

if(isset($_POST['ch']))
{

	extract($_POST);
	extract($_SESSION);
	if($ch=='Add to cart'||$ch=='Buy Now')
	{	
		$_SESSION['buyinfo']=$ch;
		if(isset($_SESSION['type']))
		{
		echo "'$email',$pid,$qty,($qty*$price)";
			if($ch=='Add to cart')
			{
				$t=mysqli_query($cn,"insert into cart values(null,'$email',$pid,$qty,($qty*$price))");
				$t1=mysqli_query($cn,"update bags set quantity=quantity-$qty where bagid=$pid");
				
				if($t)
				{
					
					$_SESSION['flag']="Your Bag added in your cart";
					header('Location:index.php');
				}
		
			}
			elseif($ch=='Buy Now')
			{
			 $t=time();
			 $d=date("Y-m-d",$t);
				$t=mysqli_query($cn,"insert into sales values(null,'$d','$email',$pid,$qty,$price,($qty*$price))");
				$t1=mysqli_query($cn,"update bags set quantity=quantity-$qty where bagid=$pid");
				if($t)
				{
					$_SESSION['flag']="Your Bag delivered within 7 days";
					header('Location:index.php');
				}
			}
		}
		else
		{
			header('Location:login.php');
		}
	}


}
?>


<html>
<head>
<title>Bag Shop| Single </title>
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
<div class="product">
	 <div class="container">
		 <div class="ctnt-bar cntnt">
			 <div class="content-bar">
				 <div class="single-page">
					 <div class="product-head">
						<a href="index.php">Home</a> <span>::</span>	
						</div>
					 <!--Include the Etalage files-->
						<link rel="stylesheet" href="css/etalage.css">
						<script src="js/jquery.etalage.min.js"></script>
				<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 400,
					thumb_image_height: 400,
					source_image_width: 800,
					source_image_height: 1000,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
						<!--//details-product-slider-->
						<?php
						
			$t=mysqli_query($cn,"select * from bags where bagid=$_POST[id]");
			$i=mysqli_fetch_array($t);
			extract($i);
						echo "id= $_POST[id]
					 <div class='details-left-slider'>
						 <div class='grid images_3_of_2'>
						  <ul id='etalage'>
							<li>
								<a href='optionallink.php'>
									<img class='etalage_thumb_image' src='$mainimg' class='img-responsive' />
									<img class='etalage_source_image' src='$mainimg' class='img-responsive' title='' />
								</a>
							</li>
							<li>
								<img class='etalage_thumb_image' src='$addimg' class='img-responsive' />
								<img class='etalage_source_image' src='$addimg' class='img-responsive' title='' />
							</li>
						</ul>
						</div>
					 </div>
					 <div class='details-left-info'>
							<h3>$name</h3>
								<h4>$category</h4>
							<h4></h4>
							<p><label>&#8377;</label> $price </p>
				
					<form action=# method=post>
						<div class='color-quality-left'>
							<h5>Quantity :</h5>
							<input type=number name=qty min=1 max='$quantity' value=1>
							<input type=hidden name=pid value=$bagid>
							<input type=hidden name=price value=$price>
						</div>			 <br>
						<input type=submit name=ch value='Add to cart'>
						<input type=submit name=ch value='Buy Now'>
					</form>
							
							<div class='bike-type'>
							<p>Color  : $color</p>
							</div>
							<h5>Description  ::</h5>
							<p class='desc'>$description</p>
					 </div>
					 <div class='clearfix'></div>				 	
				  </div>";
				  ?>
			  </div>
		  </div>
	 </div>
</div>
<!---->
<?php include("footer.php"); ?>
<!---->

</body>
</html>

