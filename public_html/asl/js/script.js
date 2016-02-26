$(document).ready(function(){

	if($('.errors').length !== 0){
		$('.create-msg').show();
	}

	$('.create').click(function(e){
		e.preventDefault();

		$('.slide-target').slideToggle();
	});

});