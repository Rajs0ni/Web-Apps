<?php 
					
					$conn = mysqli_connect("localhost","root","root","toDoList");
					$current_date = date("Y-m-d");
					$cd = strtotime($current_date);
					$query = "SELECT * FROM toDoTable";

					echo "<thead><tr><th>No.</th><th>Title</th><th>Task</th><th>Date</th><th>Completion Date</th><th>Action</th></tr></thead>";

					$result = mysqli_query($conn,$query);
					$i = 1;
					$flag=0;
					if(mysqli_num_rows($result)>0)
					{
						while($row = mysqli_fetch_array($result))
						{
							$d = $row['completion_date'];
							$d1 = strtotime($d);

                             if($d1 < $cd)
                             {

								echo "<tr><td>$i</td><td>".$row['title']."</td><td>".$row['task']."</td><td>".$row['date_created']."</td><td>".$row['completion_date']."</td><td><input onclick='showTask(($(this).parent()).parent().html())' class='view' type='submit' value='View'><img onclick='showTask(($(this).parent()).parent().html())' src='eye.png' style='width:16px;height:11px; position:relative; left:-22px;top:0px; cursor:pointer;'><input onclick='deleteTask(($(this).parent()).parent().html())' class='delete' type='submit' value='Trash'><img onclick='deleteTask(($(this).parent()).parent().html())' src='trash.png' style='width:15px;height:17px; position:relative; left:-22px;top:2px; cursor:pointer;'></td></tr>";
								$flag++;
							
							}
						$i++;
						}
					}
					if($flag == 0)
						echo "<tr><td colspan='6'>Task Not Found.</td><tr>";
					
?>