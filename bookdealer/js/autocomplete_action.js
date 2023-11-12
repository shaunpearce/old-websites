 $(function auto() {
		    
	 $("#search").autocomplete({
		source: "autocomplete_tools.php",
		minLength: 2
	});
	
	$("#b_id").autocomplete({
					  source: "autocomplete_tools.php",
					  minLength: 2,
					  select: function(event, ui) {
						  $('#b_id').val(ui.item.id);
						  $('#author').val(ui.item.abbrev);
					  }
				  });
				  
});


