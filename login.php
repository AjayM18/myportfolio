<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			$alert = "<script>alert('wrong username or password!');</script>";
			echo $alert;
		}else
		{
			echo $alert;
		}
	}

?>
<!DOCTYPE html>
<html> 
<head>
<title>AA. Login to your Account</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="signup.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<style>
	.main-container{
		background-color: grey;
		height: 500px;
		width: 500px;
		margin: auto;
		position: relative;
		top: 90px;

	}
	.input-items{
		margin: 0px;
		padding: 75px;
		/* border: 2px solid red; */
	}
	form{
		display: flex;
		flex-direction: column;
	}
	form input{
		padding: 10px;
		border: none;
		margin: 10px 0px;
	}
	.copyright{
		padding: 10px;
	}
</style>
</head>
<body>
	<!-- main -->
	<div class="main-container">
			<div class="input-items">
				<form action="#" method="post">
					<div style="font-size: 20px; padding: 20px 0px;">Login</div>
					<input type="text" name="user_name" placeholder="username">
					<input type="password" name="password" placeholder="password">
					<input type="submit" name="login" value="Login">
				</form>
				<p>Don't have an Account? <a href="signup.php">Signup</a></p>
			</div>
		<!-- copyright -->
		<!-- <div class="copyright">
			<p>© 2022 AA. Signup Form. All rights reserved | Design by <a href="#" target="_blank">Mummadi Ajay</a></p>
		</div> -->
</body>
</html>