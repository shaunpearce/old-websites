// JavaScript Document

function save(field, query, change)
{
	xmlhttp = new XMLHttpRequest(); // Creating Object
	xmlhttp.onreadystatechange = function() // Checking if readyState changes
	{
				if (xmlhttp.readyState!=4 && xmlhttp.status==200) // Validation Under Process
				{
							document.getElementById(change).innerHTML = "Validating..";
				}
				else if (xmlhttp.readyState==4 && xmlhttp.status==200) // Validation Completed
				{ 
							document.getElementById(change).innerHTML = xmlhttp.responseText;
				}
				else // If an error is encountered
				{
							document.getElementById(change).innerHTML = "Unknown Error Occurred. <a href='index.php'>Reload</a> the page.";
				}
	}
	xmlhttp.open("GET","settings_action.php?field="+field+"&query="+query, false);
	xmlhttp.send();
}

function savepass(original, new1, new2, change)
{
	xmlhttp = new XMLHttpRequest(); // Creating Object
	xmlhttp.onreadystatechange = function() // Checking if readyState changes
	{
				if (xmlhttp.readyState!=4 && xmlhttp.status==200) // Validation Under Process
				{
							document.getElementById(change).innerHTML = "Validating..";
				}
				else if (xmlhttp.readyState==4 && xmlhttp.status==200) // Validation Completed
				{ 
							document.getElementById(change).innerHTML = xmlhttp.responseText;
				}
				else // If an error is encountered
				{
							document.getElementById(change).innerHTML = "Unknown Error Occurred. <a href='index.php'>Reload</a> the page.";
				}
	}
	xmlhttp.open("GET","settings_action.php?field="+'pass'+"&query="+original + "&new1="+ new1 + "&new2="+ new2, false);
	xmlhttp.send();
}
