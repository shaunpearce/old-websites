
$(function autoupload() { 
    $( "#titl" ).autocomplete({
      minLength: 0,
      source: "autocomplete_tools.php",
      focus: function( event, ui ) {
        //$( "#project" ).val( ui.item.value );
		//$( "#search-bar" ).val( ui.item.value + " " + ui.item.abbrev );
		$( "#titl" ).val( ui.item.value);
        return false;
      },
      select: function( event, ui ) {
        //$( "#search-bar" ).val( ui.item.value + " " + ui.item.abbrev );
		$( "#titl" ).val( ui.item.value);
		$("#author").val(ui.item.abbrev);
        //$( "#project-icon" ).attr( "src", "images/" + ui.item.icon );
 
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>"+ "<img id='image' src='" + item.img + "' width = '50px' height = '60px' style='margin:0px 25px 0px 0px'>" + item.value +"<br>" + item.abbrev + "</a><br><br>" )
        .appendTo( ul );
    };   
  });
  
  /*
   $(function autoupload2() {
		    
	 $("#titl").autocomplete({
		source: "autocomplete_tools.php",
		minLength: 4
	});
	
	$("#titl").autocomplete({
					  source: "autocomplete_tools.php",
					  minLength: 4,
					  select: function(event, ui) {
						  $('#titl').val(ui.item.id);
						  $('#author').val(ui.item.abbrev);
					  }
				  });
				  
});
*/

