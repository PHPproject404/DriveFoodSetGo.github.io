<?php
include("../connection.php");

if($id=$_GET['id'])
	
	{
		if(mysqli_query($con,"update tblorder set fldstatus='Cancelled' where fld_order_id='$id'"))
		{
			 header("location:cart.php");
		}
	}


?>
