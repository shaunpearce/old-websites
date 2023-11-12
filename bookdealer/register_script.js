function validate(field, query)
{
	xmlhttp = new XMLHttpRequest(); // Creating Object
	xmlhttp.onreadystatechange = function() // Checking if readyState changes
	{
				if (xmlhttp.readyState!=4 && xmlhttp.status==200) // Validation Under Process
				{
							document.getElementById(field).innerHTML = "Validating..";
				}
				else if (xmlhttp.readyState==4 && xmlhttp.status==200) // Validation Completed
				{
							document.getElementById(field).innerHTML = xmlhttp.responseText;
				}
				else // If an error is encountered
				{
							document.getElementById(field).innerHTML = "Unknown Error Occurred. <a href='index.php'>Reload</a> the page.";
				}
	}
	xmlhttp.open("GET","register_action.php?field="+field+"&query="+query, false);
	xmlhttp.send();
}
