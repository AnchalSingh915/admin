<?php
include('inc/config.php');
$email= $_GET['email'];   
    $qs="select * from signup where email='$email'";
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