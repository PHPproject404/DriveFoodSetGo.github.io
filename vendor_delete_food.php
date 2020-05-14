<?php 
session_start();
include('connection.php');
 $idd=$_GET['food_id'];
if(isset($_SESSION['id']))
{
$q=mysqli_query($con,"select tblvendor.fld_name,tbfood.fldimage, tblvendor.fldvendor_id, tblvendor.fld_email from tblvendor inner join tbfood on tblvendor.fldvendor_id=tbfood.fldvendor_id where tbfood.food_id='$idd'");
$res=mysqli_fetch_assoc($q);
$e=$res['fld_email'];
$img=$res['fldimage'];

unlink("image/restaurant/$e/foodimages/$img");
if(mysqli_query($con,"delete  from  tbfood where food_id='$idd' "))
{
    header("location:food.php");
}
else
{
	echo "failed to delete";
}
}
else
{
	header("location:vendor_login.php");
}
?>
