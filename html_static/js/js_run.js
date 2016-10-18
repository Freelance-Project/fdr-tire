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
