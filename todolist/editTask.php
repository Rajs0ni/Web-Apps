<?php

	$oldTitle = $_POST['oldTitle'];
	$newTitle = $_POST['newTitle'];
	$newTask = $_POST['newTask'];
	$newCompDate = $_POST['newCompDate'];
	$newCompDate = date($newCompDate);
	$conn = mysqli_connect("localhost","root","root","toDoList");

	if (isset($oldTitle) &&(isset($newTitle) || isset($newTask) || isset($newCompDate))) 
	{
		$query = "UPDATE toDoTable SET title = '$newTitle', task = '$newTask', completion_date = '$newCompDate'WHERE title = '$oldTitle' ";
		if(mysqli_query($conn,$query))
			echo "";
		else
			echo "Can't change";
	}
	else
	{
		echo "No changes are made";
	}


?>