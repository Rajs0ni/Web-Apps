<?php

	$username = $_GET['username'];

	$conn = mysqli_connect("localhost","root","root","formData");

	$query = "SELECT * FROM formInfo WHERE username = '$username'";

	$result = mysqli_query($conn,$query);

	if(mysqli_num_rows($result)>0)
		echo "*Already Exists,try another one";
	else
		echo "";
?>