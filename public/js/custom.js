
(function (jQuery) {
	"use strict";
	jQuery(document).ready(function() {

		function activaTab(pill) {
			jQuery(pill).addClass('active show');
		}



		/*---------------------------------------------------------------------
			Sticky Header Animation & Height
		----------------------------------------------------------------------- */
		function headerHeight() {
			var height = jQuery("#main-header").height();
			jQuery('.iq-height').css('height', height + 'px');
		}
		jQuery(function() {
			var header = jQuery("#main-header"),
				yOffset = 0,
				triggerPoint = 80;

			headerHeight();

			jQuery(window).resize(headerHeight);
			jQuery(window).on('scroll', function() {

				yOffset = jQuery(window).scrollTop();

				if (yOffset >= triggerPoint) {
					header.addClass("menu-sticky animated slideInDown");
				} else {
					header.removeClass("menu-sticky animated slideInDown");
				}

			});
		});
		
		/*---------------------------------------------------------------------
			Back to Top
		---------------------------------------------------------------------*/
		var btn = $('#back-to-top');
		$(window).scroll(function () {
			if ($(window).scrollTop() > 50) {
				btn.addClass('show');
			} else {
				btn.removeClass('show');
			}
		});
		btn.on('click', function (e) {
			e.preventDefault();
			$('html, body').animate({ scrollTop: 0 }, '300');
		});

		$('.setbg').each(function () {
			var bg = $(this).data('setbg');
			$(this).css('background-image', 'url(' + bg + ')');
		});

		/*---------------------------------------------------------------------
			Header Menu Dropdown
		---------------------------------------------------------------------*/
		jQuery('[data-toggle=more-toggle]').on('click', function() {
			jQuery(this).next().toggleClass('show');
		});

		jQuery(document).on('click', function(e) {
			let myTargetElement = e.target;
			let selector, mainElement;
			if (jQuery(myTargetElement).hasClass('search-toggle') || jQuery(myTargetElement).parent().hasClass('search-toggle') || jQuery(myTargetElement).parent().parent().hasClass('search-toggle')) {
				if (jQuery(myTargetElement).hasClass('search-toggle')) {
					selector = jQuery(myTargetElement).parent();
					mainElement = jQuery(myTargetElement);
				} else if (jQuery(myTargetElement).parent().hasClass('search-toggle')) {
					selector = jQuery(myTargetElement).parent().parent();
					mainElement = jQuery(myTargetElement).parent();
				} else if (jQuery(myTargetElement).parent().parent().hasClass('search-toggle')) {
					selector = jQuery(myTargetElement).parent().parent().parent();
					mainElement = jQuery(myTargetElement).parent().parent();
				}
				if (!mainElement.hasClass('active') && jQuery(".navbar-list li").find('.active')) {
					jQuery('.navbar-right li').removeClass('iq-show');
					jQuery('.navbar-right li .search-toggle').removeClass('active');
				}

				selector.toggleClass('iq-show');
				mainElement.toggleClass('active');

				e.preventDefault();
			} else if (jQuery(myTargetElement).is('.search-input')) {} else {
				jQuery('.navbar-right li').removeClass('iq-show');
				jQuery('.navbar-right li .search-toggle').removeClass('active');
			}
		});

		/*---------------------------------------------------------------------
			Slick Slider
		----------------------------------------------------------------------- */
		$('#home-slider').slick({
			autoplay: false,
			speed: 800,
			lazyLoad: 'progressive',
			arrows: true,
			dots: false,
			prevArrow: '<div class="slick-nav prev-arrow"><i></i><svg><use xlink:href="#circle"></svg></div>',
			nextArrow: '<div class="slick-nav next-arrow"><i></i><svg><use xlink:href="#circle"></svg></div>',
			responsive: [
				{
					breakpoint: 992,
					settings: {
						dots: true,
						arrows: false,
					}
				}
			]
		}).slickAnimation();
		$('.slick-nav').on('click touch', function (e) {

			e.preventDefault();

			var arrow = $(this);

			if (!arrow.hasClass('animate')) {
				arrow.addClass('animate');
				setTimeout(() => {
					arrow.removeClass('animate');
				}, 1600);
			}

		});
		jQuery('.favorites-slider').slick({
			dots: false,
			arrows: false,
			infinite: true,
			speed: 300,
			autoplay: false,
			slidesToShow: 4,
			slidesToScroll: 1,
			responsive: [
			{
				breakpoint: 1200,
				settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
				dots: true
				}
			},
			{
				breakpoint: 768,
				settings: {
				slidesToShow: 2,
				slidesToScroll: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
				slidesToShow: 1,
				slidesToScroll: 1
				}
			}
			]
		});

		jQuery('#top-ten-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			asNavFor: '#top-ten-slider-nav',
			responsive: [
			{
				breakpoint: 992,
				settings: {
				asNavFor: false,
				arrows: true,
				nextArrow: '<button class="NextArrow"><i class="ri-arrow-right-s-line"></i></button>',
				prevArrow: '<button class="PreArrow"><i class="ri-arrow-left-s-line"></i></button>',
				}
			}
			]
		});
		jQuery('#top-ten-slider-nav').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			asNavFor: '#top-ten-slider',
			dots: false,
			arrows: true,
			infinite: true,
			vertical:true,
			verticalSwiping: true,
			centerMode: false,
			nextArrow:'<button class="NextArrow"><i class="ri-arrow-down-s-line"></i></button>',
			prevArrow:'<button class="PreArrow"><i class="ri-arrow-up-s-line"></i></button>',
			focusOnSelect: true,
			responsive: [		    
				{
				breakpoint: 1200,
				settings: {
					slidesToShow: 2,
				}
				},
				{
					breakpoint: 600,
					settings: {
						asNavFor: false,
					}
				},
			]
		});

		jQuery('#episodes-slider2').slick({
			dots: false,
			arrows: true,
			infinite: true,
			speed: 300,
			autoplay: false,
			slidesToShow: 4,
			slidesToScroll: 1,
			responsive: [
			{
				breakpoint: 1024,
				settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
				dots: true,
				}
			},
			{
				breakpoint: 600,
				settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				}
			},
			{
				breakpoint: 480,
				settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				}
			}
			]
		});

		jQuery('#episodes-slider3').slick({
			dots: false,
			arrows: true,
			infinite: true,
			speed: 300,
			autoplay: false,
			slidesToShow: 4,
			slidesToScroll: 1,
			responsive: [
			{
				breakpoint: 1024,
				settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
				dots: true,
				}
			},
			{
				breakpoint: 600,
				settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				}
			},
			{
				breakpoint: 480,
				settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				}
			}
			]
		});

		jQuery('#trending-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,		 
			arrows: false,
			fade: true,
			asNavFor: '#trending-slider-nav',	
		});
		jQuery('#trending-slider-nav').slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			asNavFor: '#trending-slider',
			dots: false,
			arrows: false,
			infinite: true,
			centerMode: true,
			centerPadding:0,
			focusOnSelect: true,
			responsive: [
			{
				breakpoint: 1024,
				settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				}
			},
			{
				breakpoint: 600,
				settings: {
				slidesToShow: 1,
				slidesToScroll: 1
				}
			}
			]
		});
		
		jQuery('#tvshows-slider').slick({
			centerMode: true,
			centerPadding: '200px',
			slidesToShow: 1,
			nextArrow: '<button class="NextArrow"><i class="ri-arrow-right-s-line"></i></button>',
			prevArrow: '<button class="PreArrow"><i class="ri-arrow-left-s-line"></i></button>',
			arrows:true,
			dots:false,
			responsive: [
				{
					breakpoint: 991,
					settings: {
						arrows: false,
						centerMode: true,
						centerPadding: '20px',
						slidesToShow: 1
					}
				},
				{
					breakpoint: 480,
					settings: {
						arrows: false,
						centerMode: true,
						centerPadding: '20px',
						slidesToShow: 1
					}
				}
			]
		});

		/*---------------------------------------------------------------------
			Owl Carousel
		----------------------------------------------------------------------- */
		jQuery('.episodes-slider1').owlCarousel({
			loop:true,
			margin:20,
			nav:true,
			navText: ["<i class='ri-arrow-left-s-line'></i>", "<i class='ri-arrow-right-s-line'></i>"],
			dots:false,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1000:{
					items:4
				}
			}
		});
		
		/*---------------------------------------------------------------------
			Page Loader
		----------------------------------------------------------------------- */
		jQuery("#load").fadeOut();
		jQuery("#loading").delay(0).fadeOut("slow");
		
		jQuery('.widget .fa.fa-angle-down, #main .fa.fa-angle-down').on('click', function () {
			jQuery(this).next('.children, .sub-menu').slideToggle();
		});

		/*---------------------------------------------------------------------
		Mobile Menu Overlay
		----------------------------------------------------------------------- */
		jQuery(document).on("click", function(event){
	    var $trigger = jQuery(".main-header .navbar");
	    if($trigger !== event.target && !$trigger.has(event.target).length){
			jQuery(".main-header .navbar-collapse").collapse('hide');
			jQuery('body').removeClass('nav-open');
	    }            
		});
		jQuery('.c-toggler').on("click", function(){
			jQuery('body').addClass('nav-open');
		}); 

		/*---------------------------------------------------------------------
		  Equal Height of Tab Pane
		-----------------------------------------------------------------------*/		
		jQuery('.trending-content').each(function () {			
			var highestBox = 0;			
			jQuery('.tab-pane', this).each(function () {				
				if (jQuery(this).height() > highestBox) {
					highestBox = jQuery(this).height();
				}
			});			 
			jQuery('.tab-pane', this).height(highestBox);
		}); 

		/*---------------------------------------------------------------------
	 		Active Class for Pricing Table
  	 	-----------------------------------------------------------------------*/
		jQuery("#my-table tr th").on("click", function (){
			jQuery('#my-table tr th').children().removeClass('active');
			jQuery(this).children().addClass('active');
			jQuery("#my-table td").each(function () {
				if (jQuery(this).hasClass('active')) {
					jQuery(this).removeClass('active')
				}
			});
			var col = jQuery(this).index();
			jQuery("#my-table tr td:nth-child(" + parseInt(col + 1) + ")").addClass('active');
		});
		
		/*---------------------------------------------------------------------
			Select 2 Dropdown
		-----------------------------------------------------------------------*/
		if (jQuery('select').hasClass('season-select')){
			jQuery('select').select2({
				theme: 'bootstrap4',
				allowClear: false,
				width: 'resolve'
			});
		}
		if (jQuery('select').hasClass('pro-dropdown')) {			
			jQuery('.pro-dropdown').select2({
				theme: 'bootstrap4',			
				minimumResultsForSearch: Infinity,			
				width: 'resolve'
			});	
			jQuery('#lang').select2({
				theme: 'bootstrap4',
				placeholder: 'Language Preference',
				allowClear: true,
				width: 'resolve'
			});
		}

		/*---------------------------------------------------------------------
			Video popup
		-----------------------------------------------------------------------*/
		jQuery('.video-open').magnificPopup({
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false,
			iframe: {
				markup: '<div class="mfp-iframe-scaler">' +
					'<div class="mfp-close"></div>' +
					'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
					'</div>',

				srcAction: 'iframe_src',
			}
		});

		/*---------------------------------------------------------------------
			Flatpicker
		-----------------------------------------------------------------------*/
		if (jQuery('.date-input').hasClass('basicFlatpickr')) {
			jQuery('.basicFlatpickr').flatpickr();
		}
		/*---------------------------------------------------------------------
			Custom File Uploader
		-----------------------------------------------------------------------*/
		jQuery(".file-upload").on("change", function () {
			! function (e) {
				if (e.files && e.files[0]) {
					var t = new FileReader;
					t.onload = function (e) {
						jQuery(".profile-pic").attr("src", e.target.result)
					}, t.readAsDataURL(e.files[0])
				}
			}(this)
		}), jQuery(".upload-button").on("click", function () {
			jQuery(".file-upload").click();
		});

		/*---------------------------------------------------------------------
    		Validacion
		  -----------------------------------------------------------------------*/
		  $("#register_form").validate({
			
				rules: {
					Nombre:{
					required: true,
					minlength: 2
				  },
				  Apellidos:{
					required: true,
					minlength: 2
				  },
				  Email:{
					required: true,
					email: true
				  },
				  city:{
					required: true,
					minlength: 2
				  },
				  chcek: {
					required: true
				  },
				  password: {
					required: true,
					minlength: 8
				  },
				  verifica: {
					required: true,
					minlength: 8,
					equalTo: "#password"
				  }
				  
				},
				messages: {
					Nombre: {
					 required: "El campo Nombre es obligatorio",
					 minlength: "El campo de Nombre no puede ser inferior a 2 caracteres"
				  },
				  Apellidos: {
					 required: "El campo Apellidos es obligatorio",
					 minlength: "El campo de Apellidos no puede ser inferior a 2 caracteres"
				  },
				  Email: "Debe poner una dirección de correo electronico valida",
				  
				  chcek: {
					required: "Debe aceptar las condiciones de uso antes de continuar"
				  },
				  
				},
	  
			 
			} );

			$("#profile").validate({
				rules: {
				  name : {
					required: true,
					minlength: 3
				  },
				  surname: {
					required: true,
					minlength: 3
				  },
				  pass: {
					  required: true,
					  minlength: 8
					},
				  email: {
					required: true,
					email: true
				  },
				  country: {
					  required: true,
					  minlength: 3
				  },
				  brid: {
					  required: true
				  },
					
				  plan: { 
					  required: true
					 
				  }
					 
				   
				},
				messages : {
				  name: {
					required: "El campo Nombre es obligatorio",
					minlength: "El Nombre debería tener al menos 3 caracteres"
				  },
				  surname: {
					required: "El campo Apellidos es obligatorio",
					minlength: "El Apellidos debería tener al menos 3 caracteres"
				  },
				  email: {
					required: "El campo Email es obligatorio",
					email: "El formato del email debe ser abc@domain.tld"
				  },
				  pass:{
					  required: "El campo Contraseña es obligatorio",
					  minlength: "El Contraseña debería tener al menos 8 caracteres"
				  },
				  country:{
					  required: "El campo Pais es obligatorio",
					  minlength: "El Pais debería tener al menos 3 caracteres"
				  },
				  brid:{
					  required: "El campo Fecha es obligatorio"
				  },
		  
				  plan: {
					required: "<br/>Debe elegir el plan del cliente."
				  }
				}
			  });

		  /*---------------------------------------------------------------------
    		Validacion de contraseña
		  -----------------------------------------------------------------------*/
			$('#password').keyup(function (e) {
				var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
				var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
				var enoughRegex = new RegExp("(?=.{6,}).*", "g");
				if (false == enoughRegex.test($(this).val())) {
					$('#passstrength').html('Very weak!');
					$('#password').removeClass();
					$('#password').addClass('border-left-0 Password1 border-md veryweak');
				} else if (strongRegex.test($(this).val())) {
					$('#passstrength').html('Strong!');
					$('#password').removeClass();
					$('#password').addClass('border-left-0 Password1 border-md strong');
				} else if (mediumRegex.test($(this).val())) {
					$('#passstrength').html('Medium!');
					$('#password').removeClass();
					$('#password').addClass('border-left-0 Password1 border-md medium');
				} else {
					$('#passstrength').html('Weak!');
					$('#password').removeClass();
					$('#password').addClass('border-left-0 Password1 border-md weak');
				}
				return true;
			});
			
	

			$(document).ready(function() {

				var readURL = function(input) {
					if (input.files && input.files[0]) {
						var reader = new FileReader();
			
						reader.onload = function (e) {
							$('.profile-pic').attr('src', e.target.result);
						}
				
						reader.readAsDataURL(input.files[0]);
					}
				}
				
			
				 $(".file-upload").on('change', function(){
					readURL(this);
				});
				
				$(".upload-button").on('click', function() {
				   $(".file-upload").click();
				}); 
			});

			$('.g-recaptcha').asyncReCAPTCHA({
				spinner: {
				attach: true,
				remove: true
				}
			});

			
	
	});
})(jQuery);