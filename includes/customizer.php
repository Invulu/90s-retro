<?php
/**
* Theme customizer with real-time update
*
* Very helpful: http://ottopress.com/2012/theme-customizer-part-deux-getting-rid-of-options-pages/
*
* @package Retro
* @since Retro 1.0
*/
function retro_theme_customizer( $wp_customize ) {

	// Category Dropdown Control
	class retro_Category_Dropdown_Control extends WP_Customize_Control {
	public $type = 'dropdown-categories';

	public function render_content() {
		$dropdown = wp_dropdown_categories(
				array(
					'name'              => '_customize-dropdown-categories-' . $this->id,
					'echo'              => 0,
					'show_option_none'  => __( '&mdash; Select &mdash;', 'retro' ),
					'option_none_value' => '0',
					'selected'          => $this->value(),
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
		$categories = get_terms( 'category', array('fields' => 'ids', 'get' => 'all') );
		
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
	        '2000' 		=> __( '2 Seconds', 'retro' ),
	        '4000' 		=> __( '4 Seconds', 'retro' ),
	        '6000' 		=> __( '6 Seconds', 'retro' ),
	        '8000' 		=> __( '8 Seconds', 'retro' ),
	        '10000' 	=> __( '10 Seconds', 'retro' ),
	        '12000' 	=> __( '12 Seconds', 'retro' ),
	        '20000' 	=> __( '20 Seconds', 'retro' ),
	        '30000' 	=> __( '30 Seconds', 'retro' ),
	        '60000' 	=> __( '1 Minute', 'retro' ),
	        '999999999'	=> __( 'Hold Frame', 'retro' ),
	    );
	 
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
	
	function retro_sanitize_transition_style( $input ) {
	    $valid = array(
	        'fade' 		=> __( 'Fade', 'retro' ),
	        'slide' 	=> __( 'Slide', 'retro' ),
	    );
	 
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
	
	function retro_sanitize_columns( $input ) {
	    $valid = array(
	        'one' 		=> __( 'One Column', 'retro' ),
	        'two' 		=> __( 'Two Columns', 'retro' ),
	        'three' 	=> __( 'Three Columns', 'retro' ),
	    );
	 
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
	
	function retro_sanitize_align( $input ) {
	    $valid = array(
	        'left' 		=> __( 'Left Align', 'retro' ),
	        'center' 		=> __( 'Center Align', 'retro' ),
	        'right' 	=> __( 'Right Align', 'retro' ),
	    );
	 
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
	
	function retro_sanitize_title_color( $input ) {
	    $valid = array(
	        'black' 	=> __( 'Black', 'retro' ),
	        'white' 	=> __( 'White', 'retro' ),
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

	// Set site name and description text to be previewed in real-time
	$wp_customize->get_setting('blogname')->transport='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';

	// Set site title color to be previewed in real-time
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
		
	//-------------------------------------------------------------------------------------------------------------------//
	// Site Title Section
	//-------------------------------------------------------------------------------------------------------------------//	
		
	$wp_customize->add_section( 'title_tagline' , array(
		'title'       => __( 'Site Title, Tagline & Logo', 'retro' ),
		'priority'    => 1,
	) );
	
		// Logo uploader
		$wp_customize->add_setting( 'retro_logo', array(
			'default' 	=> get_template_directory_uri() . '/images/logo.gif',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'retro_logo', array(
			'label' 	=> __( 'Logo', 'retro' ),
			'section' 	=> 'title_tagline',
			'settings'	=> 'retro_logo',
			'priority'	=> 1,
		) ) );
		
		// Site Title Align
		$wp_customize->add_setting( 'title_align', array(
		    'default' => 'center',
		    'sanitize_callback' => 'retro_sanitize_align',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_align', array(
		    'type' => 'radio',
		    'label' => __( 'Title & Logo Alignment', 'retro' ),
		    'section' => 'title_tagline',
		    'choices' => array(
		        'left' 		=> __( 'Left Align', 'retro' ),
		        'center' 	=> __( 'Center Align', 'retro' ),
		        'right' 	=> __( 'Right Align', 'retro' ),
		    ),
		    'priority' => 60,
		) ) );
		
	//-------------------------------------------------------------------------------------------------------------------//
	// Audio Options
	//-------------------------------------------------------------------------------------------------------------------//
		
	$wp_customize->add_section( 'retro_audio_section' , array(
		'title'       => __( 'Background Audio', 'retro' ),
		'priority'    => 70,
	) );
	
		// Audio Upload
		$wp_customize->add_setting( 'retro_upload_audio', array(
			'default' 	=> get_template_directory_uri() . '/audio/overworld.mp3',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'retro_upload_audio', array(
			'label' 	=> __( 'Upload Audio', 'organicthemes' ),
			'description' => __( 'Preferably an MP3 audio file.', 'organicthemes' ),
			'section' 	=> 'retro_audio_section',
			'settings'	=> 'retro_upload_audio',
			'priority'	=> 20,
		) ) );
	
		// Stop Music
		$wp_customize->add_setting( 'stop_the_music', array(
			'default'	=> '',
			'sanitize_callback' => 'retro_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'stop_the_music', array(
			'label'		=> __( 'Stop The DAMN Music!!!', 'retro' ),
			'section'	=> 'retro_audio_section',
			'settings'	=> 'stop_the_music',
			'type'		=> 'checkbox',
			'priority' => 40,
		) ) );
		
	//-------------------------------------------------------------------------------------------------------------------//
	// Misc Options
	//-------------------------------------------------------------------------------------------------------------------//
	
	$wp_customize->add_section( 'retro_layout_section' , array(
		'title'       => __( 'Misc Options', 'retro' ),
		'priority'    => 80,
	) );
		
		// Display Footer Gifs
		$wp_customize->add_setting( 'hide_the_gifs', array(
			'default'	=> true,
			'sanitize_callback' => 'retro_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_the_gifs', array(
			'label'		=> __( 'Show Animated Footer Gifs?', 'retro' ),
			'section'	=> 'retro_layout_section',
			'settings'	=> 'hide_the_gifs',
			'type'		=> 'checkbox',
			'priority' => 20,
		) ) );
		
		// Display Visitor Counter
		$wp_customize->add_setting( 'lose_the_counter', array(
			'default'	=> true,
			'sanitize_callback' => 'retro_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lose_the_counter', array(
			'label'		=> __( 'Show Fake Visitor Counter?', 'retro' ),
			'section'	=> 'retro_layout_section',
			'settings'	=> 'lose_the_counter',
			'type'		=> 'checkbox',
			'priority' => 40,
		) ) );
		
		// Display Blog Author
		$wp_customize->add_setting( 'display_author_blog', array(
			'default'	=> true,
			'sanitize_callback' => 'retro_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_author_blog', array(
			'label'		=> __( 'Show Blog Author Link?', 'retro' ),
			'section'	=> 'retro_layout_section',
			'settings'	=> 'display_author_blog',
			'type'		=> 'checkbox',
			'priority' => 60,
		) ) );
		
		// Display Blog Date
		$wp_customize->add_setting( 'display_date_blog', array(
			'default'	=> true,
			'sanitize_callback' => 'retro_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_date_blog', array(
			'label'		=> __( 'Show Blog Date & Comment Link?', 'retro' ),
			'section'	=> 'retro_layout_section',
			'settings'	=> 'display_date_blog',
			'type'		=> 'checkbox',
			'priority' => 80,
		) ) );
		
		// Display Post Featured Image or Video
		$wp_customize->add_setting( 'display_feature_post', array(
			'default'	=> true,
			'sanitize_callback' => 'retro_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_feature_post', array(
			'label'		=> __( 'Show Post Featured Images?', 'retro' ),
			'section'	=> 'retro_layout_section',
			'settings'	=> 'display_feature_post',
			'type'		=> 'checkbox',
			'priority' => 100,
		) ) );
	
}
add_action('customize_register', 'retro_theme_customizer');

/**
* Binds JavaScript handlers to make Customizer preview reload changes
* asynchronously.
*/
function retro_customize_preview_js() {
	wp_enqueue_script( 'retro-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ) );
}
add_action( 'customize_preview_init', 'retro_customize_preview_js' );