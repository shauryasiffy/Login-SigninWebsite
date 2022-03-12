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
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>

<body>

<h1 style="color: black; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Welcome to Our Login Page</h1>

	<style type="text/css">

	#text{

		height: 25px;
		background: pink;
		border-radius: 5px;
		padding: 4px;
		border: solid thin;
		width: 100%;
        border-radius: 50px;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
        border-radius: 50px;
        align-content: center;
	}

	#box{

		background-color: rgb(191, 191, 226);
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: black; font-family:Verdana, Geneva, Tahoma, sans-serif;">LOGIN</div>
			<div style="font-size: 15px;margin: 10px;color: rgb(0, 0, 0); font-family: Verdana, Geneva, Tahoma, sans-serif;">If you haven't signed up yet, you need to sign in first</div>
			

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="LOGIN"; style="background-color: black;font-family: Verdana, Geneva, Tahoma, sans-serif;"><br><br>

			<a href="signup.php"; style="font-family: Verdana, Geneva, Tahoma, sans-serif; color: rgb(24, 49, 20);">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>