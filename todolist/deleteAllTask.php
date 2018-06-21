<?php

				$conn = mysqli_connect("localhost","root","root","toDoList");
					$query = "DELETE FROM toDoTable";

					if(mysqli_query($conn,$query))
						echo "<thead><tr><th>No.</th><th>Title</th><th>Task</th><th>Date</th><th>Completion Date</th><th>Action</th></tr></thead>";

					
?>