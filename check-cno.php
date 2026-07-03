<?php
include('inc/config.php');
$cno= $_GET['cno'];   
    $qs="select * from signup where cno='$cno'";
	$data=mysqli_query($con,$qs)or die(mysqli_error($con));
	if(mysqli_num_rows($data)>0)
    {
		echo "already exist";
	}
	else
	{
		echo "Ok";
    }
?>