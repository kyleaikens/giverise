<?php 
	global $current_user; 
	wp_get_current_user(); 
	$username = $current_user->user_firstname . '%20' . $current_user->user_lastname;
	$useremail = $current_user->user_email;
	get_header();
?>

	<div class="row row-eq-height">
		<div class="col-md-4 join-cover">

		</div>
		<div class="col-md-7 container-padding joincontainer">
	
			<h1>Join a Protest</h1>		
			<h4>Money Talks. Raise funds for the issues you care about &amp; start making a difference now!</h4>
			<?= do_shortcode('[gravityform id=2 title=false description=false ajax=true tabindex=49 field_values=name='.$useremail.']'); ?>
			
		</div>

	</div>

<?php get_footer();