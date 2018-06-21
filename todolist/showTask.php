<?php

	$title = $_POST['title'];

	$conn = mysqli_connect("localhost","root","root","toDoList");
	$query = "SELECT * FROM toDoTable WHERE title ='$title' LIMIT 1";

	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0)
	{
		$row  = mysqli_fetch_array($result);
		echo '<input type=submit id="OK" onclick="closeBox()" value="OK"><input type=submit id="edit_button" onclick="editTask()" value="EDIT">
		 <label class="label">Title:</label><input class="input" type=text name="title" value="' . $row['title'] . '" id="title" placeholder="Add Title">
		 <label class="label">Task:</label><textarea id="tsk" class="input" name="task" id="task" placeholder="Add Task">'.$row['task'].'</textarea>
		 <label class="label">Date Created:</label><input class="input" type=text name="date1" value="' . $row['date_created'] . '" id="date1">
		 <label class="label">Completion Date:</label><input class="input" type=text name="date2" value="' . $row['completion_date'] . '" id="date2" placeholder="YYYY-MM-DD"><input type=submit id="save_changes" value="SAVE">';
	}
?>
