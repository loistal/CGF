
function PNGManagement1 () {
      setTimeout (function(){
      jQuery('.nivoSlider .nivo-main-image').animate({opacity:0},500)
      },20);
}
function PNGManagement2 () {
      setTimeout (function(){
      jQuery('.nivoSlider .nivo-main-image').css({opacity:1});
      },20);
}


(function ($) {
	
	Drupal.behaviors.nivoSlider = {
		attach: function (context, settings) {
		  // Initialize the slider
		  if($('#slider').length != 0)
			  $('#slider').nivoSlider({
				'beforeChange': function (){PNGManagement1()}, // Triggers before a slide transition
				'afterChange': function (){PNGManagement2()}, // Triggers after a slide transition
				'pauseTime': 6000000,
			  });
		}
	};
	
	console.log("Test");

	
	$(document).ready(function(){
			
		console.log("Test");

		$.browser.device = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
		
		var menu		=	$('#navbar');
		var logo		=	$('.logo.navbar-btn');
		var menu_milieu	=	$('.menu_milieu_container');
		var menu_scroll	=	$('.menu_scroll_container');
		
		var limite_largeur_mobile	=	767;
		var position_menu	=	77;
		var position_logo	=	23;
		
		if($.browser.device){
			menu_scroll.hide();
		}
		
		$(window).bind('scroll', function() {
			if ($(window).scrollTop() > position_menu && $(window).width() > limite_largeur_mobile && menu.hasClass('default') ) {
				menu.addClass('fixed');
				menu.removeClass('default');
				if($.browser.device){
					menu.hide();
					menu.fadeIn('slow');
					menu_scroll.hide();
					menu_scroll.fadeIn('slow');
				}
				$('body').addClass('has-fixed');
				
			}
			else if ($(window).scrollTop() <= position_menu && $(window).width() > limite_largeur_mobile && menu.hasClass('fixed') ) {
				menu.removeClass('fixed');
				menu.addClass('default');
				if($.browser.device){
					menu.fadeIn('slow');
					menu_scroll.hide();
				}
				$('body').removeClass('has-fixed');
			}
			
			
			if ($(window).scrollTop() > position_logo && $(window).width() > limite_largeur_mobile && logo.hasClass('default') ) {
				logo.addClass('fixed');
				logo.removeClass('default');
				if($.browser.device){
					logo.hide();
					logo.fadeIn('slow');
				}
				
			}
			else if ($(window).scrollTop() <= position_logo && $(window).width() > limite_largeur_mobile && logo.hasClass('fixed') ) {
				logo.removeClass('fixed');
				logo.addClass('default');
				if($.browser.device){
					logo.fadeIn('slow');
				}
			}
			
			if ($(window).scrollTop() > position_logo && $(window).scrollTop() <= position_menu && $(window).width() > limite_largeur_mobile ) {
				opacity	=	1-(($(window).scrollTop() - position_logo) / (position_menu - position_logo));
				menu_milieu.css('opacity', opacity);
			}
			else if ($(window).scrollTop() <= position_logo && $(window).width() > limite_largeur_mobile ) {
				opacity	=	1;
				menu_milieu.css('opacity', opacity);
			}
			else if ($(window).scrollTop() > position_menu){
				opacity	=	0;
				
			}
			
		});
		
	});
})(jQuery);
