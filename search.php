<?php
include("connection.php");
extract($_REQUEST);
session_start();
if(isset($_SESSION['cust_id']))
{
	 $cust_id=$_SESSION['cust_id'];
	 $qq=mysqli_query($con,"select * from tblcustomer where fld_email='$cust_id'");
	 $qqr= mysqli_fetch_array($qq);
}
else
{
	$cust_id="";
}
if(Isset($vendor_id))
{
$vid= $vendor_id;
}
else
{
	header("location:index.php");
}
if(isset($login))
 {
	 header("location:form/index.php");
 }
 if(isset($logout))
 {
	 session_destroy();
	 header("location:index.php");
 }

$query=mysqli_query($con,"select * from tblvendor where fldvendor_id='$vid'");
$row=mysqli_fetch_array($query);
echo $row['fld_name'];
$query=mysqli_query($con,"select tbfood.foodname,tbfood.fldvendor_id,tbfood.cost,tbfood.cuisines,tbfood.fldimage,tblcart.fld_cart_id,tblcart.fld_product_id,tblcart.fld_customer_id from tbfood inner  join tblcart on tbfood.food_id=tblcart.fld_product_id where tblcart.fld_customer_id='$cust_id'");
  $re=mysqli_num_rows($query);
?>
<html>
  <head>
     <title>FastFood Details</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<style>
ul li {list-style:none;}
ul li a{color:black; font-weight:bold;}
ul li a:hover{text-decoration:none;}
</style>
<style>
.img-container {
text-align: center;
}
</style>
  </head>
  
    
	<body>
	

<div id="result" style="position:fixed;top:100; right:50;z-index: 3000;width:350px;background:white;"></div>

<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
  
    <a class="navbar-brand" href="index.php"><span style="color:green;font-family: 'Permanent Marker', cursive;">Dr!ve FoodSetGo</span></a>
    <?php
	if(!empty($cust_id))
	{
	?>
	<a class="navbar-brand" style="color:white; text-decoratio:none;"><i class="far fa-user"><?php if(isset($cust_id)) { echo $qqr['fld_name']; }?></i></a>
	<?php
	}
	?>
	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
	
      <ul class="navbar-nav ml-auto">
	      
          
		  <li class="nav-item">
		     <a href="index.php" style="color:white;" class="nav-link">Home</a>
		  </li>
		  <li class="nav-item">
		     <a href="aboutus.php" style="color:white;" class="nav-link">About Us</a>
		  </li>
		  <li class="nav-item">
		     <a href="services.php" style="color:white;" class="nav-link">Services</a>
		  </li>
		  <li class="nav-item">
		     <a href="contact.php" style="color:white;" class="nav-link">Contact Us</a>
		  </li>
		  <?php
			if(empty($cust_id))
			{
			?>
			<li class="nav-item">
			  <a href="form/index.php?msg=you must be login first" class="nav-link"><span style="color:green;  font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:green;" id="cart"  class="badge badge-dark">0</span></i></span></a>
		    </li>
			
			<li class="nav-item">
			<a  class="nav-link"><form method="post"><button class="btn btn-success my-2 my-sm-0" name="login" type="submit">Log In</button></form></a>
            </li>
			<?php
			}
			else
			{
			?>
			<li class="nav-item">
			<a href="form/cart.php" class="nav-link"><form method="post"><span style=" color:green; font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:green;" id="cart"  class="badge badge-light"><?php if(isset($re)) { echo $re; }?></span></i></span></form></a>
			</li>
			<li class="nav-item">
			<a class="nav-link"><form method="post"><button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Log Out</button></form></a>
			</li>
			<?php
			}
			?>
	  
		
        
      </ul>
	  
    </div>
	
</nav>
<br><br><br><br>
<div class="container" >
<img src="img/five-points-proposed-hotel-2012.jpg" alt="no Pic Available" height="400px" width="100%">
</div>
<div class="container-fluid" >
<br><br>
<div class="row">
   <div class="col-sm-1"></div>
   <div class="col-sm-10" >
   <h1 style="color:#01C699;text-transform:uppercase;"><?php echo $row['fld_name']; ?></h1><br><br>
   <span style="color:#A5A5A5;font-size:25px;text-transform:uppercase;"><i class="fas fa-home"></i></span>&nbsp;&nbsp;<span style="font-family: 'Tangerine', serif; font-weight:bold;font-size:25px; color:#ED2553;"><?php echo $row['fld_address']?></span><br><br>
   <span style="color:#A5A5A5;font-size:25px;"></span>&nbsp;&nbsp;
   <span style="color:#A5A5A5;font-size:25px;"><i class="fa fa-mobile" aria-hidden="true"></i></span>&nbsp;&nbsp;<span style=" font-size:25px; color:#ED2553;"><?php echo $row['fld_mob']?></span><br><br>
   <span style="color:#A5A5A5;font-size:25px;"><i class="fas fa-at"></i></span>&nbsp;&nbsp;<span style=" font-size:25px; color:#ED2553;"><?php echo $row['fld_email']?></span><br><br>


   
   </div>
   
   <div class="col-sm-1"></div>
</div>
</div>

<!--footer primary-->
	     <?php
		 include("footer.php");
		 ?>
</body>

</html>