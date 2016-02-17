( function( $ ) {

	function removeNoJsClass() {
		$( 'html:first' ).removeClass( 'no-js' );
	}

	/* Superfish the menu drops ---------------------*/
	function superfishSetup() {
		$('.menu').superfish({
			delay: 200,
			animation: {opacity:'show', height:'show'},
			speed: 'fast',
			cssArrows: true,
			autoArrows:  true,
			dropShadows: false
		});
	}
	
	/* Disable Superfish on mobile ---------------------*/
	function superfishMobile() {
		var sf, body;
		var breakpoint = 767;
	    body = $('body');
	    sf = $('ul.menu');
	    if ( body.width() >= breakpoint ) {
	      // Enable superfish when the page first loads if we're on desktop
	      sf.superfish();
	    }
	    $(window).resize(function() {
	        if ( body.width() >= breakpoint && !sf.hasClass('sf-js-enabled') ) {
	            // You only want SuperFish to be re-enabled once (sf.hasClass)
	            sf.superfish('init');
	        } else if ( body.width() < breakpoint ) {
	            // Smaller screen, disable SuperFish
	            sf.superfish('destroy');
	        }
	    });
	}
		
	function modifyPosts() {
		
		/* Insert Line Break Before More Links ---------------------*/
		$('<br />').insertBefore('.postarea .more-link');
		
		/* Hide Comments When No Comments Activated ---------------------*/
		$('.nocomments').parent().css('display', 'none');
		
		/* Animate Page Scroll ---------------------*/
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
		});
		
		/* Fit Vids ---------------------*/
		$('.postarea').fitVids();
		
	}
	
	$( document )
	.ready( removeNoJsClass )
	.ready( superfishSetup )
	.ready( superfishMobile )
	.ready( modifyPosts )
	.on( 'post-load', modifyPosts );
	
})( jQuery );