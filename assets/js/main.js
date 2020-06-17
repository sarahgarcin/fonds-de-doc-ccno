$(document).ready(function(){
	init();
});


function init(){

	var paramSort = getUrlParameter('sort');
	var paramTag = getUrlParameter('tag');

	// ajoute la classe active quand on clique sur une catégorie
	$('.list-books__td--'+paramSort).addClass('active');

	// ajoute la classe active quand un tag est actif
	$('.tags > .tag[data-tag="'+paramTag+'"]').addClass('active');

	// il faudrait ajouter une fonction qui va chercher un nouveau parametre "order" dans l'url et qui détermine si l'odre est ascendant ou descendant

	$('.list-books__details__inner').on('click', function(e){
		var $contentToUnfold = $(this).next('.list-books__content');
		console.log($(e.target).hasClass('tag'));
		console.log($(e.target).attr('class'));
		if(!$(e.target).hasClass('tag')){
			if($contentToUnfold.hasClass('fold')){
				$contentToUnfold.removeClass('fold').addClass('unfold');
			}
			else{
				$contentToUnfold.removeClass('unfold').addClass('fold');
			}
		}
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







