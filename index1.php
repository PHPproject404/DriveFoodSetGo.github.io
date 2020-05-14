<?php
session_start();
include("connection.php");
?>
<html>
  <head>
     <title>Home Page</title>
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
<div id="result" style="position:fixed;top:300; right:500;z-index: 3000;width:350px;background:white;"></div>
<div id="resulthotel" style=" margin:0px auto; position:fixed; top:150px;right:750px; background:white;  z-index: 3000;"></div>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  
    <a class="navbar-brand" href="index.php"><span style="color:green;font-family: 'Permanent Marker', cursive;">Dr!ve FoodSetGo</span></a>
    <?php
	if(!empty($cust_id))
	{
	?>
	<a class="navbar-brand" style="color:black; text-decoratio:none;"><i class="far fa-user"><?php echo $cresult['fld_name']; ?></i></a>
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
			<?php
			}
			?>
			</form>
        </li>
      </ul>
    </div>
</nav>
<br><br><br><br>
        
<div class="img-container">
<img src="img/istockphoto-516324258-612x612.jpg" height="300px" width="550px" align="middle">
</div>
    <br>
        <div class="container">
	       <p style="font-family: 'Lobster', cursive; font-weight:light;  font-size:25px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>
<br> 
<div class="img-container">    
<img src="img/pastaveg_640x480.jpg" height="300px" width="550px">
</div>
    <br>
        <div class="container">
            <p style="font-family: 'Lobster', cursive; font-weight:light; font-size:25px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
<br>
        
        
		    <?php
			include("footer.php");
			?>
	</body>
</html>