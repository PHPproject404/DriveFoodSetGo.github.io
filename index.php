<?php
session_start();
include("connection.php");
extract($_REQUEST);
$arr=array();
if(isset($_GET['msg']))
{
	$loginmsg=$_GET['msg'];
}
else
{
	$loginmsg="";
}
if(isset($_SESSION['cust_id']))
{
	 $cust_id=$_SESSION['cust_id'];
	 $cquery=mysqli_query($con,"select * from tblcustomer where fld_email='$cust_id'");
	 $cresult=mysqli_fetch_array($cquery);
}
else
{
	$cust_id="";
}
$query=mysqli_query($con,"select  tblvendor.fld_name,tblvendor.fldvendor_id,tblvendor.fld_email,
tblvendor.fld_mob,tblvendor.fld_address,tblvendor.fld_logo,tbfood.food_id,tbfood.foodname,tbfood.cost,
tbfood.cuisines,tbfood.paymentmode 
from tblvendor inner join tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id;");
while($row=mysqli_fetch_array($query))
{
	$arr[]=$row['food_id'];
	shuffle($arr);
}
 if(isset($addtocart))
 {
	 
	if(!empty($_SESSION['cust_id']))
	{
		 
		header("location:form/cart.php?product=$addtocart");
	}
	else
	{
		header("location:form/?product=$addtocart");
	}
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
 $query=mysqli_query($con,"select tbfood.foodname,tbfood.fldvendor_id,tbfood.cost,tbfood.cuisines,tbfood.fldimage,tblcart.fld_cart_id,tblcart.fld_product_id,tblcart.fld_customer_id 
 from tbfood 
 inner  join tblcart 
 on tbfood.food_id=tblcart.fld_product_id 
 where tblcart.fld_customer_id='$cust_id'");
  $re=mysqli_num_rows($query);
?>
<html>
  <head>
     <title>Shopping Cart</title>
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
			<a href="form/index.php?"><span style="color:red; font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:red;" id="cart"  class="badge badge-light">0</span></i></span></a>
			
			&nbsp;&nbsp;&nbsp;
			<button class="btn btn-outline-danger my-2 my-sm-0" name="login" type="submit">Log In</button>&nbsp;&nbsp;&nbsp;
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
<br><br><br><br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6">
	<div class="container-fluid">
	 <img src="img/istockphoto-516324258-612x612.jpg" height="300px" width="100%">
	</div>
	 <div class="container">
	 <p style="font-family: 'Lobster', cursive; font-weight:light;  font-size:25px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
	 </div>
	</div>
    <div class="col-sm-6">
	<div class="container-fluid rounded" style="border:solid 1px #F0F0F0;">
	<?php    
	   $food_id=$arr[0];
	  $query=mysqli_query($con,"select tblvendor.fld_email,tblvendor.fld_name,tblvendor.fld_mob,
	  tblvendor.fld_tin,tblvendor.fld_address,tblvendor.fldvendor_id,tblvendor.fld_logo,tbfood.food_id,tbfood.foodname,tbfood.cost,
	  tbfood.cuisines,tbfood.paymentmode,tbfood.fldimage from tblvendor inner join
	  tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id where tbfood.food_id='$food_id'");        
	  while($res=mysqli_fetch_assoc($query))
	  {
		   $hotel_logo= "image/restaurant/".$res['fld_email']."/".$res['fld_logo'];
		   $food_pic= "image/restaurant/".$res['fld_email']."/foodimages/".$res['fldimage'];
	  ?>
	  <div class="container-fluid">
	     <div class="row" style="padding:10px; ">
		      <div class="col-sm-2"><img src="<?php echo $hotel_logo; ?>" class="rounded-circle" height="50px" width="50px" alt="Cinque Terre"></div>
		      <div class="col-sm-5">
		                     <a href="search.php?vendor_id=<?php echo $res['fldvendor_id']; ?>"><span style="font-family: 'Miriam Libre', sans-serif; font-size:28px;color:#CB202D;">
		 <?php echo $res['fld_name']; ?></span></a>
        </div>
		 <div class="col-sm-3"><i  style="font-size:20px;" class="fas fa-dollar-sign"></i>&nbsp;<span style="color:green; font-size:25px;"><?php echo $res['cost']; ?></span></div>
		 <form method="post">
		 <div class="col-sm-2" style="text-align:left;padding:10px; font-size:25px;"><button type="submit" name="addtocart" value="<?php echo $res['food_id'];?>") ><span style="color:green;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></button></div>
             </form>
		 </div>
	  </div>
	  <div class="container-fluid">
	  <div class="row" style="padding:10px;padding-top:0px;padding-right:0px; padding-left:0px;">
		 <div class="col-sm-12"><img src="<?php echo $food_pic; ?>" class="rounded" height="250px" width="100%" alt="Cinque Terre"></div>
		 </div>
	  </div>
	  <div class="container-fluid">
	     <div class="row" style="padding:10px; ">
		 <div class="col-sm-6">
		 <span><li><?php echo $res['cuisines']; ?></li></span>
		 <span><li><?php echo $res['cost']; ?>&nbsp;</li></span>
		 </div>
		 <div class="col-sm-6" style="padding:20px;">
		 <h3><?php echo"(" .$res['foodname'].")"?></h3>
		 </div>
		 </div>
	  </div>
	<?php
	  }
	?>
	</div>
	</div>
  </div>
</div>
<div class="container-fluid">
     <div class="row">
          <div class="col-sm-6">
	            <div class="container-fluid rounded" style="border:solid 1px #F0F0F0;">
	                  <?php
	                        $food_id=$arr[1];
	                        $query=mysqli_query($con,"select tblvendor.fld_email,tblvendor.fld_name,tblvendor.fld_mob,	                        tblvendor.fld_tin,tblvendor.fld_address,tblvendor.fld_logo,tbfood.food_id,tbfood.foodname,tbfood.cost,
	                        tbfood.cuisines,tbfood.paymentmode,tbfood.fldimage from tblvendor inner join
	                        tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id where tbfood.food_id='$food_id'");
	                             while($res=mysqli_fetch_assoc($query))
	                                  {
		                                 $hotel_logo= "image/restaurant/".$res['fld_email']."/".$res['fld_logo'];
		                                 $food_pic= "image/restaurant/".$res['fld_email']."/foodimages/".$res['fldimage'];
	                                   ?>
	                                      <div class="container-fluid">
	                                          <div class="container-fluid">
	                                               <div class="row" style="padding:10px; ">
		                            <div class="col-sm-2"><img src="<?php echo $hotel_logo; ?>" class="rounded-circle" height="50px" width="50px" alt="Image"></div>
		                                               <div class="col-sm-5">
		                            <span style="font-family: 'Miriam Libre', sans-serif; font-size:28px;color:#CB202D;"><?php echo $res['fld_name']; ?></span>
                                                       </div>
		                            <div class="col-sm-3"><i  style="font-size:20px;" class="fas fa-dollar-sign"></i>&nbsp;<span style="color:green; font-size:25px;"><?php echo $res['cost']; ?></span></div>
									                   <form method="post">
		                         <div class="col-sm-2" style="text-align:left;padding:10px; font-size:25px;"><button type="submit"  name="addtocart" value="<?php echo $res['food_id'];?>"><span style="color:green;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></button></div>
		                                               </form>
													</div>
		 
	                                           </div>
	                                           <div class="container-fluid">
	                                                <div class="row" style="padding:10px;padding-top:0px;padding-right:0px; padding-left:0px;">
		                           <div class="col-sm-12"><img src="<?php echo $food_pic; ?>" class="rounded" height="250px" width="100%" alt="Image"></div>
		 		                                    </div>
	                                            </div>
	                                            <div class="container-fluid">
	                                                 <div class="row" style="padding:10px; ">
		                                                 <div class="col-sm-6">
		                              <span><li><?php echo $res['cuisines']; ?></li></span>
		                             <span><li><?php echo $res['cost']; ?>&nbsp;</li></span>
		                                                 </div>
		                            <div class="col-sm-6" style="padding:20px;"><h3><?php echo"(" .$res['foodname'].")"?></h3></div>
		                                               </div>
	                                             </div>
	                                   <?php
	                                     }
	                                    ?>
	                                        </div>
		        </div> 
	   </div>         
	   <div class="col-sm-6">
	        <div class="container-fluid">
	             <img src="img/pastaveg_640x480.jpg" height="300px" width="100%">
	        </div>
	        <div class="container">
	             <p style="font-family: 'Lobster', cursive; font-weight:light; font-size:25px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
	        </div>
	  </div>  
          <div class="col-sm-6">
	            <div class="container-fluid rounded" style="border:solid 1px #F0F0F0;">
	                  <?php
	                        $food_id=$arr[2];
	                        $query=mysqli_query($con,"select tblvendor.fld_email,tblvendor.fld_name,tblvendor.fld_mob,	                        tblvendor.fld_tin,tblvendor.fld_address,tblvendor.fld_logo,tbfood.food_id,tbfood.foodname,tbfood.cost,
	                        tbfood.cuisines,tbfood.paymentmode,tbfood.fldimage from tblvendor inner join
	                        tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id where tbfood.food_id='$food_id'");
	                             while($res=mysqli_fetch_assoc($query))
	                                  {
		                                 $hotel_logo= "image/restaurant/".$res['fld_email']."/".$res['fld_logo'];
		                                 $food_pic= "image/restaurant/".$res['fld_email']."/foodimages/".$res['fldimage'];
	                                   ?>
	                                      <div class="container-fluid">
	                                          <div class="container-fluid">
	                                               <div class="row" style="padding:10px; ">
		                            <div class="col-sm-2"><img src="<?php echo $hotel_logo; ?>" class="rounded-circle" height="50px" width="50px" alt="Image"></div>
		                                               <div class="col-sm-5">
		                            <span style="font-family: 'Miriam Libre', sans-serif; font-size:28px;color:#CB202D;"><?php echo $res['fld_name']; ?></span>
                                                       </div>
		                            <div class="col-sm-3"><i  style="font-size:20px;" class="fas fa-dollar-sign"></i>&nbsp;<span style="color:green; font-size:25px;"><?php echo $res['cost']; ?></span></div>
									                   <form method="post">
		                         <div class="col-sm-2" style="text-align:left;padding:10px; font-size:25px;"><button type="submit"  name="addtocart" value="<?php echo $res['food_id'];?>"><span style="color:green;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></button></div>
		                                               </form>
													</div>
		 
	                                           </div>
	                                           <div class="container-fluid">
	                                                <div class="row" style="padding:10px;padding-top:0px;padding-right:0px; padding-left:0px;">
		                           <div class="col-sm-12"><img src="<?php echo $food_pic; ?>" class="rounded" height="250px" width="100%" alt="Image"></div>
		 		                                    </div>
	                                            </div>
	                                            <div class="container-fluid">
	                                                 <div class="row" style="padding:10px; ">
		                                                 <div class="col-sm-6">
		                              <span><li><?php echo $res['cuisines']; ?></li></span>
		                             <span><li><?php echo $res['cost']; ?>&nbsp;</li></span>
		                                                 </div>
		                            <div class="col-sm-6" style="padding:20px;"><h3><?php echo"(" .$res['foodname'].")"?></h3></div>
		                                               </div>
	                                             </div>
	                                   <?php
	                                     }
	                                    ?>
	                                        </div>
		        </div> 
	   </div>
          <div class="col-sm-6">
	            <div class="container-fluid rounded" style="border:solid 1px #F0F0F0;">
	                  <?php
	                        $food_id=$arr[3];
	                        $query=mysqli_query($con,"select tblvendor.fld_email,tblvendor.fld_name,tblvendor.fld_mob,	                        tblvendor.fld_tin,tblvendor.fld_address,tblvendor.fld_logo,tbfood.food_id,tbfood.foodname,tbfood.cost,
	                        tbfood.cuisines,tbfood.paymentmode,tbfood.fldimage from tblvendor inner join
	                        tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id where tbfood.food_id='$food_id'");
	                             while($res=mysqli_fetch_assoc($query))
	                                  {
		                                 $hotel_logo= "image/restaurant/".$res['fld_email']."/".$res['fld_logo'];
		                                 $food_pic= "image/restaurant/".$res['fld_email']."/foodimages/".$res['fldimage'];
	                                   ?>
	                                      <div class="container-fluid">
	                                          <div class="container-fluid">
	                                               <div class="row" style="padding:10px; ">
		                            <div class="col-sm-2"><img src="<?php echo $hotel_logo; ?>" class="rounded-circle" height="50px" width="50px" alt="Image"></div>
		                                               <div class="col-sm-5">
		                            <span style="font-family: 'Miriam Libre', sans-serif; font-size:28px;color:#CB202D;"><?php echo $res['fld_name']; ?></span>
                                                       </div>
		                            <div class="col-sm-3"><i  style="font-size:20px;" class="fas fa-dollar-sign"></i>&nbsp;<span style="color:green; font-size:25px;"><?php echo $res['cost']; ?></span></div>
									                   <form method="post">
		                         <div class="col-sm-2" style="text-align:left;padding:10px; font-size:25px;"><button type="submit"  name="addtocart" value="<?php echo $res['food_id'];?>"><span style="color:green;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></button></div>
		                                               </form>
													</div>
		 
	                                           </div>
	                                           <div class="container-fluid">
	                                                <div class="row" style="padding:10px;padding-top:0px;padding-right:0px; padding-left:0px;">
		                           <div class="col-sm-12"><img src="<?php echo $food_pic; ?>" class="rounded" height="250px" width="100%" alt="Image"></div>
		 		                                    </div>
	                                            </div>
	                                            <div class="container-fluid">
	                                                 <div class="row" style="padding:10px; ">
		                                                 <div class="col-sm-6">
		                              <span><li><?php echo $res['cuisines']; ?></li></span>
		                             <span><li><?php echo $res['cost']; ?>&nbsp;</li></span>
		                                                 </div>
		                            <div class="col-sm-6" style="padding:20px;"><h3><?php echo"(" .$res['foodname'].")"?></h3></div>
		                                               </div>
	                                             </div>
	                                   <?php
	                                     }
	                                    ?>
	                                        </div>
		        </div>           
         <br><br>             
	   </div>
         <div class="col-sm-6">
	            <div class="container-fluid rounded" style="border:solid 1px #F0F0F0;">
	                  <?php
	                        $food_id=$arr[4];
	                        $query=mysqli_query($con,"select tblvendor.fld_email,tblvendor.fld_name,tblvendor.fld_mob,	                        tblvendor.fld_tin,tblvendor.fld_address,tblvendor.fld_logo,tbfood.food_id,tbfood.foodname,tbfood.cost,
	                        tbfood.cuisines,tbfood.paymentmode,tbfood.fldimage from tblvendor inner join
	                        tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id where tbfood.food_id='$food_id'");
	                             while($res=mysqli_fetch_assoc($query))
	                                  {
		                                 $hotel_logo= "image/restaurant/".$res['fld_email']."/".$res['fld_logo'];
		                                 $food_pic= "image/restaurant/".$res['fld_email']."/foodimages/".$res['fldimage'];
	                                   ?>
	                                      <div class="container-fluid">
	                                          <div class="container-fluid">
	                                               <div class="row" style="padding:10px; ">
		                            <div class="col-sm-2"><img src="<?php echo $hotel_logo; ?>" class="rounded-circle" height="50px" width="50px" alt="Image"></div>
		                                               <div class="col-sm-5">
		                            <span style="font-family: 'Miriam Libre', sans-serif; font-size:28px;color:#CB202D;"><?php echo $res['fld_name']; ?></span>
                                                       </div>
		                            <div class="col-sm-3"><i  style="font-size:20px;" class="fas fa-dollar-sign"></i>&nbsp;<span style="color:green; font-size:25px;"><?php echo $res['cost']; ?></span></div>
									                   <form method="post">
		                         <div class="col-sm-2" style="text-align:left;padding:10px; font-size:25px;"><button type="submit"  name="addtocart" value="<?php echo $res['food_id'];?>"><span style="color:green;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></button></div>
		                                               </form>
													</div>
		 
	                                           </div>
	                                           <div class="container-fluid">
	                                                <div class="row" style="padding:10px;padding-top:0px;padding-right:0px; padding-left:0px;">
		                           <div class="col-sm-12"><img src="<?php echo $food_pic; ?>" class="rounded" height="250px" width="100%" alt="Image"></div>
		 		                                    </div>
	                                            </div>
	                                            <div class="container-fluid">
	                                                 <div class="row" style="padding:10px; ">
		                                                 <div class="col-sm-6">
		                              <span><li><?php echo $res['cuisines']; ?></li></span>
		                             <span><li><?php echo $res['cost']; ?>&nbsp;</li></span>
		                                                 </div>
		                            <div class="col-sm-6" style="padding:20px;"><h3><?php echo"(" .$res['foodname'].")"?></h3></div>
		                                               </div>
	                                             </div>
	                                   <?php
	                                     }
	                                    ?>
	                                        </div>
		        </div> 
	   </div>
         <div class="col-sm-6">
	            <div class="container-fluid rounded" style="border:solid 1px #F0F0F0;">
	                  <?php
	                        $food_id=$arr[5];
	                        $query=mysqli_query($con,"select tblvendor.fld_email,tblvendor.fld_name,tblvendor.fld_mob,	                        tblvendor.fld_tin,tblvendor.fld_address,tblvendor.fld_logo,tbfood.food_id,tbfood.foodname,tbfood.cost,
	                        tbfood.cuisines,tbfood.paymentmode,tbfood.fldimage from tblvendor inner join
	                        tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id where tbfood.food_id='$food_id'");
	                             while($res=mysqli_fetch_assoc($query))
	                                  {
		                                 $hotel_logo= "image/restaurant/".$res['fld_email']."/".$res['fld_logo'];
		                                 $food_pic= "image/restaurant/".$res['fld_email']."/foodimages/".$res['fldimage'];
	                                   ?>
	                                      <div class="container-fluid">
	                                          <div class="container-fluid">
	                                               <div class="row" style="padding:10px; ">
		                            <div class="col-sm-2"><img src="<?php echo $hotel_logo; ?>" class="rounded-circle" height="50px" width="50px" alt="Image"></div>
		                                               <div class="col-sm-5">
		                            <span style="font-family: 'Miriam Libre', sans-serif; font-size:28px;color:#CB202D;"><?php echo $res['fld_name']; ?></span>
                                                       </div>
		                            <div class="col-sm-3"><i  style="font-size:20px;" class="fas fa-dollar-sign"></i>&nbsp;<span style="color:green; font-size:25px;"><?php echo $res['cost']; ?></span></div>
									                   <form method="post">
		                         <div class="col-sm-2" style="text-align:left;padding:10px; font-size:25px;"><button type="submit"  name="addtocart" value="<?php echo $res['food_id'];?>"><span style="color:green;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></button></div>
		                                               </form>
													</div>
		 
	                                           </div>
	                                           <div class="container-fluid">
	                                                <div class="row" style="padding:10px;padding-top:0px;padding-right:0px; padding-left:0px;">
		                           <div class="col-sm-12"><img src="<?php echo $food_pic; ?>" class="rounded" height="250px" width="100%" alt="Image"></div>
		 		                                    </div>
	                                            </div>
	                                            <div class="container-fluid">
	                                                 <div class="row" style="padding:10px; ">
		                                                 <div class="col-sm-6">
		                              <span><li><?php echo $res['cuisines']; ?></li></span>
		                             <span><li><?php echo $res['cost']; ?>&nbsp;</li></span>
		                                                 </div>
		                            <div class="col-sm-6" style="padding:20px;"><h3><?php echo"(" .$res['foodname'].")"?></h3></div>
		                                               </div>
	                                             </div>
	                                   <?php
	                                     }
	                                    ?>
	                                        </div>
		        </div> 
	   </div>
  </div>
</div>
	     
		    <?php
			include("footer.php");
			?>
	</body>
</html>