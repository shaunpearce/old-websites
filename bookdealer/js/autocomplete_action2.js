// JavaScript Document
 /* $(function auto2() { 
    $( "#project" ).autocomplete({
      minLength: 0,
      source: "autocomplete_tools.php",
      focus: function( event, ui ) {
        //$( "#project" ).val( ui.item.value );
		$( "#project" ).val( ui.item.value + " " + ui.item.abbrev );
        return false;
      },
      select: function( event, ui ) {
        $( "#project" ).val( ui.item.value + " " + ui.item.abbrev );
        $( "#project-id" ).val( ui.item.id );
        $( "#project-description" ).html( ui.item.abbrev );
        //$( "#project-icon" ).attr( "src", "images/" + ui.item.icon );
 
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a>"+ "<img id='image' src='" + item.img + "' wdith = '30px' height = '60px' style='margin:0px 25px 0px 0px'>" + item.value +"<br>" + item.abbrev + "</a><br><br>" )
        .appendTo( ul );
    };   
  });*/
  
 
  
   $(function auto2() { 
    $( "#search-bar" ).autocomplete({
      minLength: 0,
      source: "autocomplete_tools.php",
      focus: function( event, ui ) {
        //$( "#project" ).val( ui.item.value );
		//$( "#search-bar" ).val( ui.item.value + " " + ui.item.abbrev );
		$( "#search-bar" ).val( ui.item.value);
        return false;
      },
      select: function( event, ui ) {
        //$( "#search-bar" ).val( ui.item.value + " " + ui.item.abbrev );
		$( "#search-bar" ).val( ui.item.value);
        $( "#project-id" ).val( ui.item.id );
        $( "#project-description" ).html( ui.item.abbrev );
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