<?php 
include('connection.php');
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$q=mysqli_query($con,"select tbfood.fldimage,tblvendor.fld_email from tbfood inner join tblvendor on tbfood.fldvendor_id=tbfood.fldvendor_id where food_id='$id' ");
    $res=mysqli_fetch_assoc($q);
    $e=$res['fld_email'];
    $img=$res['fldimage'];
	unlink("image/restaurant/$e/foodimages/$img");
	if(mysqli_query($con,"delete  from  tbfood where food_id='$id' "))
     {
       header("location:dashboard.php?id=$delete");
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

if(mysqli_query($con,"delete  from  tbfood where food_id='$id' "))
{

    header("location:dashboard.php?id=$delete");
}
else
{
	echo "failed to delete";
}
?>
