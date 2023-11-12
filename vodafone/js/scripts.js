// JavaScript Document


	
$(allInView);
$(window).scroll(allInView);

var counted = 0;

function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

     return ((elemTop <= docViewBottom-150));
}

function allInView() {

    if (isScrolledIntoView($(".countercontainer")) && counted == 0)
    {
        count();
		counted = 1;
    }
}

function count(){
	
	$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
	
}


$('input[name=radio-2-set]').click(function () {
		  if (this.id == "radio-2-2") {
			  $("#show-me").fadeIn('fast');
		  } else {
			  $("#show-me").fadeOut('fast');
		  }
});

 
function changeinput() {
	var val = document.getElementById("slider1").value;
	document.getElementById("percentageinput").value = val;             
}
  

function changeSlider2() {
  var val = document.getElementById("percentageinput").value;
  document.getElementById("slider1").value = val; 
}	
		
function changeSelect() {
	  var selected = document.getElementById("persona").value;
	  persona.selectedIndex = 0;           
  }	
   
function fillbill3(){
	var splitentry = document.getElementById("percentageinput").value;
	var x = 40/100 * splitentry;
	x = parseInt(x);
	 
	 splitentry += "%";
	 document.getElementById("billpercentage").innerHTML = splitentry;
	 
	 document.getElementById("splitequation").innerHTML = x;
	 document.getElementById("tarifftotal").innerHTML = 40 - x;
	
}


function fillbill4(){

   if (document.getElementById('securitybox').checked)
   {
	    document.getElementById("securitycost").innerHTML = 5;
		document.getElementById("securitycost2").innerHTML = 5;
		document.getElementById("securityitem").style.visibility = 'visible';
   }
   else 
   {
	   document.getElementById("securitycost").innerHTML = 0;
	   document.getElementById("securitycost2").innerHTML = 0;
	   document.getElementById("securityitem").style.visibility = 'hidden';
   }
}
	 
$(window).scroll(function() {
	var scrollTop     = $(window).scrollTop();
	var elementOffset4 = $('#sheet').offset().top;
	var elementOffset5 = $('#sheet').offset().top + $('#sheet').height();
	var fixedpoint = $(window).height() - $("#envelope").height()/2;
	
	if(scrollTop+$(window).height() - $("#envelope").height()/2 >= elementOffset4 )
	{	
		 $('#envelopecontainer').css({
		  'position': 'fixed',
		  'top': fixedpoint,	
	  });  
	}
	else if (scrollTop+$(window).height() - $("#envelope").height()/2 <= elementOffset4 ){
		$('#envelopecontainer').css({
		  'position': 'relative',
		  'top': 0,	
	  });  
	}

	if (scrollTop+$(window).height() >= elementOffset5)
	{
		$('#envelopecontainer').css({
		  'position': 'relative',
		  'top': $('#sheet').height() - $("#envelope").height()/2,	
	  });  
	}	
});

function mouseOverMarket() {
		document.getElementById("computer").src = "img/compmarket.png";	
}
		
function mouseOutMarket() {
		document.getElementById("computer").src = "img/comp.png";
	}

function mouseOverSpend() {
		document.getElementById("computer").src = "img/compspend.png";
}
		
function mouseOutSpend() {
		document.getElementById("computer").src = "img/comp.png";
}

function mouseOverCards() {

		document.getElementById("computer").src = "img/compcards.png";
}
		
function mouseOutCards() {
		document.getElementById("computer").src = "img/comp.png";
}
			
			
function mouseOverHelp() {
		document.getElementById("computer").src = "img/comphelp.png";
}
		
function mouseOutHelp() {
		document.getElementById("computer").src = "img/comp.png";
}
				


function checkInput(){
	
	var num = document.getElementById("hardwareentry").value;

	if(num > 600)
	{
		alert("The maximium allowance is 600");
		document.getElementById("hardwareentry").value = 600;	
	}

	var num = document.getElementById("hardwareentry").value;

	if(num < 0)
	{
		alert("The mimimum allowance is 1");
		document.getElementById("hardwareentry").value = 1;	
	}
	
	if (IsNumeric(num) == false)
	{
		alert("The number you have entered is invalid");
		document.getElementById("hardwareentry").value = "";
	}

}


function phoneselection(){

   if (document.getElementById('Vodafone').checked)
   {
	   document.getElementById("phoneamount").innerHTML = 100;
   }
   else  if (document.getElementById('Lumia').checked)
   {
	    document.getElementById("phoneamount").innerHTML = 300;
   }
   else  if (document.getElementById('iPhone').checked)
   {
	  document.getElementById("phoneamount").innerHTML = 600;
   }
 }


function fillbill5(){
	
	var phoneprice = document.getElementById("phoneamount").innerHTML;
	
	if(phoneprice != "-"){

		if (document.getElementById('radio-2-1').checked)
		 {
			 document.getElementById("hardwarecont").innerHTML = phoneprice;
		 }
		 else  if (document.getElementById('radio-2-3').checked)
		 {
			 document.getElementById("hardwarecont").innerHTML = 0;
		 }
		  else  if (document.getElementById('radio-2-2').checked)
		 { 	
			 var entry = document.getElementById("hardwareentry").value;
			if(entry > 0 && entry < 600)
			{
				 if(phoneprice < entry)
				 {
					document.getElementById("hardwarecont").innerHTML = phoneprice;
				}
				else{
					document.getElementById("hardwarecont").innerHTML = entry;
				}
				 
			}
			else {
				 document.getElementById("hardwarecont").innerHTML = 300;
			}
		 }
	}
	
	var hardwarecont = document.getElementById("hardwarecont").innerHTML;

	if (phoneprice != "-" && hardwarecont != "-")
	{
		var phoneprice = parseInt(phoneprice);
		var hardwarecont = parseInt(hardwarecont);
		var total = phoneprice - hardwarecont;

		if(total < 0)
		{
			document.getElementById("hardwaretotal").innerHTML = 0;
		}
		
		else 
		{
			document.getElementById("hardwaretotal").innerHTML = total;
		}
	}
	
	displaytotals();
   
}


 function changeSlider() {
	  var persona = document.getElementById("persona").value;
	  
	  if(persona == "Fixed")
	  {
		  document.getElementById("slider1").value = 25;
		  document.getElementById("percentageinput").value = 25;
		 
		  document.getElementById("billpercentage").innerHTML = "25%";
		  document.getElementById("splitequation").innerHTML = 10;
		  	
	  }
	  else if(persona == "Flexible")
	  {
		  document.getElementById("slider1").value = 50;
		  document.getElementById("percentageinput").value = 50;	

		   document.getElementById("billpercentage").innerHTML = "50%";
		  document.getElementById("splitequation").innerHTML = 20;
	  }
	  else if(persona == "Field")
	  {
		  document.getElementById("slider1").value = 75;	
		  document.getElementById("percentageinput").value = 75;

		   document.getElementById("billpercentage").innerHTML = "75%";
		  document.getElementById("splitequation").innerHTML = 30;
	  }
	  document.getElementById("workertype").innerHTML = persona;   

	displaytotals();
  }
	

function displaytotals(){
	
	var employeecost = 0;

	var hc = document.getElementById("hardwaretotal").innerHTML;
	
	if( hc != "-")
	{
		var h = parseInt(hc);
		employeecost += h;
	}

	var tc = document.getElementById("tarifftotal").innerHTML;
		
	var t = parseInt(tc);
	employeecost += t;

	document.getElementById("employeebal").innerHTML = employeecost;

	
	var hc2 = document.getElementById("hardwarecont").innerHTML;

	var employercost = 0;
	if( hc2 != "-")
	{
		var h2 = parseInt(hc2);
		employercost += h2;
	}

	var tc2 = document.getElementById("splitequation").innerHTML;
	var t2 = parseInt(tc2);
	employercost += t2;
	
	if (document.getElementById('securitybox').checked)
   		{
			employercost += 5;
		}

	document.getElementById("employercont").innerHTML = employercost;
	
	var totalspend = 0;

	totalspend = employercost + employeecost;
	
	document.getElementById("totalbill").innerHTML = totalspend;
}	
      		




	  