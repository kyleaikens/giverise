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
	
			<h1>Create a New Protest</h1>		
			<h4>We work with 1000's of Charities across the globe to ensure your supporters donations go directly where it needs to go.</h4>
			<?= do_shortcode('[gravityform id=6 title=false description=false ajax=true tabindex=49 field_values=name='.$useremail.']'); ?>
			
		</div>

	</div>

<?php get_footer();