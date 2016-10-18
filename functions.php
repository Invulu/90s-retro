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
	Admin Notice
-------------------------------------------------------------------------------------------------------
*/

function retro_admin_notice() {
	echo '<div class="updated"><p>';
	printf( __( 'Enjoying this rad theme!? Check out <a href="%1$s" target="_blank">more tubular WordPress themes</a> from the righteous folks at Organic Themes.', '90s-retro' ), 'http://organicthemes.com/themes/' );
	echo '</p></div>';
}
add_action( 'admin_notices', 'retro_admin_notice' );

if ( ! class_exists( 'Organic_Footer_Modifier' ) ) {
	function retro_admin_footer_notice() {
		echo '<div class="updated"><p>';
		printf( __( 'Want to remove or change those pesky footer credits? Get the <a href="%1$s" target="_blank">Footer Change Plugin</a> from Organic Themes! Use discount code <b>FOOTERSAVE10</b> to save $10!', '90s-retro' ), 'http://organicthemes.com/footer-change-plugin/' );
		echo '</p></div>';
	}
	add_action( 'admin_notices', 'retro_admin_footer_notice' );
}

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
		wp_enqueue_script( 'retro-html5shiv', get_template_directory_uri() . '/js/html5shiv.js' );
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
						printf( esc_html__( '%1$s <br/> %2$s <br/>', '90s-retro' ),
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
