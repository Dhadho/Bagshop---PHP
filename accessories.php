
<?php
include("db.php");
if(!isset($_SESSION))
	session_start();
?><html>
<head>
<title>Bag Shop| Accessories </title>
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
<div class="parts">
	 <div class="container">
		 <h2>BIKE-ACCESSORIES</h2>
		 <div class="bike-parts-sec">
		 <div class="bike-parts acces">
			 <div class="top">
				 <ul>
					 <li><a href="index.html">home</a></li>
					 <li><a href="#"> / </a></li>
					 <li><a href="#">parts</a></li>
				 </ul>				 
			 </div>
			 <div class="bike-apparels">
				 <div class="parts1">
					 <a href="single.html"><div class="part-sec">					 
						 <img src="images/a1.JPG" alt=""/>
						 <div class="part-info">
							 <a href="#"><h5>Bike Fenders<span>$7.00</span></h5></a>
							 <a class="add-cart" href="single.html">Quick View</a>
							 <a class="qck" href="single.html">BUY NOW</a>
						 </div>
					 </div></a>
					 <div class="clearfix"></div>
				 </div>
				 
				 <div class="parts2">
					 <a href="single.html"><div class="part-sec">					 
						 <img src="images/a5.jpg" alt=""/>
						 <div class="part-info">
							 <a href="single.html"><h5>Electronics<span>$200.00</span></h5></a>
							 <a class="add-cart" href="single.html">Quick View</a>
							 <a class="qck" href="single.html">BUY NOW</a>
						 </div>
					 </div></a>
					 <div class="clearfix"></div>
				 </div>
				 
				 <div class="parts3">
					 <a href="single.html"><div class="part-sec">					 
						 <img src="images/a9.jpg" alt=""/>
						 <div class="part-info">
							 <a href="single.html"><h5>Disc Breaks<span>$200.00</span></h5></a>
							 <a class="add-cart" href="single.html">Quick View</a>
							 <a class="qck" href="single.html">BUY NOW</a>
						 </div>
					 </div></a>
					 <div class="clearfix"></div>
				 </div>
				 
				 <div class="parts4">
					 <a href="single.html"><div class="part-sec bottom-line">					 
						 <img src="images/a13.jpg" alt=""/>
						 <div class="part-info">
							 <a href="#"><h5>Mountain Bags<span>$200.00</span></h5></a>
							 <a class="add-cart" href="single.html">Quick View</a>
							 <a class="qck" href="single.html">BUY NOW</a>
						 </div>
					 </div></a>
					 <div class="clearfix"></div>
				 </div>
				 
			 </div>
		 </div>
		 
		 <div class="rsidebar span_1_of_left">
				 <section  class="sky-form">
					 <div class="product_right">
						 <h3 class="m_2">Categories</h3>
							<select class="dropdown" tabindex="10" data-settings='{"wrapperClass":"metro"}'>
								<option value="0">Frames</option>	
								<option value="1">Back Packs</option>
								<option value="2">Frame Bags</option>
								<option value="3">Panniers </option>
								<option value="4">Saddle Bags</option>								
						   </select>
					  </div>
			 
				 </section>
				 <section  class="sky-form">
						<h4>Brand</h4>
							<div class="row row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Lezyne</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Marzocchi</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>EBC</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Oakley</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Jagwire</label>
									<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Yeti Cycles</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Vee Rubber</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Zumba</label>
								</div>
							</div>
				   </section>		      
				   <section  class="sky-form">
						<h4>Price</h4>
							<div class="row row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>$50.00 and Under (30)</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$100.00 and Under (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$200.00 and Under (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$300.00 and Under (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$400.00 and Under (30)</label>
								</div>
							</div>
				   </section>		       
			 </div>	 
		 
		 <div class="clearfix"></div>
		 </div>
	  </div>
</div>
<!---->
<?php include("footer.php"); ?>
<!---->

</body>
</html>

