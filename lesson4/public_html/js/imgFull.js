$('.img-thumbnail').click(function(elem){
 var link = elem.currentTarget.currentSrc;
 $('.modal-body').html('<img class="img-responsive" src="' + link + '">');
});