<?php
session_start();
include("connection.php");
?>
<html>
  <head>
     <title>Contact-us</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<style>
ul li {list-style:none;}
ul li a{color:black; font-weight:bold;}
 ul li a:hover{color:black;text-decoration:none;}
</style> 
  </head>
<body>
<div id="result" style="position:fixed;top:100; right:50;z-index: 3000;width:350px;background:white;"></div>
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
			
			&nbsp;&nbsp;&nbsp;
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
		
      </ul>
	  
    </div>
	
</nav>
<br><br><br><br>
<div class="container-fluid">
  <img src="img/contact.bmp" width="100%">
</div>
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-8" style="padding:20px; border:1px solid #F0F0F0;">
	    <form method="post">
            <div class="form-group">
                 <input type="text" class="form-control"  placeholder="Name*" name="name" required/>
            </div>
			<div class="form-group">
                 <input type="email" class="form-control"  placeholder="Email*" value="<?php if(isset($cust_id)) echo $cust_id; ?>" name="email" required/>
            </div>
			<div class="form-group">
                 <input type="tel" class="form-control"  name="phone" placeholder="Phone(optinal)"/>
            </div>
			<div class="form-group">
                <textarea class="form-control"    placeholder="Message*" name="msgtxt" rows="3" col="10" required></textarea>
            </div>
			<div class="form-group">
                   <button type="submit" name="message" class="btn btn-danger">Send Message</button>
            </div>
        </form>
	</div>
    <div class="col-sm-4" style="padding:30px;">
	   <div class="form-group">
           <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;0998-651-9765<br><br>
           <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;305-0668<br><br>           
           <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Facebook.com/Dr!ve FoodSetGo<br><br>
			<i class="fa fa-home" aria-hidden="true"></i>&nbsp; Robinsons Ground Floor Santiago Branch<br>
	       
	   </div>
	</div>
  </div>
</div>
<br><br>
  <?php
			include("footer.php");
			?>
	</body>
</html>