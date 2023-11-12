
$(document).ready(function(){
	 
	 function search(){

		  var title=$("#msearch").val();
		  var col=$("#module_college").val();

		  if(title!=""){
			$("#mresult").html("<img src='ajax-loader.gif'/>");
			 $.ajax({
				type:"post",
				url:"search_module.php",
				data:"title="+title+"&college="+col,
				success:function(data){
					$("#mresult").html(data);
					$("#msearch").val("");
				 }
			  });
		  }
	 }
	  $("#button").click(function(){
		 search();
	  });

	  $('#msearch').keyup(function(e) {
		 if(e.keyCode == 13) {
			search();
		  }
	  });
});
