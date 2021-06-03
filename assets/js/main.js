$(document).ready(function(){
	init();
});


function init(){


	// fenêtres d'informations
	$('.infos').on('click', function(){
		$('.infos-overlay').fadeIn(400);
	});
	$('.emprunter').on('click', function(){
		$('.emprunter-overlay').fadeIn(400);
	});

	$('.close-window').on('click', function(){
		$(this).parents('.overlay').fadeOut(400);
	});

	var paramSort = getUrlParameter('sort');
	var paramTag = getUrlParameter('tag');
	var paramAuthor = getUrlParameter('author');

	//ajoute la classe active quand on clique sur une catégorie
	if(paramSort){
		$('.list-books__td--'+paramSort).addClass('active');
	}
	else{
		$('.list-books__td--title').addClass('active');
	}
	


	// ajoute la classe active quand un tag est actif
	$('.tags > .tag[data-tag="'+paramTag+'"]').addClass('active');

	// ajoute la classe active quand un auteur est actif
	console.log(paramAuthor);
	$('.author[data-tag="'+paramAuthor+'"]').addClass('active');


	// déplier les livres - plus d'infos
	$('.see-more, .list-books__td--title').on('click', function(e){
		var $content = $(this).parents('.list-books__details__inner');
		var $contentToUnfold = $(this).parents('.list-books__details__inner').next('.list-books__content');
		$('.see-more').removeClass('active');
		// if(!$(e.target).hasClass('tag')){
			if($contentToUnfold.hasClass('fold')){
				console.log('unfold');
				$('.unfold').removeClass('unfold').addClass('fold');
				$contentToUnfold.removeClass('fold').addClass('unfold');
				$content.addClass('active');

				var $this = jQuery(this);
				setTimeout(function(){ 
					$('html, body').animate( { scrollTop: $this.offset().top - 100 }, 500);
				}, 1100);				
			}
			else{
				console.log('fold');
				$contentToUnfold.removeClass('unfold').addClass('fold');
				$content.removeClass('active');
				
			}
		// }
	});


 

}

var getUrlParameter = function getUrlParameter(sParam) {
  var pageURL = window.location.href;
	var URLVariables = pageURL.split('/');
	var ParameterName;
	var i;

  for (i = 0; i < URLVariables.length; i++) {
    ParameterName = URLVariables[i].split(':');

    if (ParameterName[0] === sParam) {
      return ParameterName[1] === undefined ? true : decodeURIComponent(ParameterName[1]);
    }
	}
};







