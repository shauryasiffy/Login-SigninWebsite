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

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>
    <h1 style="color: black; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">SignUp here</h1>

	<style type="text/css">
	
	#text{
        background-color: rgb(0, 0, 0);
		height: 25px;
		padding: 4px;
		border: solid thin;
		width: 100%;
        border-radius: 50px;
        color: white;

	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: rgba(36, 24, 24, 0.424);
		border: none;
        border-radius: 50px;
	}

	#box{

		background-color: rgb(206, 112, 112);
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: rgb(0, 0, 0); font-family: Verdana, Geneva, Tahoma, sans-serif;">SIGNUP</div>
			<div style="font-size: 15px;margin: 10px;color: rgb(0, 0, 0); font-family: Verdana, Geneva, Tahoma, sans-serif;">After signing up, you will be redirected to LogIn page</div>
			

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="SIGNUP"><br><br>

			<a href="login.php"; style="font-family: Verdana, Geneva, Tahoma, sans-serif; color: rgb(0, 0, 0);">Click to LogIn</a><br><br>
		</form>
	</div>
</body>
</html>