<?php
include('inc/config.php');
if(isset($_POST['signup']))
{
	extract($_POST);
	
	$qs="select * from signup where email='$email' or cno='$cno'";
	$data=mysqli_query($con,$qs)or die(mysqli_error($con));
	if(mysqli_num_rows($data)>0)
    {
		echo "already exist";
	}
	else
	{
		$qs="insert into signup(name,email,cno)values('$name','$email','$cno')";
		mysqli_query($con,$qs) or die(mysqli_error($con));
    }
}

	
		
?>


<!doctype html>
<html>
	<head>
		<title>
			signup
		</title>
		<style>
			 body{
				background-size:cover;
				background-repeat:no-repeat;
				background-attachment:fixed;
			}

			.box{ 
			  height:180px;
			  width:300px;
              color:white;
			  margin:auto;
			  margin-top:150px;
			  padding:20px;
			  border-radius:20px 0px 20px 0px;
			  background-color:darkblue;
			  box-shadow:10px 10px 10px white;
			}
			th{
				font-size:35px;
			}
			td{
				font-size:20px;
			}
			#login input{
				height:35px;
				width:130px;
				font-size:25px;
			}
			#login{
				height:70px;
			}
		</style>
		<script>
			function check(data)
			{
				var req = new XMLHttpRequest();
				req.open("GET","check-email.php?email=" + data, true);
				req.send();
				
				req.onreadystatechange = function()
				{
					if(this.readyState ==4 && this.status == 200)
					{
						document.getElementById("s1").innerHTML = this.responseText;
					}
				};
			}
			function check1(data)
			{
				var req = new XMLHttpRequest();
				req.open("GET","check-cno.php?cno=" + data, true);
				req.send();
				
				req.onreadystatechange = function()
				{
					if(this.readyState ==4 && this.status == 200)
					{
						document.getElementById("s2").innerHTML = this.responseText;
					}
				};
			}
		</script>
	</head>
	<body>
	  <div class="box">
		<form method="post">
			<table>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name"/></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="email" name="email" onblur="check(this.value)"/><span id="s1"></span></td>
				</tr>
				<tr>
					<td>Contact no.</td>
					<td><input type="numeric" max="10" name="cno" onblur="check1(this.value)"/><span id="s2"></span></td>
				</tr>
				<tr>
					<td></td>
					<td id="login"><input type="submit" name="signup" value="signup"></td>
				</tr>
			</table>
		</form>
	  </div>
	</body>
</html>