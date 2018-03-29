<?php
	echo "
	
	  <div class='container'>
			 <div class='header'>
			       <div class='logo'>
						 <a href='index.php'><img src='images/logo.png' alt=''/></a>
				   </div>							 
				  <div class='top-nav'>										 
						<label class='mobile_menu' for='mobile_menu'>
						<span>Menu</span>
						</label>
						<input id='mobile_menu' type='checkbox'>
					   <ul class='nav'>";
					   if(isset($_SESSION['name']))
					   {
					   	echo "<li class='dropdown1'><a href=''>$_SESSION[name]</a>
							  <ul class='dropdown2'>
									<li><a href='cart.php'>Myorders</a></li>";
							if($_SESSION['type']==1)
							echo "<li><a href='Update.php'>Update Products</a></li>
								  <li><a href='salesdetails.php'>Sales details</a></li>
							";
									
						echo "<li>
									<li><a href='logout.php'>Logout</a></li>												
							  </ul>
						  </li>";
					   }
					   else
					   	echo "<li  class='dropdown1'><a href='login.php'>Login</a></li>
							<li  class='dropdown1'><a href='register.php'>Register</a></li>";
						echo "
							<li class='dropdown1'><a href=''>TYPE OF BAGS</a>
							  <ul class='dropdown2'>
									<li><a href='collegebags.php'>COLLEGE BAGS</a></li>
									<li><a href='touristbags.php'>TOURIST BAGS</a></li>
									<li><a href='officebags.php'>OFFICE BAGS</a></li>	
									<li><a href='handbags.php'>HAND BAGS</a></li>												
							  </ul>
						  </li>
						  <a class='shop' href='cart.php'><img src='images/cart.png' alt=''/></a>
					  </ul>
				 </div>
				 <div class='clearfix'></div>
			 </div>
	  </div>";

?>