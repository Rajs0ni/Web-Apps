
$(document).ready(function()
	{	
		printTask(); 

		$("#menu").click(function()
			{
				$("#menubar").toggle(550,function()
				{
					$("#menubar").animate({width:"100%"},"fast");
					
				});
			});

		$("#save").on('click',function()	//will validate before save
			{
			
				var title = $("#title").val();
				var task = $("#task").val();
				var date = $("#date").val();
				var today =	getCurrentDate();

				if(title.length == 0 && task.length == 0 && date.length == 0)
				  {
					$('.modal').hide();
					alert("No content to save. Task discarded");
					return false;
				  }
				else if(title.length == 0)
				{
					alert("Title cannot be empty");
					return false;
				}
				else if(task.length == 0)
				{
					alert("Task cannot be empty");
					return false;
				}
				else if(date == "")
				{
					alert("Date cannot be empty");
					return false;
				}
				else if (date<today)
				{
					alert("Please enter valid date");
					return false;	
				}
				else		return t ;
			 
		  	});

		$("#cancel").on('click',function()
		 {
           $("#myModal").css({'display':'none'});	//hide the modal-box
		 });
		
		$("#btn1").click(function() 				//will style the modal-box onclick of Add task button
		  {
			
		  	$(".modal").css("display","block");
		  	$(".modal .modal-content input,textarea").css({"width":"98%","padding":"5px","font-family":"verdana",
		  		"outline": "none","border":"none","font-size":"20px","letter-spacing":"1px" });
		 
		  	$("#title").css({"border-bottom":"1px solid rgba(226, 226, 226,0.5)","height":"30px"});
		  	$("#task").css({"resize":"none","height":"200px","margin-top":"10px"});
		  	$("#date").css({"border-top":"1px solid rgba(226, 226, 226,0.5)"});

		  	$("#save,#cancel").css(
		  		{
		  			"font-family":"arial",
		  			"font-size":"20px",
		  			"text-transform":"uppercase",
		  			"text-decoration":"none",
		  			"color":"#000",
		  			"position":"relative",
		  			"display":"inline",
		  			"width":"80px",
					"height":"50px",
					"background":"none",
					"border":"none",
					"outline":"none",
					"float":"right"
		 		});

		  	$("#save").css("color","#f97b20");
		  	$("#cancel").css({"width":"90px","color":"rgba(0,0,0,0.8)"});
		  	$("#save,#cancel").hover(function()
		  		   {
        			$(this).css("cursor", "pointer");
  				  });
return false;

});
		
});

function getCurrentDate()
{
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();

	if(dd<10) { dd = '0'+dd } 
	if(mm<10) { mm = '0'+mm } 
	today = yyyy+ '-'+ mm + '-' + dd ;
	return today;
}

function closeBox()
		{
			$("#displayBox").hide();
		}

function editTask()
		{
			var oldTitle = $('#display input[type="text"]').val();
			var oldTask = $('#display textarea').val();
			var oldCompDate = $('#date2').val();

			$('.input').not('#date1').css({'pointer-events':'auto','color':'rgb(8, 73, 204)'});
			$('#save_changes').css({'display':'block'});
			$('#save_changes').on('click',function()
			{
				var newTitle = $('#display input[type="text"]').val();
				var newTask = $('#display textarea').val();
				var newCompDate = $('#date2').val();
				var today = getCurrentDate();			//will return currentDate in "YYYY-mm-dd" format
				
				if(oldTitle != newTitle || oldTask != newTask || oldCompDate != newCompDate)
				{

					if(newTitle.length == 0)
						newTitle = oldTitle;
					if(newTask.length == 0)
						newTask = oldTask;
					if(newCompDate == 0)
						newCompDate = oldCompDate;
					if(newCompDate<today)
						alert("Enter Valid Date");
					else
					{
						var xhttp = new XMLHttpRequest();
						var data = "oldTitle="+oldTitle+"&newTitle="+newTitle+"&newTask="+newTask+"&newCompDate="+newCompDate;
						xhttp.open("POST","editTask.php",true);
						xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					 	xhttp.send(data);

						xhttp.onreadystatechange = function()
							{
								if(xhttp.readyState == 4 && xhttp.status == 200)
									{	
									 	printTask();
									 	$("#displayBox").hide();
									}
							};
					}	
				}
				else
				{
					printTask();
					$("#displayBox").hide();
				}
		
			});

		}

function deleteTask(str)			/*for deletion of the particular task onclick of Trash Button*/
{
	if(confirm("Are you sure you want to permanently delete this task?"))
	{
		var start = str.indexOf("<td>",4);
		start+=4;
		var remainingStr=str.substr(start);
	    var end = remainingStr.indexOf("</td>");
	    var title = str.substr(start,end);

	    var xhttp = new XMLHttpRequest();
		xhttp.open("POST","deleteTask.php",true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	 	xhttp.send("title="+title);

		xhttp.onreadystatechange = function(){
			if(xhttp.readyState == 4 && xhttp.status == 200)
				{	
				 	printTask();
				}
		};
	}
}

function showPendingTask()		/*will show all the pending tasks onclick of Pending Task button in menubar*/
{
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST","showPendingTask.php",true);
	xhttp.send();

	xhttp.onreadystatechange = function(){
		if(xhttp.readyState == 4 && xhttp.status == 200)
		{				
			document.getElementById("taskTable").innerHTML = xhttp.responseText;
			document.getElementById("menubar").style.display ="none";
		}
	};
}

function showProcessingTask()  /*will show all the processing tasks onclick of In Process Task button in menubar*/
{
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST","showProcessingTask.php",true);
	xhttp.send();

	xhttp.onreadystatechange = function(){
		if(xhttp.readyState == 4 && xhttp.status == 200)
		{		
			document.getElementById("taskTable").innerHTML = xhttp.responseText;
			document.getElementById("menubar").style.display ="none";
		}
	};
}
function showCompletedTask() /*will show all the completed tasks onclick of Completed Task button in menubar*/
{
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST","showCompletedTask.php",true);
	xhttp.send();

	xhttp.onreadystatechange = function(){
		if(xhttp.readyState == 4 && xhttp.status == 200)
		{		
			document.getElementById("taskTable").innerHTML = xhttp.responseText;
			document.getElementById("menubar").style.display ="none";
		}
	};
}

function searchText(text)
{

	if(text.length==0)
 		printTask();

	var xhttp = new XMLHttpRequest();
	xhttp.open("POST","searchText.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 	xhttp.send("text="+text);

	xhttp.onreadystatechange = function(){
		if(xhttp.readyState == 4 && xhttp.status == 200)
		{	
			document.getElementById("taskTable").innerHTML = xhttp.responseText;
		}
	};
}

function deleteAllTask()	/*will magically clear all the tasks from database onclick of CLEAR button*/
{
	if(confirm("Are you sure you want to permanently delete all the records?"))
	{
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST","deleteAllTask.php",true);
		xhttp.send();
		xhttp.onreadystatechange = function()
			{
				if(xhttp.readyState == 4 && xhttp.status == 200)
					document.getElementById("taskTable").innerHTML = xhttp.responseText;
			};
	}
}

function printTask()	//printing all the tasks saved in database
{
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST","printTask.php",true);
	xhttp.send();
	xhttp.onreadystatechange = function(){
		if(xhttp.readyState == 4 && xhttp.status == 200)
		{
				document.getElementById("taskTable").innerHTML = xhttp.responseText;
				document.getElementById("menubar").style.display ="none";
		}
	};
}

function showTask(str)		//will display task description onclick of View button
{
	var start = str.indexOf("<td>",4);
	start+=4;
	var remainingStr=str.substr(start);
    var end = remainingStr.indexOf("</td>");
    var title = str.substr(start,end);

    var xhttp = new XMLHttpRequest();
	xhttp.open("POST","showTask.php",true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 	xhttp.send("title="+title);

	xhttp.onreadystatechange = function(){
		if(xhttp.readyState == 4 && xhttp.status == 200)
			{
				document.getElementById("display").innerHTML = xhttp.responseText;
				document.getElementById("displayBox").style.display = "block";				
			}
	};
}


