<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Shaurya's Website</title>
</head>
<body>
    <style>
        
    #button{

        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
        border: none;
        border-radius: 50px;
    }
    </style>

	<a id="button" href="logout.php"; style="font-family: Verdana, Geneva, Tahoma, sans-serif; background-color: red;color: black;font-weight: 1000;">LOG OUT</a>

    <h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif;">Welcome</h1>

	<br>
	It's Nice to see you here, <?php echo $user_data['user_name']; ?>
</body>
</html>