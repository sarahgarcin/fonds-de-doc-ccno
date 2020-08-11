$(document).ready(function(){
	init();
});


function init(){

	var paramSort = getUrlParameter('sort');
	var paramTag = getUrlParameter('tag');

	// ajoute la classe active quand on clique sur une catégorie
	if(paramSort){
		$('.list-books__td--'+paramSort).addClass('active');
	}
	else{
		$('.list-books__td--title').addClass('active');
	}
	


	// ajoute la classe active quand un tag est actif
	$('.tags > .tag[data-tag="'+paramTag+'"]').addClass('active');

	// il faudrait ajouter une fonction qui va chercher un nouveau parametre "order" dans l'url et qui détermine si l'ordre est ascendant ou descendant

	// déplier les livres - plus d'infos
	$('.see-more').on('click', function(e){
		var $contentToUnfold = $(this).parents('.list-books__details__inner').next('.list-books__content');
		$('.see-more').removeClass('active');
		// if(!$(e.target).hasClass('tag')){
			if($contentToUnfold.hasClass('fold')){
				console.log('unfold');
				$('.unfold').removeClass('unfold').addClass('fold');
				$contentToUnfold.removeClass('fold').addClass('unfold');
				$(this).addClass('active');

				var $this = jQuery(this);
				setTimeout(function(){ 
					$('html, body').animate( { scrollTop: $this.offset().top - 80 }, 500);
				}, 1100);				
			}
			else{
				console.log('fold');
				$contentToUnfold.removeClass('unfold').addClass('fold');
				$(this).removeClass('active');
				
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







