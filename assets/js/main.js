$(document).ready(function(){
	init();
});


function init(){
	$('.list-books__details__inner').on('click', function(){
		$contentToUnfold = $(this).next('.list-books__content');
		if($contentToUnfold.hasClass('fold')){
			$contentToUnfold.removeClass('fold').addClass('unfold');
		}
		else{
			$contentToUnfold.removeClass('unfold').addClass('fold');
		}
	});
 

}







