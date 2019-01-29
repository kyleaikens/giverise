<?php
/**
 * GiveRise functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GiveRise
 */

if ( ! function_exists( 'giverise_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */ 
	function giverise_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on GiveRise, use a find and replace
		 * to change 'giverise' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'giverise', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'giverise' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'giverise_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'giverise_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function giverise_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'giverise_content_width', 640 );
}
add_action( 'after_setup_theme', 'giverise_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function giverise_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'giverise' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'giverise' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'giverise_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wegiverise_scripts() {
	$rand = rand( 1, 99999999999 );
	wp_enqueue_style( 'giverise-style', get_stylesheet_uri(), '', $rand );
	wp_enqueue_style( 'fontawesome-all', get_template_directory_uri() . '/assets/fontawesome/css/all.css', '', $rand );
	
	wp_enqueue_script( 'giverise-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'giverise-waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array(), null, false);
	wp_enqueue_script( 'giverise-customjs', get_template_directory_uri() . '/js/rise.js', array(), $rand, false);
	wp_enqueue_script( 'giverise-clipboard', get_template_directory_uri() . '/js/clipboard.min.js', array(), null, false);
	wp_enqueue_script( 'giverise-pandapay', '//d2t45z63lq9zlh.cloudfront.net/panda-v0.0.5.min.js', array(), null, false);
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', 'wegiverise_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/**
 *  Custom Functions
 */
//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );
add_filter('show_admin_bar', '__return_false');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


//CUSTOM VALIDATION 
add_filter( 'gform_validation_message', 'change_message', 10, 2 );
function change_message( $message, $form ) {
    return "<div class='gform_error'>Please enter the required information</div>";
}

/**
 *  //AUTO LOGIN AFTER REGISTRATION
 */
add_action( 'gform_user_registered', 'vc_gf_registration_autologin',  10, 4 );
function vc_gf_registration_autologin( $user_id, $user_config, $entry, $password ) {
	$user = get_userdata( $user_id );
	$user_login = $user->user_login;
	$user_password = $password;
	wp_signon( array(
		'user_login' => $user_login,
		'user_password' =>  $user_password,
		'remember' => true
	) );
}

//DISABLE ANCHOR ON REGISTRATION FORM MODAL
add_filter( 'gform_confirmation_anchor_1', '__return_false' );

/**
 *  LOGIN FUNCTION
 */
function ajax_login_init(){

    wp_register_script('ajax-login-script', get_template_directory_uri() . '/ajax-login-script.js', array('jquery') ); 
    wp_enqueue_script('ajax-login-script');

    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
        'ajaxurl' => admin_url('admin-ajax.php'),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Invalid Username or Password')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}

function ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );

    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Invalid Username or Password')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('')));
    }

    die();
}



/**
 * Redirect to the custom login page
 */
function cubiq_login_init () {
	$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'login';

	if ( isset( $_POST['wp-submit'] ) ) {
		$action = 'post-data';
	} else if ( isset( $_GET['reauth'] ) ) {
		$action = 'reauth';
	}

	// redirect to change password form
	if ( $action == 'rp' || $action == 'resetpass' ) {
		if( isset($_GET['key']) && isset($_GET['login']) ) {
			$rp_path = wp_unslash(home_url('/password-reset/'));
			$rp_cookie	= 'wp-resetpass-' . COOKIEHASH;
			$value = sprintf( '%s:%s', wp_unslash( $_GET['login'] ), wp_unslash( $_GET['key'] ) );
			setcookie( $rp_cookie, $value, 0, $rp_path, COOKIE_DOMAIN, is_ssl(), true );
		}
		
		wp_redirect( home_url('/password-reset/?action=resetpass&key=' . $_GET['key']) );
		exit;
	}

	// redirect from wrong key when resetting password
	if ( $action == 'lostpassword' && isset($_GET['error']) && ( $_GET['error'] == 'expiredkey' || $_GET['error'] == 'invalidkey' ) ) {
		wp_redirect( home_url( '/password-reset/?action=forgot&failed=wrongkey' ) );
		exit;
	}

	if (
		$action == 'post-data'		||			// don't mess with POST requests
		$action == 'reauth'			||			// need to reauthorize
		$action == 'logout'						// user is logging out
	) {
		return;
	}

	wp_redirect( home_url( '/password-reset/' ) );
	exit;
}
add_action('login_init', 'cubiq_login_init');


/**
 * Redirect logged in users to the right page
 */
function cubiq_template_redirect () {
	if ( is_page( 'login' ) && is_user_logged_in() ) {
		wp_redirect( home_url( '/user/' ) );
		exit();
	}

	if ( is_page( 'user' ) && !is_user_logged_in() ) {
		wp_redirect( home_url( '/password-reset/' ) );
		exit();
	}
}
add_action( 'template_redirect', 'cubiq_template_redirect' );


/**
 * Prevent subscribers to access the admin
 */
function cubiq_admin_init () {

	if ( current_user_can( 'subscriber' ) && !defined( 'DOING_AJAX' ) ) {
		wp_redirect( home_url('/user/') );
		exit;
	}

}
add_action( 'admin_init', 'cubiq_admin_init' );


/**
 * Registration page redirect
 */
function cubiq_registration_redirect ($errors, $sanitized_user_login, $user_email) {

	// don't lose your time with spammers, redirect them to a success page
	if ( !isset($_POST['confirm_email']) || $_POST['confirm_email'] !== '' ) {

		wp_redirect( home_url('/password-reset/') . '?action=register&success=1' );
		exit;

	}

	if ( !empty( $errors->errors) ) {
		if ( isset( $errors->errors['username_exists'] ) ) {

			wp_redirect( home_url('/password-reset/') . '?action=register&failed=username_exists' );

		} else if ( isset( $errors->errors['email_exists'] ) ) {

			wp_redirect( home_url('/password-reset/') . '?action=register&failed=email_exists' );

		} else if ( isset( $errors->errors['invalid_username'] ) ) {

			wp_redirect( home_url('/password-reset/') . '?action=register&failed=invalid_username' );
			
		} else if ( isset( $errors->errors['invalid_email'] ) ) {
+
+			wp_redirect( home_url('/password-reset/') . '?action=register&failed=invalid_email' );

		} else if ( isset( $errors->errors['empty_username'] ) || isset( $errors->errors['empty_email'] ) ) {

			wp_redirect( home_url('/password-reset/') . '?action=register&failed=empty' );

		} else {

			wp_redirect( home_url('/password-reset/') . '?action=register&failed=generic' );

		}

		exit;
	}

	return $errors;

}
add_filter('registration_errors', 'cubiq_registration_redirect', 10, 3);


/**
 * Login page redirect

function cubiq_login_redirect ($redirect_to, $url, $user) {

	if ( !isset($user->errors) ) {
		return $redirect_to;
	}

	wp_redirect( home_url('/password-reset/') . '?action=login&failed=1');
	exit;

}
add_filter('login_redirect', 'cubiq_login_redirect', 10, 3);
 */

/**
 * Password reset redirect
 */
function cubiq_reset_password () {
	$user_data = '';

	if ( !empty( $_POST['user_login'] ) ) {
		if ( strpos( $_POST['user_login'], '@' ) ) {
			$user_data = get_user_by( 'email', trim($_POST['user_login']) );
		} else {
			$user_data = get_user_by( 'login', trim($_POST['user_login']) );
		}
	}

	if ( empty($user_data) ) {
		wp_redirect( home_url('/password-reset/') . '?action=forgot&failed=1' );
		exit;
	}
}
add_action( 'lostpassword_post', 'cubiq_reset_password');


/**
 * Validate password reset
 */
function cubiq_validate_password_reset ($errors, $user) {
	// passwords don't match
	if ( $errors->get_error_code() ) {
		wp_redirect( home_url('/password-reset/?action=resetpass&failed=nomatch') );
		exit;
	}

	// wp-login already checked if the password is valid, so no further check is needed
	if ( !empty( $_POST['pass1'] ) ) {
		reset_password($user, $_POST['pass1']);

		wp_redirect( home_url('/password-reset/?action=resetpass&success=1') );
		exit;
	}

	// redirect to change password form
	wp_redirect( home_url('/password-reset/?action=resetpass') );
	exit;
}
add_action('validate_password_reset', 'cubiq_validate_password_reset', 10, 2);


add_filter( 'gform_submit_button_2', 'add_paragraph_below_submit', 10, 2 );
function add_paragraph_below_submit( $button, $form ) {
 
    return $button .= "<p class='small submit-text'>Don't worry, you can make changes later.</p>";
}

add_filter('gform_date_max_year', 'change_max_year');
function change_max_year($max_year) {
    return date('Y') + 5;
}
add_filter('gform_date_min_year', 'change_min_year');
function change_min_year($min_year) {
    return date('Y');
}

function create_protest_desc( $mce_buttons ) {
    $mce_buttons = array( 'formatselect', 'bold', 'italic', 'bullist');
    return $mce_buttons;
}
add_filter( 'gform_rich_text_editor_buttons', 'create_protest_desc', 10, 6 );