 function fetchCountry()
 {

	 	var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "country_state.json", true);
	    xhttp.send();
	 	xhttp.onreadystatechange = function()
			{
				if (xhttp.readyState == 4 && xhttp.status == 200 )
					 {
					     var jsObj = JSON.parse(xhttp.responseText);
					     for(var i=0;i<jsObj.countries.length;i++)
					     document.getElementById("country").innerHTML += "<option>"+jsObj.countries[i].country+"</option>";
              		 }		
			};
 }

 function fetchState(str)
 {

 		var xhttp = new XMLHttpRequest();
 		var i=0,j=0,jsObj="",text="";
		xhttp.open("GET", "country_state.json", true);
        xhttp.send();
 		xhttp.onreadystatechange = function()
		{
			if (xhttp.readyState == 4 && xhttp.status == 200 )
				{
					 jsObj = JSON.parse(xhttp.responseText);
					 
					 if(str == "Default")
					 	document.getElementById("state").innerHTML = "<option>First select a country</option>";
					 		
					for(i=0;i<jsObj.countries.length;i++)
					 	if(str == jsObj.countries[i].country)
					 	{
					 		for(j=0;j<jsObj.countries[i].states.length;j++)
							{
								text += "<option>"+jsObj.countries[i].states[j]+"</option>"
						 		document.getElementById("state").innerHTML = text;
							}
					 	}	
              	}
						  					
		};
 }

 function isExist(username)
 	{
 		
 			var xhttp = new XMLHttpRequest();
 			xhttp.open("GET","http://localhost/Form/isExist.php?username="+username,true);
 			xhttp.send();
 			xhttp.onreadystatechange = function()
 			{
 				if(xhttp.readyState == 4 && xhttp.status == 200)
 					 document.getElementById("user_error").innerHTML=xhttp.responseText;
 			};

	}

 function validateUsername(username)
	 {
	 	var x = document.getElementById("user_error");
	 		x.style.color = "red";
	 		x.style.fontSize = "16px";
	 		x.style.paddingBottom="10px";
	 		x.style.marginTop="-25px";
	 		x.style.marginLeft="80px";

	 	if(username == ""){
	 	    x.innerHTML = "*Username required";
	 	    return false;
	 	}
	 	else if(username.length<6){
	 		x.innerHTML = "*Too short (min length 6)";
	 		return false;
	 	}
	 	else if(username.match(/^[0-9]+$/)){
	 		x.innerHTML = "*Must contain some characters";
	 		return false;
	 	}
	 	else if(username.match(/^[A-Za-z]+$/)){
	 		x.innerHTML = "*Must contain some numerics";
	 		return false;
	 	}
	 	else if(isExist(username)){
	 		
	 		return false;
	 	}
	 	else {
	 		x.innerHTML = "";
	 		return true;
	 	}
	
	 }

function validatePassword(password,username)
	 {
	
	 	var x = document.getElementById("pass_error");
	 		x.style.color = "red";
	 		x.style.fontSize = "16px";
	 		x.style.paddingBottom="10px";
	 		x.style.marginTop="-25px";
	 		x.style.marginLeft="80px";
	 		
	 	if(password.length == 0){
	 		x.innerHTML = "*Password required";
	 		return false;
	 	}
	 	else if(password.length<8 || password.length>16){
	 		x.innerHTML = "*Length must be in range 8-16";
	 		return false;
	 	}
	 	else if(password.match(/^[0-9]+$/)){
	 		x.innerHTML = "*Include alphabates & special characters";
	 		return false;
	 	}
	 	else if (password.match(/^[A-Za-z]+$/)){
	 		x.innerHTML = "*Include alphanumerics & special characters";
	 		return false;
	 	}
	 	else if(password == username){
	 		x.innerHTML = "*Can't be a username";
	 		return false;
	 	}
	 	else {
	 		x.innerHTML = "";
	 		return true;
	 	}
	 }

function validatePassword2(password,password1)
	{
		var x = document.getElementById("pass1_error");
	 		x.style.color = "red";
	 		x.style.fontSize = "16px";
	 		x.style.paddingBottom="10px";
	 		x.style.marginTop="-25px";
	 		x.style.marginLeft="80px";

	 	if(password1 == ""){
	 		x.innerHTML = "*Password confirmation required";
	 		return false;
	 	}
	 	else if(password != password1){
	 		x.innerHTML = "*Password not matched";
	 		return false;
	 	}
	 	else{
	 		x.innerHTML = "";
	 		return true;
	 	}
	}

function confirmPassword2()
	{
	 	var password = document.forms["regForm"]["password"].value;
		var password1 = document.forms["regForm"]["password1"].value;

		validatePassword2(password,password1);
	}

function validateName(name)
	 {
	 	var x = document.getElementById("name_error");
	 		x.style.color = "red";
	 		x.style.fontSize = "16px";
	 		x.style.paddingBottom="10px";
	 		x.style.marginLeft="80px";
	 		x.style.marginTop="-25px";

	 	if(name == ""){
	 		x.innerHTML = "*Name required";
	 		return false;	
	 	}
	 	else if(!name.match(/^[A-Za-z ]+$/)){
	 		x.innerHTML = "*Must be characters only";
	 		return false;
	 	}
	 	else{
	 		x.innerHTML = "";
	 		return true;
	 	}
	 }

function validateAddress(address)
	 {
	 	var x = document.getElementById("addr_error");
	 		x.style.color = "red";
	 		x.style.fontSize = "16px";
	 		x.style.paddingBottom="10px";
	 		x.style.marginLeft="80px";
	 		x.style.marginTop="-25px";

	 	if(address == ""){
	 		x.innerHTML = "*Address required";
	 		return false;
	 	}
	 	else if(address.match(/^[0-9]+$/)){
	 		x.innerHTML = "*Provide valid address";
	 		return false;
	 	}
	 	else if(!address.match(/^[A-Za-z0-9 ]+$/)){
	 		x.innerHTML = "*Provide valid address";
	 		return false;
	 	}
	 	else{
	 		x.innerHTML ="";
	 		return true;
	 	}
	 }

function validateCountry(country)
	{
		var x = document.getElementById("con_error");
	 		x.style.color = "red";
	 		x.style.fontSize = "16px";
	 		x.style.marginLeft="80px";
	 		x.style.marginTop="13px";
	 		x.style.marginBottom = "-10px";

	 	if(country == "Default"){
	 		x.innerHTML = "*Please select a country";
	 		return false;
	 	}
	 	else{
	 		x.innerHTML = "";	
	 		return true;
	 	}
	} 

function validateState(state)
	{
		var x = document.getElementById("state_error");
	 		x.style.color = "red";
	 		x.style.fontSize = "16px";
	 		x.style.marginLeft="80px";
	 		x.style.marginTop="13px";
	 		x.style.marginBottom = "-10px";

	 	if(state == "Default"){
	 		x.innerHTML = "*Please select a state";
	 		return false;
	 	}
	 	else{
	 		x.innerHTML = "";	
	 		return true;
	 	}
	} 

function validateZIP(zip)
	{
		var x = document.getElementById("zip_error");
	 		x.style.color = "red";
	 		x.style.fontSize = "16px";
	 		x.style.marginBottom = "5px"
	 		x.style.marginLeft="80px";
	 		x.style.marginTop="-25px";

	 	if (zip == ""){
	 		x.innerHTML = "*ZIP Code required";
	 		return false;
	 	}
	 	else if(!zip.match(/^[0-9]+$/)){
	 		x.innerHTML = "*Must be numerics only";
	 		return false;
	 	}	
	 	else if(zip.length<6 || zip.length>6){
	 		x.innerHTML = "*Enter valid ZIP code";
	 		return false;
	 	}
	 	else{
	 		x.innerHTML = "";
	 		return true;
	 	}
	}

function validateEmail(email)
	{
		var x = document.getElementById("email_error");
	 		x.style.color = "red";
	 		x.style.fontSize = "16px";
	 		x.style.paddingBottom="14px";
	 		x.style.marginLeft="80px";
	 		x.style.marginTop="-25px";

	 	if(email == ""){
	 		x.innerHTML = "* Email required";
	 		return false;
	 	}
	 	else if(!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){
	 		x.innerHTML = "*Enter valid E-mail address";
	 		return false;
	 	}
	 	else{
	 		x.innerHTML = "";
	 		return true;
	 	}
	}

function validateForm(){

	var username = document.forms["regForm"]["username"].value;
	var password = document.forms["regForm"]["password"].value;
	var password1 = document.forms["regForm"]["password1"].value;
	var name = document.forms["regForm"]["name"].value;
	var address = document.forms["regForm"]["address"].value;
	var country = document.forms["regForm"]["country"].value;
	var state = document.forms["regForm"]["state"].value;
	var zipcode = document.forms["regForm"]["zip"].value;
	var email = document.forms["regForm"]["email"].value;
	
	 var result1 = validateUsername(username);
	 var result2 = validatePassword(password,username);
	 var result3 = validatePassword2(password,password1);
	 var result4 = validateName(name);
	 var result5 = validateAddress(address);
	 var result6 = validateCountry(country);
	 var result7 = validateState(state);
	 var result8 = validateZIP(zipcode);
	 var result9 = validateEmail(email);

	 if(result1 && result2 && result3 && result4 && result5 && result6 && result7 && result8 && result9)
	 	return true;
	 else
	 	return false;
}