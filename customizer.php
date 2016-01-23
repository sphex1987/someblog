<?php

function someblog_customize_register($wp_customize){

	$wp_customize->add_section(
	'home_section',
	array( 
		'title' => __('Home','someblog'), 
		'capability' => 'edit_theme_options', 
		'description' =>  __('Choose a homepage layout.','someblog')
	)
	);

	$wp_customize->add_setting('sb_home_layout', array(
		'sanitize_callback' => 'someblog_sanitize_customizer_val',
	    'default'           => 'standard',
	    'type'           => 'theme_mod',
	));


	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'sb_home_layout', array(
	    'label'    => __('Homepage Layout','someblog'),
	    'section'  => 'home_section',
	    'settings' => 'sb_home_layout',
	    'type'     => 'radio',
	    'choices'  => array(
			'standard'  => 'Standard',
			'grid-2-column' => 'Grid 2 Columns',
		)
	)));

	$wp_customize->add_setting('sb_home_read_more_text', array(
	'sanitize_callback' => 'someblog_sanitize_customizer_val',
    'capability' => 'edit_theme_options',
    'type'       => 'theme_mod',
    'default' => 'Read More',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'sb_home_read_more_text', array(
	    'settings' => 'sb_home_read_more_text',
	    'label'    => __('Read More Text','someblog'),
	    'section'  => 'home_section',
	    'type'     => 'text', 
	)));


    $wp_customize->add_section(
	'header_section',
	array( 
		'title' => __('Header','someblog'), 
		'capability' => 'edit_theme_options', 
		'description' =>  __('Allows you to edit your theme\'s layout.','someblog')
	)
	);

	$wp_customize->add_setting('sb_logo_url', array(
		'sanitize_callback' => 'someblog_sanitize_customizer_val',
	    'default'           => get_stylesheet_directory_uri().'/img/someblog-logo.png',
	    'type'           => 'theme_mod',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'sb_logo_url', array(
	    'label'    => __('Logo Image','someblog'),
	    'section'  => 'header_section',
	    'settings' => 'sb_logo_url'
	)));


	$wp_customize->add_section(
	'slider_section', 
	array( 
		'title' =>  __('Slider','someblog'), 
		'capability' => 'edit_theme_options', 
		'description' =>  __('Allows you to set your slider','someblog')
	)
	);


	$slider_cat_arr = array();
	$terms = get_terms( 'category' );
	foreach ( $terms as $term ) {
		$slider_cat_arr[$term->term_id] = $term->name;
	}	

	$wp_customize->add_setting('someblog_featured_cat', array(
	'sanitize_callback' => 'someblog_sanitize_customizer_val',
    'default'       => '',
    'type'           => 'theme_mod',
	));	

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'someblog_featured_cat', array(
	    'settings' => 'someblog_featured_cat',
	    'label'    => __('Slider Category','someblog'),
	    'section'  => 'slider_section',
	    'choices'  => $slider_cat_arr,
	    'default'  => 'standard',
	    'type'     => 'select'
	)));

	$wp_customize->add_setting('someblog_slider_type', array(
	'sanitize_callback' => 'someblog_sanitize_customizer_val',
    'default'       => '',
    'type'           => 'theme_mod',
	));	

	$slider_types = array(
					'single' => 'Single Slider',
					'double' => 'Double Slider',
					'triple' => 'Triple Slider'
				);

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'someblog_slider_type', array(
	    'settings' => 'someblog_slider_type',
	    'label'    => __('Slider Type','someblog'),
	    'section'  => 'slider_section',
	    'choices'  => $slider_types,
	    'default'  => 'single',
	    'type'     => 'select'
	)));
	
	$wp_customize->add_section(
	'sm_section', 
	array( 
		'title' =>  __('Social Media','someblog'), 
		'capability' => 'edit_theme_options', 
		'description' =>  __('Allows you to set your social media URLs','someblog')
	)
	);

	$socials = array('facebookurl', 'twitterurl', 'pinteresturl', 'googleplusurl', 'behanceurl', 'dribbbleurl', 'instagramurl');
	for($i=0;$i<count($socials);$i++) {
		$name = str_replace('-',' ',ucfirst($socials[$i]));

		$wp_customize->add_setting('someblog_'.$socials[$i], array(
		'sanitize_callback' => 'someblog_sanitize_customizer_val',
	    'capability' => 'edit_theme_options',
	    'type'       => 'theme_mod',
		));

		$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'someblog_'.$socials[$i], array(
		    'settings' => 'someblog_'.$socials[$i],
		    'label'    => $name.' URL',
		    'section'  => 'sm_section',
		    'type'     => 'text',
		)));

	}

	$wp_customize->add_setting('someblog_hiderss', array(
	'sanitize_callback' => 'someblog_sanitize_customizer_val',
    'type'       => 'theme_mod',
    'default'       => 'yes',
    
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'someblog_hiderss', array(
	    'settings' => 'someblog_hiderss',
	    'label'    => 'Hide RSS',
	    'section'  => 'sm_section',
	    'type'     => 'checkbox',
	)));


	$wp_customize->add_section(
	'footer_section', 
	array( 
		'title' =>  __('Footer','someblog'), 
		'capability' => 'edit_theme_options', 
		'description' =>  __('Allows you to set your footer settings','someblog')
	)
	);
	$wp_customize->add_setting('sb_copyright', array(
	'sanitize_callback' => 'someblog_sanitize_customizer_val',
    'capability' => 'edit_theme_options',
    'type'       => 'theme_mod',
    'default' => '&copy; 2015 Copyright text goes here ',
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'sb_copyright', array(
	    'settings' => 'sb_copyright',
	    'label'    => __('Copyright Text','someblog'),
	    'section'  => 'footer_section',
	    'type'     => 'textarea', 
	)));

}
add_action('customize_register', 'someblog_customize_register');

function someblog($name, $default = false) {
	return get_theme_mod( $name, $default );
}

function someblog_sanitize_customizer_val($value){
	if (!filter_var($value, FILTER_VALIDATE_URL) === false) //check if URL
		return esc_url_raw($value);
	else
		return sanitize_text_field($value);
}

?>