
<?php
include("db.php");
if(!isset($_SESSION))
	session_start();

			
			if(isset($_SESSION['email']))
			{
						extract($_SESSION);
			}
			
			else
			 header("Location:login.php");
			 
			 if(isset($_POST['ch']))
			 {
			 	extract($_POST);
			    if($ch=='Buy Item')
				{
				
				$t=mysqli_query($cn,"select * from cart where cartid=$cartid");
				$res=mysqli_fetch_array($t);
				extract($res);
					$t=time();
			 		$d=date("Y-m-d",$t);
					$t=mysqli_query($cn,"insert into sales values(null,'$d','$email',$productid,$quantity,$price,$total)");
					$t1=mysqli_query($cn,"delete from cart where cartid='$cartid'");
					if($t)
						$_SESSION['flag']="Your purchase completed. Your order delivered with in 3 days";
					else
						$_SESSION['flag']="Order failed!!";
						header('Location:index.php');
				} 
				if($ch=='Remove Item')
				{
					$t1=mysqli_query($cn,"update bags set quantity=quantity+$quantity where bagid=$bagid");
					$t=mysqli_query($cn,"delete from cart where cartid='$cartid'");
					if($t)
						echo "<script>('Bag removed from cart');</script>"; 
					else
						echo "<script>('Bag not removed!!');</script>";
				}
			 }
?>
<html>
<head>
<title>Bag Shop| Cart </title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="bike Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
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
<div class="cart">
	 <div class="container">
		 <div class="cart-top">
			<a href="index.php"><< home</a>
		 </div>	
			
		 <div class="col-md-9 cart-items">
			<?php
			
			
	extract($_POST);
	if(isset($_SESSION['email']))
	{

		$t=mysqli_query($cn,"select count(bagid) from cart where email='$_SESSION[email]'");
		if($t)
		{
			$i=mysqli_fetch_array($t);
			$items=$i[0];	
			echo "
			 <h2>My Shopping Bag ($items)</h2>";
		}
		$t=mysqli_query($cn,"select sum(total) from cart where email='$_SESSION[email]'");
		if($t)
		{
			$i=mysqli_fetch_array($t);
			$ftotal=$i[0];
		}
		if ($items>0)
		{
		extract($_SESSION);
		$k=1;
		$t=mysqli_query($cn,"select * from cart where email='$email'");
		while($i=mysqli_fetch_array($t))
		{
			extract($i);
			$qty1=$quantity;
			$t1=mysqli_query($cn,"select * from bags where bagid='$bagid'");
			$j=mysqli_fetch_array($t1);
			extract($j);
			$tot=($price * $qty1);
			echo "
			<div class='cart-header'>
				 <div class='cart-sec'>
						<div class='cart-item cyc'>
							 <img src='$mainimg'/>
						</div>
					   <div class='cart-item-info'>
							 <h3>$name<span>$category</span></h3>
							 <h4><span>Rs.  </span>$price / Item</h4>
							 <p class='qty'>Qty ::</p>$qty1
							 <h4><span>Total Amount = Rs.  </span>$tot</h4>
							 
						<form action=# method=post> 
						    <input type=hidden name=cartid value=$cartid>
						    <input type=hidden name=email value='$email'>
						    <input type=submit name=ch value='Remove Item'>
						</form>
					   </div>
					   <div class='clearfix'></div>
						<div class='delivery'>
							 <span>Delivered in 2-3 bussiness days</span>
							 <div class='clearfix'></div>
				        </div>						
				  </div>
			 </div>
		";
		}
		echo "
		</div>
		<div class='col-md-3 cart-total'>
			 <a class='continue' href='index.php'>Continue to Shopping</a>
			 <div class='price-details'>
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class='total'>$ftotal</span>
				 <span>Discount</span>
				 <span class='total'>---</span>
				 <span>Delivery Charges</span>
				 <span class='total'>150.00</span>
				 <div class='clearfix'></div>				 
			 </div>	
			 <h4 class='last-price'>TOTAL</h4>
			 <span class='total final'>".($ftotal+150)."</span>
			 <div class='clearfix'></div>
			 <form actio=# method=post>
			 <button type=submit name='ch' value='Buy Now' class='order'>
			 Place Order
			 </button>
			 </form>
			</div>

		";
		}
		else
		 echo "Your Cart is Empty";
}
		?>
		 
		 </div>
		 	 </div>
</div>
<!---->
<?php include("footer.php"); ?>
<!---->

</body>
</html>

