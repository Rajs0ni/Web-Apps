<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="logformstyle.css">
	<script src="loginJS.js"></script>
</head>
<body>
		<div class="box">
			<h2>Login</h2>
			<form method="POST" name="loginForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  >
				<div class="inputBox">
					<input type="text" name="username" required=""></input>
					<label>Username</label>
					<div id="user_error"></div>
				</div>
				<div class="inputBox">
					<input type="password" name="password" required=""></input>
					<label>Password</label>
					<div id="pass_error"></div>
				</div>
				<input type="submit" name="login" id="btn" value="Login" onclick="return validateLogin()">
			</form>
		</div>
</body>
</html>

<?php

    function dataMining($data) 
	{
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	$username = dataMining($_POST['username']);
    	$password = dataMining($_POST['password']);
    }

    $conn = mysqli_connect("localhost","root","root","formData");

    if(!$conn)
    	die("Database connectivty interrupted: ".mysqli_connect_error());
    else
    {
    	$query = "SELECT * FROM formInfo WHERE username = '$username' && password = '$password'";
    	$result = mysqli_query($conn,$query);

    	if(mysqli_num_rows($result) == 1)
    	{
    		$data = mysqli_fetch_array($result);
    		echo "Welcome ".$data['fullname'].", You have logged in";
    		mysqli_close($conn);
    	}
    	else
    		if(isset($_POST['login']))
    		echo "Log in failed";
    }

?>
