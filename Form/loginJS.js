
function validateUsername(username)
	{
		var x = document.getElementById("user_error");
			x.style.color = "red";
			x.style.fontSize = "13px";
			x.style.paddingBottom = "18px";
			x.style.marginTop = "-25px";

		if(username == ""){
				x.innerHTML = "*Username required";
				return false;
			}	
		else if(username.match(/^[0-9]+$/)){
				x.innerHTML = "*Must contain some characters";
				return false;
			}
		else if(username.match(/^[A-Za-z]+$/)){
				x.innerHTML = "*Feed valid username";	
				return false;
			}
		else{
			x.innerHTML = "";
			return true;
		}
	}

function validatePassword(password)
	{
			var x = document.getElementById("pass_error");
			x.style.color = "red";
			x.style.fontSize = "13px";
			x.style.paddingBottom = "10px";
			x.style.marginTop = "-25px";

		if(password == ""){
			x.innerHTML = "*Password required";
			return false;
		}
		else if(password.length<8){
			x.innerHTML = "*Password too short (min. length 8)";
			return false;
		}
		else{
			x.innerHTML = "";
			return true;
		}
	}

function validateLogin()
	
	{
		var username = document.forms["loginForm"]["username"].value;
		var password = document.forms["loginForm"]["password"].value;

		var result1 = validateUsername(username);
		var result2 = validatePassword(password);

		if(result1 && result2)
			return true;
		else
			return false;
	}