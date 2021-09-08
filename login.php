<?php

$host="localhost";
$user="root";
$password="";
$db="user1";

session_start();

$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
{
	die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["username"];
	$password=$_POST["password"];


	$sql="select * from login where username='".$username."' AND password='".$password."' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result);

	if($row["usertype"]=="user")
	{

		$_SESSION["username"]=$username;

		header("location:userhome.php");
	}

	elseif($row["usertype"]=="admin")
	{

		$_SESSION["username"]=$username;
		
		header("location:adminhome.php");
	}

	else
	{
		echo "username or password incorrect";
	}

}




?>



<!--html-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin|userLogin</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="style.css">
		
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	</head>
<body class="body" >

<center>

	<h1 class="h1">Login Form</h1>
	<br><br><br>
	<div>
		<br><br>


		<form action="#" method="POST">

	<div>
	<label for="username">
					<i class="fas fa-user"></i>
				</label>
		<label for="">username</label>
				<input class="username" type="text" name="username" placeholder="Username" id="username" required>
	</div>
	<br><br>

	<div>
		
	<label for="password">
					<i class="fas fa-lock"></i>
				</label>
		<label>password</label>
		<input class="password" type="password" name="password" placeholder="Password" id="password" required>
	</div>
	<br><br>

	<div>
		
		<input type="submit" value="Login">
	</div>


	</form>


	<br><br>
 </div>
</center>

</body>
</html>







