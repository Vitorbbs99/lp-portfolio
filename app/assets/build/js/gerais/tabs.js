/* =================== TABS =================== */
jQuery(document).ready(function($){
	$('.tabs-abas li').on('click', function() {
    var tabId = $(this).data('tab');

    $('.tabs-abas li').removeClass('active');
    $('.tab-content').removeClass('active');

    $('#'+tabId).addClass('active');
    $(this).addClass('active');	    
  });

});
