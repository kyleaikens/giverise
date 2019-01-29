jQuery(document).ready(function($) {

	// for lost password
	$("form#lostPasswordForm").submit(function(){
		var submit = $("div#lostPassword #wp-submit-lost"),
			message	= $("div#lostPassword #message"),
			contents = {
				action: 	'lostpass', //calls wp_ajax_nopriv_lostpass
				nonce: 		this.rs_user_lost_password_nonce.value,
				user_login:	this.user_login.value
			};

		// disable button onsubmit to avoid double submision
		submit.attr("disabled", "disabled").addClass('disabled');

		$.post( theme_ajax.url, contents, function( data ){
			submit.removeAttr("disabled").removeClass('disabled');

			// display return data
			message.html( data );
		});

		return false;
	});


	// for reset password
	$("form#resetPasswordForm").submit(function(){
		var submit = $("div#resetPassword #submit"),
			preloader = $("div#resetPassword #preloader"),
			message	= $("div#resetPassword #message"),
			contents = {
				action: 	'reset_pass',
				nonce: 		this.rs_user_reset_password_nonce.value,
				pass1:		this.pass1.value,
				pass2:		this.pass2.value,
				user_key:	this.user_key.value,
				user_login:	this.user_login.value
			};

		// disable button onsubmit to avoid double submision
		submit.attr("disabled", "disabled").addClass('disabled');

		// Display our pre-loading
		preloader.css({'visibility':'visible'});

		$.post( theme_ajax.url, contents, function( data ){
			submit.removeAttr("disabled").removeClass('disabled');

			// hide pre-loader
			preloader.css({'visibility':'hidden'});

			// display return data
			message.html( data );
		});

		return false;
	});

});