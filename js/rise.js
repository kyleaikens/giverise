jQuery(document).ready(function($) {
	
	/* PASSWORD RESET */
	$("#lostpasswordform label, #resetpasswordform label").click(function() {
	  	$(this).next().focus();
	  	return false;
	});

	$( "#lostpasswordform, #resetpasswordform" ).on( "focus", "input:not([type='submit'])", function() {
		$(this).prev().hide();
	});

	$( "#lostpasswordform, #resetpasswordform" ).on( "blur", "input:not([type='submit'])", function() {
		 if( $(this).val().length === 0 ) {
	        $(this).prev().fadeIn('400');
	    }
	});

	/*  LOGIN/SIGN UP MODAL */
	/******************************************************************************************************************************************************/
	
	$(".modal_backdrop, .close_btn").click(function() {
	  	$('body').removeClass('modal_open');
	  	$('body').removeClass('modal_open_donate');
	  	return false;
	});

	$(".signin").click(function() {
	  	$('body').addClass('modal_open');
	  	$('.login_modal .login').show();
	  	$('.login_modal .signup').hide();
	  	return false;
	});


	$(".signuplink").click(function() {
	  	$('.login_modal .login').hide();
	  	$('.login_modal .signup').show();
	  	return false;
	});

	$(".loginlink").click(function() {
	  	$('.login_modal .login').show();
	  	$('.login_modal .signup').hide();
	  	return false;
	});

	$('.gf_login_links').remove();

	$(".login label, .signup label").click(function() {
	  	//console.log($(this));
	  	$(this).next().children().first().focus();

	  	return false;
	});

	// LABEL FOR PASSWORD
	$(".login li div label, .signup li div label").click(function() {
	  	$(this).prev().focus();
	  	return false;
	});

	$( ".login" ).on( "focus", "input:not([type='submit'])", function() {
		$(this).parent().prev().addClass('active')
	});
	$( ".signup" ).on( "focus", "input:not([type=submit],[type=password])", function() {
		$(this).parent().prev().addClass('active')
	});
	$( ".login, .signup" ).on( "blur", "input:not([type='submit'])", function() {
		 if( $(this).val().length === 0 ) {
	        $(this).parent().prev().removeClass('active');
	    }
	});
	$( ".signup" ).on( "focus", "input[type=password]", function() {
		$(this).next().addClass('active')
	});

	$( ".signup" ).on( "blur", "input[type=password]", function() {
		 if( $(this).val().length === 0 ) {
	        $(this).next().removeClass('active');
	    }
	});

	$('.login input[type="checkbox"]').hide();
	$('.login input[type="checkbox"]').prop('checked', true);
	$( ".login" ).on( "click", ".control-indicator", function() {
	   $(this).toggleClass('unchecked');
	   $(this).prev().prop("checked", !$(this).prev().prop("checked"));
	});

	$(".gfield_checkbox li label").click(function() {
	  	$(this).prev().toggleClass('unchecked');
	});



	/* PROTEST CREATION FORM */
	/******************************************************************************************************************************************************/
	$(".img-uploader").click(function() {
	  	$('.hidden-picture input').click();
	  	return false;
	});

	function readURL(input) {
	  if (input.files && input.files[0]) {
		    var reader = new FileReader();

		    reader.onload = function(e) {
		      //$('#blah').attr('src', e.target.result);
		      $('.img-uploader').css('background-image', 'url("' + e.target.result + '")');
		      $('.img-uploader svg, .img-uploader p').addClass('opacity0');
		    }

		    reader.readAsDataURL(input.files[0]);
		  }
	}
	$('.hidden-picture input').change( function(){
  		readURL(this);
    });


    function validateEmail(email) {
	  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  return re.test(email);
	}

	function validate() {
	  var email = $("#input_2_18").val();
	  if (validateEmail(email)) {
	    console.log('valid');
	  } else {
	    console.log('not valid');
	    $('body').addClass('modal_open');
	  	$('.login_modal .login').hide();
	  	$('.login_modal .signup').show();
	  	return false;
	  } 
	  
	}

	$("#gform_submit_button_2").bind("click", validate);

	/* COPY TO CLIPBOARD */
	var clipboard = new Clipboard('.clipbtn');
	clipboard.on('success', function(e) {
	  $('.clipbtn').addClass('active');
	  setTimeout(function() {
	    $('.clipbtn').removeClass('active');
	  }, 1000);
	});




	/* PROTESTS INDIVIDUAL */
	/******************************************************************************************************************************************************/
	$(".donateContainer .amount a").click(function() {
	  	$('.amountDonate').each(function( index ) {
		  $(this).toggleClass('amountHidden'); 
		});
	  	return false;
	});

	/* Progress Bar Animation */
	setTimeout(function(){

	$(".donationProgressBar .bar").css("width",$(".donationProgressBar .bar").data("percentage") + "%");  


	$('.donationProgressBar .bar').each(function() {
		var $this = $(this),
		  countTo = $this.attr('data-percentage');

		$({ countNum: $this.find('span').text()}).animate({
		countNum: countTo
		},

		{
		duration: 1000,
		easing:'linear',
		step: function() {
		  $this.find('span').text(Math.floor(this.countNum)+"%");
		},
		complete: function() {
		  $this.find('span').text(this.countNum+"%");
		  //alert('finished');
		}

		});  

	});

	}, 500);  //END TIMEOUT DELAY


	/* DONATE MODAL */
	/*****************************************************************/
	$('.donatebtn.hiddenbtn').click(false);

	$(".supportbtn").click(function() {
	  	$('body').addClass('modal_open_donate');
	  	return false;
	});

	$(".donation_amount .btn:not('.donateother')").click(function() {
		$(".donation_amount .btn").removeClass('active');
		$(this).addClass('active');

		//Calculate Tips
		var percentage10 = $(this).text().replace('$', '') * .1;
		var percentage15 = $(this).text().replace('$', '') * .15;
		var percentage20 = $(this).text().replace('$', '') * .2;
		$('.tip-p li:eq(0) span').html(  "($" + percentage10.toFixed(2) + ")"  );
		$('.tip-p li:eq(1) span').html(  "($" + percentage15.toFixed(2) + ")"  );
		$('.tip-p li:eq(2) span').html(  "($" + percentage20.toFixed(2) + ")"  );

		//change current tip amount
		$(".tip-p div strong").html(  $('.tip-p li.active').html() );

		//Calculate Total Donations
		var donateTotal = parseFloat($(this).text().replace('$', '')) + parseFloat($('.tip-p li.active span').text().replace(/[$()]/g,''));

		$('input#donation').val( donateTotal );
		$('#submitdonation').val( "Donate $"+donateTotal.toFixed(2));
		$('#otheramount').val('');

	  	return false;
	});

	//donation other text input
	$(".donation_amount .donateother span").click(function() {
		//$(".donation_amount .donateother").addClass('active');
		$(".donation_amount .donateother").toggleClass('open');

		//input empty checks
		if( !$(".donation_amount .donateother.active #otheramount").val() ) {
			$(".donation_amount .donateother").removeClass('active');
		}

	  	return false;
	});



	$(".donation_amount .donateother:not('.active') span").click(function() {
		setTimeout(function(){
			$('#otheramount').get(0).focus();
		}, 200); //end timeout delay

		return false;
	});

	$.fn.digits = function(){ 
	    return this.each(function(){ 
	        $(this).val( $(this).val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
	    })
	}

	$('#otheramount').on('input', function() {
		$('input#donation').val( $(this).val() );
    	$('#submitdonation').val("Donate $"+$(this).val());
    	$('#submitdonation').digits();

    	$(".donation_amount .btn:not('.donateother')").removeClass('active'); 
    	$(".donation_amount .btn.donateother").addClass('active'); 


    	//Calculate Tips
		var percentage10 = $(this).val().replace('$', '') * .1;
		var percentage15 = $(this).val().replace('$', '') * .15;
		var percentage20 = $(this).val().replace('$', '') * .2;
		$('.tip-p li:eq(0) span').html(  "($" + percentage10.toFixed(2) + ")"  );
		$('.tip-p li:eq(1) span').html(  "($" + percentage15.toFixed(2) + ")"  );
		$('.tip-p li:eq(2) span').html(  "($" + percentage20.toFixed(2) + ")"  );

		//change current tip amount
		$(".tip-p div strong").html(  $('.tip-p li.active').html() );

    	//update the total donations
    	var donateTotal = parseFloat($('#otheramount').val().replace('$', '')) + parseFloat($('.tip-p li.active span').text().replace(/[$()]/g,''));

		$('input#donation').val( donateTotal );
		$('#submitdonation').val( "Donate $"+donateTotal.toFixed(2));
		

	});

	$('.donateother').on('keydown', 'input', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});



	//tip dropdown
	$(".tip-p div").click(function() {
	  	$("ul", this).addClass('active');
	  	return false;
	});

	$(".tip-p div ul li").click(function() {
	  	$(".tip-p div ul, .tip-p div ul li").removeClass('active');
	  	$(this).addClass('active');
	  	$(".tip-p div strong").html($(this).html());

	  	//update donations

	  	if( !$(".donation_amount #otheramount").val() ) {
			var donateTotal = parseFloat($('.donation_amount .btn.active').text().replace('$', '')) + parseFloat($('.tip-p li.active span').text().replace(/[$()]/g,''));
			$('input#donation').val( donateTotal );
			$('#submitdonation').val( "Donate $"+donateTotal.toFixed(2));
		} else {
			var donateTotal = parseFloat($('#otheramount').val().replace('$', '')) + parseFloat($('.tip-p li.active span').text().replace(/[$()]/g,''));
			$('input#donation').val( donateTotal );
			$('#submitdonation').val( "Donate $"+donateTotal.toFixed(2));
		}
		


	  	return false;
	});




	/* TABS */
	$('#tabs-nav li:first-child').addClass('active');
	$('.tab-content').hide();
	$('.tab-content:first').show();

	// Click function
	$('#tabs-nav li').click(function(){
		$('#tabs-nav li').removeClass('active');
		$(this).addClass('active');
		$('.tab-content').hide();

		var activeTab = $(this).find('a').attr('href');
		$(activeTab).fadeIn();
		return false;
	});

	//Hover function
	$('.underbar').css("width",$('#tabs-nav li.active').width());  
	$("#tabs-nav li a").hover(
		function() {
			var distance = $(this).position().left;
			$('.underbar').css("width",$(this).width());  
			$('.underbar').css("left",distance);  	
	},  function() {
			$('.underbar').css("width",$('#tabs-nav li.active').width());  
			$('.underbar').css("left",$('#tabs-nav li.active').position().left);  
	});


	/* COPY CLIPBOARD */
	/*****************************************************************/
	var clipboard = new Clipboard('.clipbtn');
	clipboard.on('success', function(e) {
	  $('.clipbtn').addClass('active');
	  setTimeout(function() {
	    $('.clipbtn').removeClass('active');
	  }, 1000);
	});


	//CLICK NON-TAB
	/*****************************************************************/
	$('.moredonors').click(function(){
		$('#tabs-nav li').removeClass('active');
		$('#tabs-nav li:nth-child(3)').addClass('active').click();
		$('.underbar').css("width",$('#tabs-nav li.active').width());  
		$('.underbar').css("left",$('#tabs-nav li.active').position().left);  
		return false;
	});


	// WAYPOINTS
	/*****************************************************************/
	$.fn.isTopViewport = function() {
	  var elementTop = $(this).offset().top;
	  var elementBottom = elementTop + $(this).outerHeight();

	  var viewportTop = $(window).scrollTop();
	  var viewportBottom = viewportTop + $(window).height();

	  return elementTop < viewportTop && elementBottom > viewportBottom;
	  //return elementBottom > viewportTop && elementTop < viewportBottom;
	};

	$.fn.isBtmViewport = function() {
	  var elementTop = $(this).offset().top;
	  var elementBottom = elementTop + $(this).outerHeight();

	  var viewportTop = $(window).scrollTop();
	  var viewportBottom = viewportTop + $(window).height();

	  //return elementBottom > viewportTop && elementTop < viewportBottom;
	  return elementBottom < viewportBottom;
	};

	$(window).on('resize scroll', function() {
		$('.exploreContainer').each(function() {
 
		console.log(($(this).offset().top + $(this).outerHeight()) + " " + ($(window).scrollTop()+$(window).height()))

			if ($(this).isTopViewport()) {
				$('.exploreBg').css('top', '0').css('bottom', 'auto');
			  	$('.exploreBg').addClass('fixed');
			  	$('.topMask, .btmMask').addClass('active');
			} else if ($(this).isBtmViewport()) {
			    $('.exploreBg').css('top', 'auto').css('bottom', '0px' );
			    $('.exploreBg').removeClass('fixed');
			    $('.topMask, .btmMask').removeClass('active');
			} else {
				$('.exploreBg').css('top', '0').css('bottom', 'auto');
			    $('.exploreBg').removeClass('fixed');
			    $('.topMask, .btmMask').removeClass('active');
			}
  
	  	});
	}); 

	/*var waypoints = $('.exploreContainer').waypoint(function(direction) {
	    $('.exploreBg').toggleClass('fixed');
	    $('.btmMask, .topMask').toggleClass('active');
	    //$('.exploreBg').css('top', '0')
	}, {
	  offset: '75px'
	})  

	var waypoints = $('.stickyProtests').waypoint(function(direction) {
		var scrollpx = $(document).scrollTop() - $('header').outerHeight() - $('.heroContainer').outerHeight() - $('.homeIntro').outerHeight() - 75;
	    $('.exploreBg').toggleClass('fixed');
	    $('.btmMask, .topMask').toggleClass('active');

	    if (direction === 'up') {
	    	$('.exploreBg').css('top', '0')
	    } else {
	   		$('.exploreBg').css('top', scrollpx)
	   	}

	}, {
	  offset: -($('.stickyProtestsContainer ').outerHeight() - ($(window).outerHeight()+140))
	})*/



	/* IMG TO SVG FUNCTION */
	/*****************************************************************/
	
	$('img.svg').each(function(){
	    var $img = jQuery(this);
	    var imgID = $img.attr('id');
	    var imgClass = $img.attr('class');
	    var imgURL = $img.attr('src');

	    jQuery.get(imgURL, function(data) {
	        // Get the SVG tag, ignore the rest
	        var $svg = jQuery(data).find('svg');
	        // Add replaced image's ID to the new SVG
	        if(typeof imgID !== 'undefined') {
	            $svg = $svg.attr('id', imgID);
	        }
	        // Add replaced image's classes to the new SVG
	        if(typeof imgClass !== 'undefined') {
	            $svg = $svg.attr('class', imgClass+' replaced-svg');
	        }
	        // Remove any invalid XML tags as per http://validator.w3.org
	        $svg = $svg.removeAttr('xmlns:a');
	        // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
	        if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
	            $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
	        }
	        // Replace image with new SVG
	        $img.replaceWith($svg);
	    }, 'xml');

	});


});

