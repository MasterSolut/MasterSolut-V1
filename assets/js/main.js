/**
* @package Helix3 Framework
* @author JoomShaper http://www.joomshaper.com
* @copyright Copyright (c) 2010 - 2015 JoomShaper
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
jQuery(function($) {

    var $body = $('body'),
    $wrapper = $('.body-innerwrapper'),
    $toggler = $('#offcanvas-toggler'),
    $close = $('.close-offcanvas'),
    $offCanvas = $('.offcanvas-menu');

    $toggler.on('click', function(event){
        event.preventDefault();
        stopBubble (event);
        setTimeout(offCanvasShow, 50);
    });

    $close.on('click', function(event){
        event.preventDefault();
        offCanvasClose();
    });

    var offCanvasShow = function(){
        $body.addClass('offcanvas');
        $wrapper.on('click',offCanvasClose);
        $close.on('click',offCanvasClose);
        $offCanvas.on('click',stopBubble);

    };

    var offCanvasClose = function(){
        $body.removeClass('offcanvas');
        $wrapper.off('click',offCanvasClose);
        $close.off('click',offCanvasClose);
        $offCanvas.off('click',stopBubble);
    };

    var stopBubble = function (e) {
        e.stopPropagation();
        return true;
    };

    //Mega Menu
    $('.sp-megamenu-wrapper').parent().parent().css('position','static').parent().css('position', 'relative');
    $('.sp-menu-full').each(function(){
        $(this).parent().addClass('menu-justify');
    });
	
	//fix menu responsiveness
	$('ul.sp-megamenu-parent').addClass('hidden-sm');

    //Sticky Menu
	$('#sp-top-bar, #sp-header').wrapAll( $('<div>').attr('id','sp-header-wrapper') );
	
    $(document).ready(function(){
        $("body.sticky-header").find('#sp-header-wrapper').sticky({topSpacing:0})
    });
	
	//offCanvas menu
	$('div.offcanvas-inner').find('ul.menu').attr('id','offcanvas-inner-menu');

	$('ul#offcanvas-inner-menu').find('li.parent >a').append('<i class="fa fa-angle-down menu-toggler"></i>');
	
	
	$(document).ready(function() {
			$('a').each(function(){
				if ($(this).attr('target') == undefined) {
				$('a').attr('target','_parent');
			}
		});
	});
	
	
	$('input').removeAttr("alt");
	
	//client showcase
	

    $(document).ready(function() {
     
      $(".showcase").owlCarousel({
     
          autoPlay: 3000, //Set AutoPlay to 3 seconds
		  loop:true,
          items : 4,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3]
     
      });
     
    });




	
	
    //Tooltip
    $('[data-toggle="tooltip"]').tooltip();
	
	//count to js instance
	$('.timer').countTo();
	
	//stellar js instantiation
	$(function(){
		$.stellar({
			horizontalScrolling: false,
			verticalOffset: 0,
		});
	});
	$('section.section-parallax').attr('data-stellar-background-ratio','0.3');
	
	//fix menu responsiveness
	$('ul.sp-megamenu-parent').addClass('hidden-sm');
	
	//	responsive classes
	
	$('div.sppb-col-sm-3').addClass('sppb-col-md-3 sppb-col-sm-6 sppb-xs-12').removeClass('sppb-col-sm-3');
	
	$('div.sppb-col-sm-4').addClass('sppb-col-md-4 sppb-col-sm-6 sppb-xs-12').removeClass('sppb-col-sm-4');
	$('div.sppb-col-md-4').addClass('sppb-col-sm-6');
	
	$('div.sppb-col-sm-7').addClass('sppb-col-md-7 sppb-col-sm-6').removeClass('sppb-col-sm-7');
	
	$('div.sppb-col-sm-5').addClass('sppb-col-md-5 sppb-col-sm-6').removeClass('sppb-col-sm-5');
	
	

			//image popup	
	$(document).ready(function() {
		$('.popup-gallery').magnificPopup({
				delegate: 'a',
				type: 'image',
				tLoading: 'Loading image #%curr%...',
				mainClass: 'mfp-img-mobile',
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
					titleSrc: function(item) {
						return item.el.attr('title') + '<small>image credits</small>';
					}
				}
			});
		});
		
		$(document).ready(function() {
			$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
				disableOn: 700,
				type: 'iframe',
				mainClass: 'mfp-fade',
				removalDelay: 160,
				preloader: false,

				fixedContentPos: false
			});
		});
	
	//end popup
	
	//charts
	$(function() {
		$('.chart').easyPieChart({
        //your configuration goes here
		lineWidth:9,
		trackColor:border_color,
		barColor:major_color,
		scaleColor:text_heading_color,
		lineCap:'butt',
		animate:({ duration: 7000, enabled: true })
    });
	});

	
    $(document).on('click', '.sp-rating .star', function(event) {
        event.preventDefault();

        var data = {
            'action':'voting',
            'user_rating' : $(this).data('number'),
            'id' : $(this).closest('.post_rating').attr('id')
        };

        var request = {
                'option' : 'com_ajax',
                'plugin' : 'helix3',
                'data'   : data,
                'format' : 'json'
            };

        $.ajax({
            type   : 'POST',
            data   : request,
            beforeSend: function(){
                $('.post_rating .ajax-loader').show();
            },
            success: function (response) {
                var data = $.parseJSON(response.data);

                $('.post_rating .ajax-loader').hide();

                if (data.status == 'invalid') {
                    $('.post_rating .voting-result').text('You have already rated this entry!').fadeIn('fast');
                }else if(data.status == 'false'){
                    $('.post_rating .voting-result').text('Somethings wrong here, try again!').fadeIn('fast');
                }else if(data.status == 'true'){
                    var rate = data.action;
                    $('.voting-symbol').find('.star').each(function(i) {
                        if (i < rate) {
                           $( ".star" ).eq( -(i+1) ).addClass('active');
                        }
                    });

                    $('.post_rating .voting-result').text('Thank You!').fadeIn('fast');
                }

            },
            error: function(){
                $('.post_rating .ajax-loader').hide();
                $('.post_rating .voting-result').text('Failed to rate, try again!').fadeIn('fast');
            }
        });
    });
	
	

});


