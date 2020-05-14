<?php
session_start();
include("connection.php");
extract($_REQUEST);
  if(isset($login))
  {
	$sql=mysqli_query($con,"select * from tbadmin where fld_username='$username' && fld_password='$pswd' ");
    if(mysqli_num_rows($sql))
	{
        $_SESSION['admin']=$username;
	header('location:dashboard.php');
	}
	else
	{
	$admin_login_error="Invalid Username or Password";	
	}
  }
?>
<html>

<head>
     <title>Admin Login</title>
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
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="index.php"><span style="color:green;font-family: 'Permanent Marker', cursive;">Dr!ve FoodSetGo</span></a>    
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
      </ul>
    </div>
</nav>
<br><br><br><br><br><br>
<div class="middle" style="  padding:40px; border:1px solid #ED2553; margin:0px auto; width:400px;">
       <ul class="nav nav-tabs nabbar_inverse" id="myTab" style="background:#ED2553;border-radius:10px 10px 10px 10px;" role="tablist">
          <li class="nav-item">
             <a class="nav-link active" id="home-tab" data-toggle="tab" href="#" role="tab" aria-controls="home" aria-selected="true">Home</a>
          </li>
         
              <a class="nav-link" id="profile-tab" style="color:white;"    aria-controls="profile" aria-selected="false">Welcome Admin</a>
       </ul>
	   <br><br>
	   <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab">
			    <div class="footer" style="color:red;"><?php if(isset($loginmsg)){ echo $loginmsg;}?></div>
			  <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Username:</label>
                      <input type="text" class="form-control" name="username" id="email" required/>
                    </div>
                   <div class="form-group">
                      <label>Password:</label>
                     <input type="password" name="pswd" class="form-control" id="pwd" required/>
                   </div>
 
                  <button type="submit" name="login" style="background:#ED2553; border:1px solid #ED2553;" class="btn btn-primary">Login</button>
                  <div class="footer" style="color:red;"><?php if(isset($admin_login_error)) { echo $admin_login_error; }?></div>
                  <div class="footer" style="color:green;"><?php if(isset($_SESSION['pas_update_success'])) { echo $_SESSION['pas_update_success']; }?></div>
			 </form>
			</div>
      </div>
	  </div>
	   <br><br><br><br><br><br><br>
	    <?php
			include("footer.php");
			?>
</body>
</html>
