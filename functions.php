<?php

/*
-----------------------------------------------------------------------------------------------------
	Theme Setup
-----------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'retro_setup' ) ) :

	function retro_setup() {

		// Make theme available for translation.
		load_theme_textdomain( '90s-retro', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Enable selective refresh for Widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Enable support for Post Thumbnails.
		add_theme_support( 'post-thumbnails' );

		// Enable support for site title tag.
		add_theme_support( 'title-tag' );

		add_image_size( 'retro-featured-large', 1800, 1400, true ); // Large Featured Image.
		add_image_size( 'retro-featured-medium', 1200, 1200, true ); // Medium Featured Image.
		add_image_size( 'retro-featured-small', 640, 640, true ); // Small Featured Image.

		// Create Menus.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', '90s-retro' ),
			'social-menu' => esc_html__( 'Social Menu', '90s-retro' ),
		));

		// Custom Header.
		$defaults = array(
		'width'                 => 1800,
		'height'                => 480,
		'flex-height'           => true,
		'flex-width'            => true,
		'default-text-color'    => '333333',
		'header-text'           => false,
		'uploads'               => true,
		);
		add_theme_support( 'custom-header', $defaults );

		// Custom Background.
		$defaults = array(
		'default-color'          => '000000',
		'default-image'          => get_template_directory_uri() . '/images/background.png',
		);
		add_theme_support( 'custom-background', $defaults );
	}
endif; // End retro_setup.
add_action( 'after_setup_theme', 'retro_setup' );

/*
-------------------------------------------------------------------------------------------------------
	Admin Support Link
-------------------------------------------------------------------------------------------------------
*/

function retro_support_link() {
	global $submenu;
	$support_link = esc_url( 'https://organicthemes.com/support/' );
	$submenu['themes.php'][] = array( __( 'Theme Support', '90s-retro' ), 'manage_options', $support_link );
}
add_action( 'admin_menu', 'retro_support_link' );

/*
-------------------------------------------------------------------------------------------------------
	Admin Notice
-------------------------------------------------------------------------------------------------------
*/

/** Function retro_theme_admin_notice */
function retro_theme_admin_notice() {
	if ( ! PAnD::is_admin_notice_active( 'notice-90s-retro-30' ) ) {
		return;
	}
	?>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=246727095428680";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<script>window.twttr = (function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0],
		t = window.twttr || {};
		if (d.getElementById(id)) return t;
		js = d.createElement(s);
		js.id = id;
		js.src = "https://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js, fjs);

		t._e = [];
		t.ready = function(f) {
			t._e.push(f);
		};

		return t;
	}(document, "script", "twitter-wjs"));</script>

	<div data-dismissible="notice-90s-retro-30" class="notice updated is-dismissible">

		<p><?php printf( __( 'Thanks for choosing the 90s Retro theme! Enter your email to receive important updates and information from <a href="%1$s" target="_blank">Organic Themes</a>.', '90s-retro' ), 'https://organicthemes.com' ); ?></p>

		<div class="follows" style="overflow: hidden; margin-bottom: 12px;">

			<div id="mc_embed_signup" class="clear" style="float: left;">
				<form action="//organicthemes.us1.list-manage.com/subscribe/post?u=7cf6b005868eab70f031dc806&amp;id=c3cce2fac0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div id="mc_embed_signup_scroll">
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>
						<div class="mc-field-group" style="float: left;">
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
						</div>
						<div style="float: left; margin-left: 6px;"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
						<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_7cf6b005868eab70f031dc806_c3cce2fac0" tabindex="-1" value=""></div>
					</div>
				</form>
			</div>

			<div class="social-links" style="float: left; margin-left: 24px; margin-top: 4px;">
				<div class="fb-like" style="float: left;" data-href="https://www.facebook.com/OrganicThemes/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
				<div class="twitter-follow" style="float: left; margin-left: 6px;"><a class="twitter-follow-button" href="https://twitter.com/OrganicThemes" data-show-count="false">Follow @OrganicThemes</a></div>
			</div>

		</div>

	</div>

	<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
	<?php
}
add_action( 'admin_init', array( 'PAnD', 'init' ) );
add_action( 'admin_notices', 'retro_theme_admin_notice' );

require( get_template_directory() . '/includes/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php' );

/*
-------------------------------------------------------------------------------------------------------
	Category ID to Name
-------------------------------------------------------------------------------------------------------
*/

function retro_cat_id_to_name( $id ) {
	$cat = get_category( $id );
	if ( is_wp_error( $cat ) ) {
		return false; }
	return $cat->cat_name;
}

/*
-------------------------------------------------------------------------------------------------------
	Register Scripts
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'retro_enqueue_scripts' ) ) {
	function retro_enqueue_scripts() {

		// Enqueue Styles.
		wp_enqueue_style( 'retro-style', get_stylesheet_uri() );
		wp_enqueue_style( 'retro-style-mobile', get_template_directory_uri() . '/css/style-mobile.css', array( 'retro-style' ), '1.0' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( 'retro-style' ), '1.0' );

		// Enqueue Scripts.
		wp_enqueue_script( 'retro-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '20130729' );
		wp_enqueue_script( 'retro-hover', get_template_directory_uri() . '/js/hoverIntent.js', array( 'jquery' ), '20130729' );
		wp_enqueue_script( 'retro-superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery', 'retro-hover' ), '20130729' );
		wp_enqueue_script( 'retro-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery', 'retro-superfish', 'retro-fitvids' ), '20130729', true );
		wp_enqueue_script( 'retro-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20130729', true );

		// IE Conditional Scripts.
		global $wp_scripts;
		$wp_scripts->add_data( 'retro-html5shiv', 'conditional', 'lt IE 9' );

		// Load single scripts only on single pages.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'retro_enqueue_scripts' );

/*
-------------------------------------------------------------------------------------------------------
	Register Sidebars
-------------------------------------------------------------------------------------------------------
*/

function retro_widgets_init() {
	register_sidebar(array(
		'name' => esc_html__( 'Default Sidebar', '90s-retro' ),
		'id' => 'default-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="title">',
		'after_title' => '</h6>',
	));
	register_sidebar(array(
		'name' => esc_html__( 'Blog Sidebar', '90s-retro' ),
		'id' => 'blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="title">',
		'after_title' => '</h6>',
	));
}
add_action( 'widgets_init', 'retro_widgets_init' );

/*
-------------------------------------------------------------------------------------------------------
	Add Stylesheet To Visual Editor
-------------------------------------------------------------------------------------------------------
*/

add_action( 'widgets_init', 'retro_add_editor_styles' );
/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function retro_add_editor_styles() {
	add_editor_style( 'css/style-editor.css' );
}

/*
------------------------------------------------------------------------------------------------------
	Content Width
------------------------------------------------------------------------------------------------------
*/

if ( ! isset( $content_width ) ) { $content_width = 840; }

function retro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'retro_content_width', 840 );
}
add_action( 'after_setup_theme', 'retro_content_width', 0 );

/*
-------------------------------------------------------------------------------------------------------
	Comments Function
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'retro_comment' ) ) :
	function retro_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>
		<li class="post pingback">
		<p><?php esc_html_e( 'Pingback:', '90s-retro' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', '90s-retro' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
		break;
			default :
		?>
		<li <?php comment_class(); ?> id="<?php echo esc_attr( 'li-comment-' . get_comment_ID() ); ?>">

		<article id="<?php echo esc_attr( 'comment-' . get_comment_ID() ); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 72;
					if ( '0' != $comment->comment_parent ) {
						$avatar_size = 48; }

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s <br/> %2$s <br/>', '90s-retro' ),
							sprintf( '<span class="fn">%s</span>', wp_kses_post( get_comment_author_link() ) ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( esc_html__( '%1$s', '90s-retro' ), get_comment_date(), get_comment_time() )
							)
						);
						?>
					</div><!-- .comment-author .vcard -->
				</footer>

				<div class="comment-content">
					<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', '90s-retro' ); ?></em>
					<br />
				<?php endif; ?>
					<?php comment_text(); ?>
					<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', '90s-retro' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div><!-- .reply -->
					<?php edit_comment_link( esc_html__( 'Edit', '90s-retro' ), '<span class="edit-link">', '</span>' ); ?>
				</div>

			</article><!-- #comment-## -->

		<?php
		break;
		endswitch;
	}
endif; // Ends check for retro_comment().

/*
-------------------------------------------------------------------------------------------------------
	Custom Excerpt Length
-------------------------------------------------------------------------------------------------------
*/

function retro_excerpt_length( $length ) {
	return 38;
}
add_filter( 'excerpt_length', 'retro_excerpt_length', 999 );

function retro_excerpt_more( $more ) {
	return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">'. esc_html__( 'Read More', '90s-retro' ) .'</a>';
}
add_filter( 'excerpt_more', 'retro_excerpt_more' );

/*
-------------------------------------------------------------------------------------------------------
	Custom Page Links
-------------------------------------------------------------------------------------------------------
*/

function retro_wp_link_pages_args_prevnext_add( $args ) {
	global $page, $numpages, $more, $pagenow;

	if ( ! $args['next_or_number'] == 'next_and_number' ) {
		return $args; }

	$args['next_or_number'] = 'number'; // Keep numbering for the main part.
	if ( ! $more ) {
		return $args; }

	if ( $page -1 ) { // There is a previous page.
		$args['before'] .= _wp_link_page( $page -1 )
			. $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'; }

	if ( $page < $numpages ) { // There is a next page.
		$args['after'] = _wp_link_page( $page + 1 )
			. $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
			. $args['after']; }

	return $args;
}

add_filter( 'wp_link_pages_args', 'retro_wp_link_pages_args_prevnext_add' );

/*
-------------------------------------------------------------------------------------------------------
	Body Class
-------------------------------------------------------------------------------------------------------
*/

function retro_body_class( $classes ) {
	if ( is_singular() ) {
		$classes[] = 'retro-singular'; }

	if ( is_active_sidebar( 'right-sidebar' ) ) {
		$classes[] = 'retro-right-sidebar'; }

	if ( '' != get_theme_mod( 'background_image' ) ) {
		// This class will render when a background image is set
		// regardless of whether the user has set a color as well.
		$classes[] = 'retro-background-image';
	} else if ( ! in_array( get_background_color(), array( '', get_theme_support( 'custom-background', 'default-color' ) ) ) ) {
		// This class will render when a background color is set
		// but no image is set. In the case the content text will
		// Adjust relative to the background color.
		$classes[] = 'retro-relative-text';
	}

	return $classes;
}
add_action( 'body_class', 'retro_body_class' );

/*
-------------------------------------------------------------------------------------------------------
	Includes
-------------------------------------------------------------------------------------------------------
*/

require_once( get_template_directory() . '/includes/jetpack.php' );
require_once( get_template_directory() . '/includes/customizer.php' );
require_once( get_template_directory() . '/includes/typefaces.php' );
require_once( get_template_directory() . '/includes/plugin-activation.php' );
require_once( get_template_directory() . '/includes/plugin-activation-class.php' );
