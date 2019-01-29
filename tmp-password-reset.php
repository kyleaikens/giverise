<?php 
	/*
	Template Name: Custom WordPress Password Reset
	*/

$action = !empty( $_GET['action'] ) && ($_GET['action'] == 'register' || $_GET['action'] == 'forgot' || $_GET['action'] == 'resetpass') ? $_GET['action'] : 'login';
$success = !empty( $_GET['success'] );
$failed = !empty( $_GET['failed'] ) ? $_GET['failed'] : false;

?>

<?php get_header(); ?>

<div class="row row-eq-height">
		<div class="col-md-4 split-cover">

		</div>
		<div class="col-md-7 container-padding split-container">
	<?php while ( have_posts() ) : the_post(); ?>



	<article id="page-<?php the_ID(); ?>" class="meta-box hentry">
		<div id="page-login" class="post-content page-login cf">

<?php if ( $action == 'forgot' && $success ): ?>

			<h1>Account Found</h1>
			<h4>Check your email for the instructions to get a new password.</h4>

<?php elseif ( $action == 'resetpass' && $success ): ?>

			<h1>Password Reset</h1>
			<h4>Your password has been updated.</h4>
			<p style="margin-top:40px;""><a class="btn signin" href="#"><span>Proceed to Login</span></a></p>

<?php else: ?>


			
<?php if ( $action == 'login' || $action == 'forgot' ): ?>
			<div id="tab-forgot" class="tab-content">

<?php if ( $action == 'forgot' && $failed ): ?>
			<div class="message-box message-error">
				<span class="icon-attention"></span>
				<?php if ( $failed == 'wrongkey' ): ?>
					The reset link is wrong or expired. Please check that you used the right reset link or request a new one.
				<?php else: ?>
					Sorry, we couldn't find an account with that email address.
				<?php endif; ?>
			</div>
<?php endif; ?>

				<h1>Reset Password</h1>
				<h4>Enter your email address &amp; we'll send you an email to reset your password.</h4>
				<div id="lostPassword">
					<form name="lostpasswordform" id="lostpasswordform" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" method="post">
						<p>
							<label for="user_login">Email Address</label>
							<input type="text" name="user_login" id="user_login" class="input" value="">
						</p>

						<input type="hidden" name="redirect_to" value="/password-reset/?action=forgot&amp;success=1">
						<p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Create New Password" /></p>
					</form>
				</div>
			</div>
<? endif; ?>

<?php if ( $action == 'resetpass' ): ?>

	<div id="tab-resetpass" class="tab-content">

	<?php if ( $failed ): ?>
			<div class="message-box message-error">
				<span class="icon-attention"></span>
				The passwords don't match. Please try again.
			</div>

	<?php endif; ?>

					<h1 class="entry-title">Reset Password</h1>
					<h4>Create a new password for your account</h4>
				

				<form name="resetpasswordform" id="resetpasswordform" action="<?php echo site_url('wp-login.php?action=resetpass', 'login_post') ?>" method="post">
					<p class="form-password">
						<label for="pass1">New Password</label>
						<input class="text-input" name="pass1" type="password" id="pass1">
					</p>

					<p class="form-password">
						<label for="pass2">Confirm Password</label>
						<input class="text-input" name="pass2" type="password" id="pass2">
					</p>

					<input type="hidden" name="redirect_to" value="/password-reset/?action=resetpass&amp;success=1">
					<?php
					$rp_key = '';
					$rp_cookie = 'wp-resetpass-' . COOKIEHASH;
					if ( isset( $_COOKIE[ $rp_cookie ] ) && 0 < strpos( $_COOKIE[ $rp_cookie ], ':' ) ) {
						list( $rp_login, $rp_key ) = explode( ':', wp_unslash( $_COOKIE[ $rp_cookie ] ), 2 );
					}
					?>
					<!--<input type="hidden" name="rp_key" value="<?php echo esc_attr( $rp_key ); ?>">-->
					<input type="hidden" name="rp_key" value="<?php echo esc_attr( $_GET['key'] ); ?>">
					<p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Get New Password" /></p>
				</form>
			</div>
<?php endif; ?>


<?php endif; ?>

		</div>
	</article>

	<?php endwhile; ?>

		</div>
	</div>


<?php get_footer(); ?>
