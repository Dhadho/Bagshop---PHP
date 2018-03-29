<?php
$id=$_GET['id'];
include("db.php");
$t=mysqli_query($cn,"select * from states where country_id=$id");
while($j=mysqli_fetch_array($t))
	echo "<option value=$j[id]>$j[name]</option>";	

?>