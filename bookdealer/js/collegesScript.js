// JavaScript Document
function populate(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
	if(s1.value == "Dublin"){
		var optionArray = ["|","DCU|DCU","DIT|DIT","TCD|TCD","UCD|UCD","FCB|FCB","ITB|ITB","St.Pat's|St.Pat's","Marino|Marino","NCAD|NCAD","IPA|IPA","NCI|NCI","RCSI|RCSI","IADT|IADT","ITT|ITT"];
	} else if(s1.value == "Galway"){
		var optionArray = ["|","NUIG|NUIG","M-GIT|M-GIT"];
	} else if(s1.value == "Limrick"){
		var optionArray = ["|","UL|UL","LIT|LIT","MIC|MIC"];
	}else if(s1.value == "Maynooth"){
		var optionArray = ["|","NUIM|NUIM","St.Pat's|St.Pat's"];
	}else if(s1.value == "Shannon"){
		var optionArray = ["|","SCHM|SCHM"];
	}else if(s1.value == "Sligo"){
		var optionArray = ["|","ITS|ITS","SAC|SAC"];
	}else if(s1.value == "Waterford"){
		var optionArray = ["|","WIT|WIT"];
	}else if(s1.value == "Tralee"){
		var optionArray = ["|","ITT"];
	}else if(s1.value == "Letterkenny"){
		var optionArray = ["|","LIT|LIT"];
	}else if(s1.value == "Dundalk"){
		var optionArray = ["|","DIT"];
	}else if(s1.value == "Athlone"){
		var optionArray = ["|","AIT"];
	}else if(s1.value == "Carlow"){
		var optionArray = ["|","ITC|ITC","CC|CC"];
	}else if(s1.value == "Cork"){
		var optionArray = ["|","UCC|UCC","CIT|CIT"];
	} 
	for(var option in optionArray)
	{
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}

}

