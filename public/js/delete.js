
$(function(){
	$(".button").click(function(e){
		if( confirm("Are you sure you want to delete this?")  == false ){
			e.preventDefault();
		}
	});
});
