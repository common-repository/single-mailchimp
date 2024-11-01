
jQuery(document).ready(function(){
	jQuery('.sm-wrap .box > header').click(function(){
		var curHeight = '73px';

		if (jQuery(this).hasClass('active')){
			jQuery(this).removeClass('active');
			jQuery(this).parent().animate({height: curHeight}, 500);

		} else{
			jQuery('.sm-wrap .box ').animate({height: curHeight}, 350);
			jQuery('.sm-wrap .box > header').removeClass('active');
			jQuery(this).addClass('active');
			jQuery(this).parent().css('height', 'auto');

			var autoHeight = jQuery(this).parent().height();

			jQuery(this).parent().height(curHeight).animate({height: autoHeight}, 500);
		}

	})
})




