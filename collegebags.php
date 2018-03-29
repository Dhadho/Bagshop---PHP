

<?php
include("db.php");
if(!isset($_SESSION))
	session_start();

if(isset($_SESSION['flag']))
{
	echo "<script>alert('$_SESSION[flag]');</script>";
	unset($_SESSION['flag']);
}

if(isset($_POST['ch']))
{
	extract($_POST);
	if($ch=='delete')
	{
		$m=mysqli_query($cn,"delete from bags where bagid=$bagid");
		if($m)
			echo "<script>alert('$bagid Deletion Successful')</script>";
		else	
			echo "<script>alert('$bagid Deletion failed')</script>";
	}
	else if($ch=='Edit')
	{
		$_SESSION['bagid']=$bagid;
		header('Location:edit.php');
	}
}

?>
<html>
<head>
<title>Bag Shop| Home </title>
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
<style>
.small
{
 width:100px;
 height:400px; 
}

</style>
<script src="js/jquery.easydropdown.js"></script>
<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/scripts.js" type="text/javascript"></script>
<!--js-->
<!---- start-smoth-scrolling---->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
		</script>
<!---- start-smoth-scrolling---->


</head>
<body>
<!--banner-->
<script src="js/responsiveslides.min.js"></script>
<script>  
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
<div class="banner-bg banner-bg1">	
	  <?php include("header.php"); ?> 
	 <div class="caption">
		 <div class="slider">
					   <div class="callbacks_container">
						   <ul class="rslides" id="slider">
							    <li><h1>COLLEGE BAGS</h1></li>
						  </ul>
						 </div>
				  </div>
	 </div>
	 <div class="dwn">
		<a class="scroll" href="#cate"><img src="images/scroll.png" alt=""/></a>
	 </div>				 
</div>
<!--bikes-->
<div class="bikes">	
		 <h3>POPULAR BAGS</h3>
		 <div class="bikes-grids">
		  <center>			 
			 <div class="products-container">
			 <?php
		$t=mysqli_query($cn,"select * from bags where category='College Bags'");
			 while($i=mysqli_fetch_array($t))
			 {
			 	echo"
				 <div class='products'>
					 <img src='$i[mainimg]' class='bagimg' alt=''/>
							 <h3>$i[name]</h3><h4>&#8377;$i[price]</h4>
						<form action='single.php' method=post> 	
						 <input type=hidden name=id value=$i[bagid]>			
						 <input type=submit name=ch value='Quick View'>
						</form>
						$i[quantity] Stacks Available<br>
					";
					if ($_SESSION['type']==1)
					echo "
					<form action=# method=post>
							   <input type=hidden name=bagid value=$i[bagid]>
							   	<input type=submit name=ch value='Edit'>
								<input type=submit name='delete' value='Delete'>
					</form>		";
					echo "		
						 <div class='clearfix'></div>
				 </div>";
				}
			?>	 
		    </ul>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>			 
	</div>
</div>
<?php include("footer.php"); ?>
<!---->

</body>
</html>

