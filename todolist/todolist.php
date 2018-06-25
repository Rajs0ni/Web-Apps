<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ToDo List</title>
	<link rel="stylesheet" type="text/css" href="todostyle.css">	
</head>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="todolist.js"></script>

	<div class="container">
	   <div class="header">
		<img src="todoIcon.png" style="cursor :pointer;width: 35px;height:35px;left:8px;top: 12px;float: left; position: relative;" onclick='document.location.reload(true)'>
			<h2>Todo List Application</h2>
		</div><!--end of header-->
		<div class="box" style="position:fixed;">
			<form>
				<img src="menu.png" id="menu"  title="Menu Button">
				<input id="inp1" type="text" placeholder="Quick Find...." onkeyup="searchText(this.value)"><img src="search.png" style="opacity:0.7;width: 28px;height: 28px; position:absolute; left: 82.9%; top: 24%; border-left: .5px solid lightgrey;">
				<input id="btn1" type="submit" name="add" title="Add Task" value="+">
				<input id="btn2" type="submit" name="clear" title="Clear All Task" value="clear" onclick="deleteAllTask()">
			</form>
		</div><!--end of box-->

		<table id="taskTable">
				<!--Ajax response will be injected here-->
		</table>

		<div id="menubar">
			<a href="#" onclick="showCompletedTask()">Completed Task</a><br/><a href="#" onclick="showPendingTask()">Pending Task</a><br/><a href="#" onclick="showProcessingTask()">In Process Task</a><br/><a href="#" onclick="printTask()">All Task</a><br/>
		</div>
	
	</div><!--end of container-->
	
	<div class="modal" id="myModal">
		 <div class="modal-content">
			   <form id="todoform" name="titleForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
				   <input type="submit" name="save" id="save" value="save">
				   <button name="" id="cancel" >cancel</button>
				   <input type="text" name="title" placeholder="Add Title" id="title">
				   <textarea name="task" placeholder="Add Task" id="task"></textarea>
				   <input  type="date" name="date" id="date">
			   </form>
		 </div>
	</div><!--end of modal/popUp Box-->

	<div class="modal1" id="displayBox"> 
		 <div class="modal-content1" id="display">
		 <!--used to display task detail on click of view button-->
		 </div>
	</div>
</body>
</html>


<?php
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
			if(isset($_POST['save']))
			{
				if(strlen($_POST['title'])!=0 || strlen($_POST['task'])!=0 ||strlen($_POST['date'])!=0)
				{
					$title =$_POST['title'];
					$task = $_POST['task'];
					$date = $_POST['date'];
					
					$d = date('d-m-Y');

					$conn = mysqli_connect("localhost","root","root","toDoList");

					if(!$conn)
						die("Database connectivity interrupted: ".mysqli_connect_error());
					else
						if(isset($title) && isset($task) && isset($date))
						{
							$query = "INSERT INTO toDoTable(title,task,date_created,completion_date) VALUES ('$title','$task','$d','$date')";
								mysqli_query($conn,$query);
						}	
					}
						
			}
	}
			
?>
