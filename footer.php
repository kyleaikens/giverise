<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GiveRise
 */

?>

	</div><!-- #content -->

	<footer class="site-footer">
		<div class="ctaContainer container-fluid">
			<span>Start Making a Difference Today</span>
			<a href="#" class="btn btnoutline">Start a FREE Online Protest</a>
		</div>

		<div class="container-fluid row">
			<div class="col-md-6">
				<p>© <?= date('Y'); ?> GiveRise, Inc.  All Rights Reserved.  
				<a href="#">Terms of Use</a> 
				<a href="#">Privacy Policy</a>
				<a href="#">Cookie Policy</a></p>
			</div>
			<div class="col-md-6">
				<div class="social">
					<a href="#"><img class="svg" src="<?php bloginfo('template_directory'); ?>/images/facebook.svg"></a>
					<a href="#"><img class="svg" src="<?php bloginfo('template_directory'); ?>/images/twitter.svg"></a>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->


<div class="modal_backdrop"></div>
<div class="login_modal">
	<a class="close_btn" href="#"><img class="svg" src="<?php bloginfo('template_directory'); ?>/images/close.svg"></a>
	
	<div class="login">
		<div class="logo_container">
			<img src="<?php bloginfo('template_directory'); ?>/images/logo_icon.jpg"/>
		</div>
		<a class="btn btn_facebook" href="http://giverise.roundrobinstudios.com/wp-login.php?loginFacebook=1&redirect=http://giverise.roundrobinstudios.com" onclick="window.location = 'http://giverise.roundrobinstudios.com/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;">Login With Facebook</a>
		<div class="divider">
			<strong>OR</strong> 
		</div>
		<div class="gform_wrapper">
		<form name="loginform" id="loginform" action="login" method="post">
		<div class="gform_body">
			<p class="status"></p>
			<ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
				<li id="field_1_3" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible">
					<label class="gfield_label" for="input_1_3">Email</label>
					<div class="ginput_container ginput_container_email">
		            	<input id="username" type="text" size="20" value="" name="username">
		        	</div>
		    	</li>
		    	<li id="field_1_3" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible">
					<label class="gfield_label" for="input_1_3">Password</label>
					<div class="ginput_container ginput_container_email">
		            	<input id="password" type="password" size="20" value="" name="password">
		        	</div>
		    	</li>
		    	<li id="field_3" class="gfield field_sublabel_below field_description_below hidden_label gfield_visibility_"><label class="gfield_label"></label><div class="ginput_container ginput_container_checkbox"><ul class="gfield_checkbox" id="input_3"><li class="gchoice_3_1">
					<input name="rememberme" type="checkbox" id="rememberme" value="forever">
					<span class="control-indicator"></span>&nbsp;<label for="choice_3_1" id="label_3_1">Remember Me</label>
				</li></ul></div></li>
			</ul>
			<div class="gform_footer top_label">
				<input id="submitlogin" type="submit" value="Login" class="button" name="submitlogin">
				<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
			</div>
		</div> <!-- end login form -->
		</form>
	</div>
		<div class="loginlinks">
			<span>Don't have an account? <a href="#" class="signuplink">Sign Up</a></span>
			<span><a href="/password-reset/" class="forgotpassword">Forgot your Password?</a></span>
		</div>
	</div>

	<div class="signup">
		<div class="logo_container">
			<img src="<?php bloginfo('template_directory'); ?>/images/logo_icon.jpg"/>
		</div>
		<a class="btn btn_facebook" href="http://giverise.roundrobinstudios.com/wp-login.php?loginFacebook=1&redirect=http://giverise.roundrobinstudios.com" onclick="window.location = 'http://giverise.roundrobinstudios.com/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;">Sign Up With Facebook</a>
		<div class="divider">
			<strong>OR</strong> 
		</div>
		<?= do_shortcode('[gravityform id=1 title=false description=false ajax=true]'); ?>
		
		<div class="loginlinks">
			<span>Already have an account? <a href="#" class="loginlink">Login</a></span>
		</div>
	</div>
</div>

<div class="donate_modal">
	<a class="close_btn" href="#"><img class="svg" src="<?php bloginfo('template_directory'); ?>/images/close.svg"></a>
	
	<div class="login">
		<p>Pledge Your Support To</p>
		<h2><? the_field('name'); ?></h2>

		<div class="donation_amount">
			<a href="#" class="btn donatebtn"><span>$10</span></a
			><a href="#" class="btn donatebtn active"><span>$20</span></a
			><a href="#" class="btn donatebtn"><span>$50</span></a
			><a href="#" class="btn donatebtn"><span>$100</span></a
			><a href="#" class="btn donatebtn hiddenbtn"><span>+</span></a
			><a href="#" class="btn donatebtn donateother"><p>$</p><input id="otheramount" placeholder="Enter Other Amount" type="text" size="20" value="" name="otheramount"><span><img class="svg" src="<?php bloginfo('template_directory'); ?>/images/close.svg"/></span></a>
		</div>
		<? $current_user = wp_get_current_user(); ?>
		<div class="tip_amount">
			 <p>We charge <strong>0%</strong> in fees & rely solely on the generosity of donors like you, <?= $current_user->first_name; ?>, to help support political activists across the globe.</p>

			 <div class="tip-p">Thank you for your <div><strong>15% <span>($3.00)</span></strong><i class="far fa-angle-down"></i>
			 		<ul>
			 			<li>10% <span>($2.00)</span></li> 
			 			<li class="active">15% <span>($3.00)</span></li> 
			 			<li>20% <span>($4.00)</span></li> 
			 			<li>Other</li> 
			 		</ul>
			 	</div> tip!</div>

		</div>

		<div class="payment_details">
			
		</div>

		<div class="donation_form gform_wrapper">
			<form name="donateform" id="panda_cc_form">
			<ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
				<li id="" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible displaynone">
					<label class="gfield_label" for="input_1_3">First Name</label>
					<div class="ginput_container ">
		            	<input id="first_name" type="text" size="20" value="f" name="first_name" data-panda="first_name">
		        	</div>
	        	</li>
	        	<li id="" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible displaynone">
					<label class="gfield_label" for="input_1_3">Last Name</label>
					<div class="ginput_container ">
		            	<input id="last_name" type="text" size="20" value="l" name="last_name" data-panda="last_name">
		        	</div>
	        	</li>
	        	<li id="" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible displaynone">
					<label class="gfield_label" for="input_1_3">Email</label>
					<div class="ginput_container ginput_container_email">
		            	<input id="email" type="text" size="20" value="" name="email">
		        	</div>
	        	</li>
	        	<li id="" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible">
					<label class="gfield_label" for="input_1_3">Name on Card</label>
					<div class="ginput_container ">
		            	<input id="nameoncard" type="text" size="20" value="" name="nameoncard">
		        	</div>
	        	</li>
	        	<li id="" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"  style="width: 50%; float: left; clear: none;">
					<label class="gfield_label" for="input_1_3">Credit Card Number</label>
					<div class="ginput_container ">
		            	<input id="nameoncard" type="text" size="20" value="" name="cardinfo" data-panda="credit_card">
		        	</div>
	        	</li>
	        	<li id="" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"  style="width: 25%; float: left; clear: none;">
					<label class="gfield_label" for="input_1_3">Expiration</label>
					<div class="ginput_container ">
		            	<input id="nameoncard" type="text" size="5" value="" name="expiration" data-panda="expiration">
		        	</div>
	        	</li>
	        	<li id="" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"  style="width: 25%; float: left; clear: none;">
					<label class="gfield_label" for="input_1_3">CVV</label>
					<div class="ginput_container ">
		            	<input id="nameoncard" type="text" size="4" value="" name="cvv" data-panda="cvv">
		        	</div>
	        	</li>
	        	<li id="donation_amount" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible">
					<label class="gfield_label" for="input_1_3">Donation Amount</label>
					<div class="ginput_container ">
		            	<input id="donation" type="text" size="20" value="23" name="donation">
		        	</div>
	        	</li>
	        	
			</ul>
			<div class="gform_footer top_label">
				<input id="submitdonation" type="submit" value="Donate $23" class="button" name="submitdonation">
				<p class="disclaimer">By clicking donate you agree to our Terms &amp; Privacy Policy.  All donations are sent directly to the activists choice of charity.</p>
			</div>

			<script>
			  // Call Panda.init() with your Panda Publishable Key and the DOM id of the
			  // credit card-related form element

			  Panda.init('pk_test_8ik86Pj2k6YMh1iI1CShYw', 'panda_cc_form');

			  Panda.on('success', function(cardToken) {
			    // You now have a token you can use to refer to that credit card later.
			    // This token is used in PandaPay API calls for creating donations and grants
			    // so that you don't have to worry about security concerns with dealing with
			    // credit card data. 
			    console.log(cardToken); 
			  });

			  Panda.on('error', function(errors) {
			    // errors is a human-readable list of things that went wrong
			    //  (invalid card number, missing last name, etc.)
			    console.log(errors);
			  });
			</script>
        	</form>
		</div>


	</div>

	
</div>
<?php wp_footer(); ?>

</body>
</html>
