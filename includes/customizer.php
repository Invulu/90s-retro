<?php
/**
 * Theme customizer with real-time update
 *
 * Very helpful: http://ottopress.com/2012/theme-customizer-part-deux-getting-rid-of-options-pages/
 *
 * @package 90s Retro
 * @since 90s Retro 1.0
 */

function retro_theme_customizer( $wp_customize ) {

	// Category Dropdown Control.
	class retro_Category_Dropdown_Control extends WP_Customize_Control {
		public $type = 'dropdown-categories';

		public function render_content() {
			$dropdown = wp_dropdown_categories(
				array(
					'name'							=> '_customize-dropdown-categories-' . $this->id,
					'echo'							=> 0,
					'show_option_none'	=> esc_html__( '&mdash; Select &mdash;', '90s-retro' ),
					'option_none_value' => '0',
					'selected'					=> $this->value(),
				)
			);

			// Hackily add in the data link parameter.
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

			printf( '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
				$this->label,
				$dropdown
			);
		}
	}

	function retro_sanitize_categories( $input ) {
		$categories = get_terms( 'category', array( 'fields' => 'ids', 'get' => 'all' ) );

		if ( in_array( $input, $categories ) ) {
			return $input;
		} else {
			return '';
		}
	}

	function retro_sanitize_pages( $input ) {
		$pages = get_all_page_ids();

		if ( in_array( $input, $pages ) ) {
			return $input;
		} else {
			return '';
		}
	}

	function retro_sanitize_transition_interval( $input ) {
		$valid = array(
			'2000' 		=> esc_html__( '2 Seconds', '90s-retro' ),
			'4000' 		=> esc_html__( '4 Seconds', '90s-retro' ),
			'6000' 		=> esc_html__( '6 Seconds', '90s-retro' ),
			'8000' 		=> esc_html__( '8 Seconds', '90s-retro' ),
			'10000' 	=> esc_html__( '10 Seconds', '90s-retro' ),
			'12000' 	=> esc_html__( '12 Seconds', '90s-retro' ),
			'20000' 	=> esc_html__( '20 Seconds', '90s-retro' ),
			'30000' 	=> esc_html__( '30 Seconds', '90s-retro' ),
			'60000' 	=> esc_html__( '1 Minute', '90s-retro' ),
			'999999999'	=> esc_html__( 'Hold Frame', '90s-retro' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
				return $input;
		} else {
				return '';
		}
	}

	function retro_sanitize_transition_style( $input ) {
		$valid = array(
			'fade' 		=> esc_html__( 'Fade', '90s-retro' ),
			'slide' 	=> esc_html__( 'Slide', '90s-retro' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}

	function retro_sanitize_columns( $input ) {
		$valid = array(
			'one' 		=> esc_html__( 'One Column', '90s-retro' ),
			'two' 		=> esc_html__( 'Two Columns', '90s-retro' ),
			'three' 	=> esc_html__( 'Three Columns', '90s-retro' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
				return $input;
		} else {
				return '';
		}
	}

	function retro_sanitize_align( $input ) {
		$valid = array(
			'left' 		=> esc_html__( 'Left Align', '90s-retro' ),
			'center' 		=> esc_html__( 'Center Align', '90s-retro' ),
			'right' 	=> esc_html__( 'Right Align', '90s-retro' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}

	function retro_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}

	function retro_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}

	// Set site name and description text to be previewed in real-time.
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Set site title color to be previewed in real-time.
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/*
	-------------------------------------------------------------------------------------------------------------------
		Site Title Section
	-------------------------------------------------------------------------------------------------------------------
	*/

	$wp_customize->add_section( 'title_tagline' , array(
		'title'			 => esc_html__( 'Site Title, Tagline & Logo', '90s-retro' ),
		'priority'		=> 1,
	) );

		// Logo uploader.
		$wp_customize->add_setting( 'retro_logo', array(
			'default' 	=> get_template_directory_uri() . '/images/logo.gif',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'retro_logo', array(
			'label' 	=> esc_html__( 'Logo', '90s-retro' ),
			'section' 	=> 'title_tagline',
			'settings'	=> 'retro_logo',
			'priority'	=> 1,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------------------
			Theme Options Panel
		-------------------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_panel( 'retro_theme_options', array(
			'priority' => 1,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => esc_html__( 'Theme Options', '90s-retro' ),
			'description' => esc_html__( 'This panel allows you to customize specific areas of the theme.', '90s-retro' ),
		) );

		/*
		-------------------------------------------------------------------------------------------------------------------
			Audio Options
		-------------------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'retro_audio_section' , array(
			'title'			 => esc_html__( 'Background Audio', '90s-retro' ),
			'panel' => 'retro_theme_options',
			'priority'		=> 70,
		) );

		// Stop Music.
		$wp_customize->add_setting( 'retro_start_music', array(
			'default'	=> '',
			'sanitize_callback' => 'retro_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'retro_start_music', array(
			'label'		=> esc_html__( 'Start The Music', '90s-retro' ),
			'section'	=> 'retro_audio_section',
			'settings'	=> 'retro_start_music',
			'type'		=> 'checkbox',
			'priority' => 20,
		) ) );

		// Audio Upload.
		$wp_customize->add_setting( 'retro_upload_audio', array(
			'default' 	=> get_template_directory_uri() . '/audio/come_and_find_me.mp3',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'retro_upload_audio', array(
			'label' 	=> esc_html__( 'Upload Audio', '90s-retro' ),
			'description' => esc_html__( 'Preferably an MP3 audio file.', '90s-retro' ),
			'section' 	=> 'retro_audio_section',
			'settings'	=> 'retro_upload_audio',
			'priority'	=> 40,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------------------
			Misc Options
		-------------------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'retro_layout_section' , array(
			'title'			 => esc_html__( 'Misc Options', '90s-retro' ),
			'panel' => 'retro_theme_options',
			'priority'		=> 80,
		) );

		// Display Blog Author.
		$wp_customize->add_setting( 'display_author_blog', array(
			'default'	=> true,
			'sanitize_callback' => 'retro_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_author_blog', array(
			'label'		=> esc_html__( 'Show Blog Author Link?', '90s-retro' ),
			'section'	=> 'retro_layout_section',
			'settings'	=> 'display_author_blog',
			'type'		=> 'checkbox',
			'priority' => 60,
		) ) );

		// Display Blog Date.
		$wp_customize->add_setting( 'display_date_blog', array(
			'default'	=> true,
			'sanitize_callback' => 'retro_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_date_blog', array(
			'label'		=> esc_html__( 'Show Blog Date & Comment Link?', '90s-retro' ),
			'section'	=> 'retro_layout_section',
			'settings'	=> 'display_date_blog',
			'type'		=> 'checkbox',
			'priority' => 80,
		) ) );

		// Display Post Featured Image or Video.
		$wp_customize->add_setting( 'display_feature_post', array(
			'default'	=> true,
			'sanitize_callback' => 'retro_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_feature_post', array(
			'label'		=> esc_html__( 'Show Post Featured Images?', '90s-retro' ),
			'section'	=> 'retro_layout_section',
			'settings'	=> 'display_feature_post',
			'type'		=> 'checkbox',
			'priority' => 100,
		) ) );

}
add_action( 'customize_register', 'retro_theme_customizer' );

/**
 * Binds JavaScript handlers to make Customizer preview reload changes
 * asynchronously.
 */
function retro_customize_preview_js() {
	wp_enqueue_script( 'retro-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ) );
}
add_action( 'customize_preview_init', 'retro_customize_preview_js' );
