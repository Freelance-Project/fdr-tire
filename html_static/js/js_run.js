/*===============================================================================================================	
Author     : Muhammad Febriansyah
Date       : September 2016
 =============================================================================================================== */
 
$(document).ready(function () {
  $('#homeSlider').bxSlider({
	  auto: true
	});
  $('#eventSlider').bxSlider({
	  auto: true
	});
   newsSlider();
   galleryDetail();
   productHome();
   productDetail();
   tabSearch();

   $('.skew-tab-menu').click(function(event){
		 event.preventDefault()
		var recentId = $(this).attr('data-tabId');
		console.log(recentId);
		$('.skew-tab-menu').removeClass('active');
		$(this).addClass('active');
		$('.content-tab').addClass('hide');
		$('#'+recentId).removeClass('hide');
	});
   $('.findtire').click(function(event){
		 event.preventDefault();
		 $('#search-home').slideToggle();
	});
});
$(window).scroll(function(){
	//console.log($(window).scrollTop());

	if($(window).scrollTop()>=20){

		$('#mainheader').addClass('fixedNav');

	}else{

		$('#mainheader').removeClass('fixedNav');

	}

});
