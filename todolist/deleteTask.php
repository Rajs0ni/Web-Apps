<?php
		$title = $_POST['title'];

		$conn = mysqli_connect("localhost","root","root","toDoList");
		$query = "DELETE FROM toDoTable WHERE title ='$title' LIMIT 1";

		if(mysqli_query($conn,$query))
			echo "Record deleted successfully";	
		else
			echo "Cannot delete";
?>