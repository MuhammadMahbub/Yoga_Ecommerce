(function($) {
$(document).ready(function(){

	// global vars
	var winWidth = $(window).width();
	var winHeight = $(window).height();
	var slideDescMtop = (($(".slideDesc").height() / 2 ) + 8) * -1;

	if($('.homeBxSlider').length){
		$('.homeBxSliderWrap').css({
		   	'height': winHeight
		});
		$('.homeBxSlider').css({
		   	'height': winHeight
		});
		$('.homeBxSlider .slide').css({
		   	'height': winHeight
		});
		$('.homeBxSlider .slide .slideDesc').css({
		   	'margin-top': slideDescMtop
		});

		$(window).resize( function(e)
		{
		    var winWidth = $(window).width();
			var winHeight = $(window).height();
			$('.homeBxSliderWrap').css({
			   	'height': winHeight
			});
			$('.homeBxSlider').css({
			   	'height': winHeight
			});
			$('.homeBxSlider .slide').css({
			   	'height': winHeight
			});
		});
	}

	
	if($('.homeBxSlider').length){
		var homeSlide = $('.homeBxSlider').bxSlider({
			mode:"fade",
			auto:true,
			speed:700,
			pause:4000,
			onSliderLoad: function(){
				$('.homeBxSlider').addClass("ready");
		    },
			onSlideAfter: function(){
				var gcs = homeSlide.getCurrentSlide();
		        $('.homeBxSlider').find('.slide:not(li[data-slide="'+gcs+'"])').removeClass("active");
				$('.homeBxSlider').find('.slide[data-slide="'+gcs+'"]').addClass("active");
				
		    }
		});
	}

	if($('.contactGallery').length){
		var contactGallery = $('.contactGallery').find("ul").bxSlider({
			controls:false,
			mode:"fade",
			pause:4000,
			auto: true
		});
	}

    $(".teamItem").on("click", function(){
    	var userDescId = $(this).data("userid");
    	$("#"+userDescId).addClass("show");
    });

    $(".categoryList a").on("click", function(e){
    	e.preventDefault();
    	if (!$(this).closest("li").hasClass("current")) {
    		var selectedEventCategory = $(this).data("event-category");
    		$(".categoryList li.current").removeClass("current");
	    		$(this).closest("li").addClass("current");
    		
    		if (selectedEventCategory == "event-all") {
    			$(".eventsWrap .eventItem").show();
    		} else {
	    		$("."+selectedEventCategory).show();
	    		$(".eventsWrap .eventItem").not("."+selectedEventCategory).hide();	
    		}
    	}
    });
    
	$(".closeTeamDesc").on("click", function(){
    	$(this).closest(".teamItemDesc").removeClass("show");
    });
    
	$(".miniCart").on("click", function(){
		$(this).closest(".contentWrap").addClass("showMiniCart");
	});
	$(".closeCartPopup").on("click", function(){
		$(this).closest(".contentWrap").removeClass("showMiniCart");
	});

	$('.country_to_state, .options select').selectric();

	$(".galleryThumbItem").on("click", function(e){
		e.preventDefault();
		if (!$(this).hasClass("active")) {
			$("a.galleryThumbItem.active").removeClass("active");
			$(this).addClass("active");
			var imgID = $(this).attr("href");
			$(".productGalleryWrap .current").removeClass("current");
			$(imgID).addClass("current");	
		}
	});

	
	$(".categoryList span").on("click", function(){
		if ($(this).hasClass("clicked")) {
			$(this).removeClass("clicked").closest(".categoryList").find("ul").slideUp(300);
		} else {
			$(this).addClass("clicked").closest(".categoryList").find("ul").slideDown(300);
		}
	});

	$(document).on('click', function(e) {
	  if (!$(e.target).parents().hasClass('categoryList') /*&& !$(e.target).hasClass('miniCartWrap')*/ )  {
	    $(".categoryList").find("ul").slideUp(300);
		$(".categoryList span").removeClass("clicked");
	  }
	});

	$(".classesFilter a").on("click", function(e){
		e.preventDefault();
		var filterData = $(this).data("filter");
		if (filterData == "all") {
			$(".classesFilter a.active").removeClass("active");
			$(this).addClass("active");
			$(".fc-content-skeleton a.fc-event.hide").removeClass("hide");
		} else {
			$(".classesFilter a.active").removeClass("active");
			$(this).addClass("active");
			$(".fc-content-skeleton a.fc-event.hide").removeClass("hide");
			$(".fc-content-skeleton a.fc-event").not("."+filterData).addClass("hide");
		}
	});


	$('body').on('click', 'button.fc-button', function() {
		$(".classesFilter a.active").removeClass("active");
		$(".classesFilter a[data-filter='all']").addClass("active");
	});

	$('.showMobileMenu').on("click", function(e){
		e.preventDefault();
		$(this).toggleClass('open').closest("body").toggleClass('animated');
	});

	if($('.teamItemDescWrap').length){
		$('.teamItemDescWrap').jScrollPane({
			autoReinitialise: true
		});
	}

	/* Sticky */
	var sticky_navigation_offset_top = 0;
	var sticky_navigation = function(){
		var scroll_top = $(window).scrollTop();
		if (scroll_top > sticky_navigation_offset_top) { 
			$('#header .headerWrap').addClass("is-sticky");
		} else {
			$('#header .headerWrap').removeClass("is-sticky"); 
		}   
	};
	sticky_navigation();

	$(window).scroll(function() {
		 sticky_navigation();
	});
	/* END Sticky */
	
	if (winWidth > 767) {
		$('div[data-type="parallax"]').each(function(){
	        var $bgobj = $(this); // assigning the object
	        var bgobjTop = $(this).offset().top;
	    
	        $(window).scroll(function() {
	        	//console.log($(window).scrollTop() + winHeight)
	        	//console.log(bgobjTop)

				if ( ($(window).scrollTop() + winHeight) > bgobjTop )        	
				{

					var yPos = -(($(window).scrollTop() - $bgobj.offset().top) / $bgobj.data('speed')); 
	            
		            // Put together our final background position
		            var coords = '50% '+ yPos + 'px';

		            // Move the background
		            $bgobj.css({ backgroundPosition: coords });	
				}
	        }); 
	    });  
    }

    $(window).resize( function(e)
		{	
			if($('.teamItemDescWrap').length){
				$('.teamItemDescWrap').jScrollPane({
					autoReinitialise: true
				});
			}
			
		    var winWidth = $(window).width();
			var winHeight = $(window).height();

			if (winWidth > 767) {
				$('div[data-type="parallax"]').each(function(){
			        var $bgobj = $(this); // assigning the object
			        var bgobjTop = $(this).offset().top;
			    
			        $(window).scroll(function() {
			        	//console.log($(window).scrollTop() + winHeight)
			        	//console.log(bgobjTop)

						if ( ($(window).scrollTop() + winHeight) > bgobjTop )        	
						{

							var yPos = -(($(window).scrollTop() - $bgobj.offset().top) / $bgobj.data('speed')); 
			            
				            // Put together our final background position
				            var coords = '50% '+ yPos + 'px';

				            // Move the background
				            $bgobj.css({ backgroundPosition: coords });	
						}
			        }); 
			    });  
		    }
	});

});
})(jQuery);