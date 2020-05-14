<?php
session_start();
include("connection.php");
?>
<html>
  <head>
     <title>Home</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     
	 <style>
	 .carousel-item {
  height: 100vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
	 }
  body{
     background-image:url("img/main_spice2.jpg");
	 background-repeat: no-repeat;
	 background-attachment: fixed;
      background-position: center;} 
	 </style>
<style>
ul li {list-style:none;}
ul li a{color:black; font-weight:bold;}
 ul li a:hover{color:black;text-decoration:none;}
</style>     
  </head>
  
    
	<body>	
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  
    <a class="navbar-brand" href="index.php"><span style="color:green;font-family: 'Permanent Marker', cursive;">Dr!ve FoodSetGo</span></a>
    <?php
	if(!empty($cust_id))
	{
	?>
	<a class="navbar-brand" style="color:black; text-decoratio:none;"><i class="far fa-user"><?php if(isset($cust_id)) { echo $qqr['fld_name']; }?></i></a>
	<?php
	}
	?>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
	
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home
                
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
		<li class="nav-item">
		  <form method="post">
          <?php
			if(empty($cust_id))
			{
			?>
			<a href="form/index.php"><span style="color:red; font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:red;" id="cart"  class="badge badge-light">0</span></i></span></a>
			<a href="form/index.php"><b> <span class="btn btn-outline-danger my-2 my-sm-0" name="login">Log In</span></b></a>&nbsp;&nbsp;&nbsp;
            <?php
			}
			else
			{
			?>
			<a href="form/cart.php"><span style=" color:green; font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:green;" id="cart"  class="badge badge-light"><?php if(isset($re)) { echo $re; }?></span></i></span></a>
			<button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Log Out</button>&nbsp;&nbsp;&nbsp;
			<?php
			}
			?>
			</form>
        </li>
		<li class="nav-item">
		</li>
      </ul>
    </div>
</nav>
<br><br><br><br>
        &nbsp;&nbsp;&nbsp;
<div class="container-fluid" style="background:black; opacity:0.30;">
<h1 style="color:white; text-align:center; text-transform:uppercase;">we do this by</h1>
<h3 style="color:white; text-align:center; text-transform:uppercase;">Helping people discover great places around them.</h3>
<p style="color:white; text-align:center; font-size:25px;">Our team gathers information from every restaurant on a regular basis to ensure our data is fresh. Our vast community of food lovers share their reviews and photos, so you have all that you need to make an informed choice.</p>

<h3 style="color:white; text-align:center; text-transform:uppercase;">Building amazing experiences around dining.</h3>
<p style="color:white; text-align:center; font-size:25px;">Starting with information for over 1 million restaurants (and counting) globally, we're making dining smoother and more enjoyable with services like online ordering and table reservations.</p>

<h3 style="color:white; text-align:center; text-transform:uppercase;">Enabling restaurants to create amazing experiences.</h3>
<p style="color:white; text-align:center; font-size:25px;">With dedicated engagement and management tools, we're enabling restaurants to spend more time focusing on food itself, which translates directly to better dining experiences.</p>
</div>
<br><br>
 <?php
			include("footer.php");
			?>
	</body>
</html>