<?php
	function gutenbergsetup() {
		add_theme_support( 'editor-color-palette', array(
        	array(
            	'name' => esc_attr__( 'red', 'themeLangDomain' ),
            	'slug' => 'red',
            	'color' => '#E30613',
        	),
        	array(
            	'name' => esc_attr__( 'white', 'themeLangDomain' ),
            	'slug' => 'white',
            	'color' => '#ffffff',
        	),
        	array(
            	'name' => esc_attr__( 'black', 'themeLangDomain' ),
            	'slug' => 'black',
            	'color' => '#000000',
        	),
        	array(
            	'name' => esc_attr__( 'gray', 'themeLangDomain' ),
            	'slug' => 'grey',
            	'color' => '#B2B2B2',
        	),
		));
		
		add_theme_support( 'editor-font-sizes', array(
    		array(
        		'name' => esc_attr__( 'Small', 'themeLangDomain' ),
        		'size' => 12,
        		'slug' => 'small'
  	 		),
    		array(
        		'name' => esc_attr__( 'Regular', 'themeLangDomain' ),
        		'size' => 16,
        		'slug' => 'regular'
    		),
    		array(
        		'name' => esc_attr__( 'Large', 'themeLangDomain' ),
        		'size' => 36,
        		'slug' => 'large'
    		),
    		array(
        		'name' => esc_attr__( 'Huge', 'themeLangDomain' ),
        		'size' => 50,
        		'slug' => 'huge'
    		)
		));
		
		add_theme_support('editor-gradient-presets', array(
        	array(
            	'name'     => esc_attr__( 'Vivid cyan blue to vivid purple', 'themeLangDomain' ),
            	'gradient' => 'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)',
            	'slug'     => 'vivid-cyan-blue-to-vivid-purple'
        	),
        	array(
            	'name'     => esc_attr__( 'Vivid green cyan to vivid cyan blue', 'themeLangDomain' ),
            	'gradient' => 'linear-gradient(135deg,rgba(0,208,132,1) 0%,rgba(6,147,227,1) 100%)',
            	'slug'     =>  'vivid-green-cyan-to-vivid-cyan-blue',
        	),
        	array(
            	'name'     => esc_attr__( 'Light green cyan to vivid green cyan', 'themeLangDomain' ),
            	'gradient' => 'linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%)',
            	'slug'     => 'light-green-cyan-to-vivid-green-cyan',
        	),
        	array(
            	'name'     => esc_attr__( 'Luminous vivid amber to luminous vivid orange', 'themeLangDomain' ),
            	'gradient' => 'linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%)',
            	'slug'     => 'luminous-vivid-amber-to-luminous-vivid-orange',
        	),
        	array(
            	'name'     => esc_attr__( 'Luminous vivid orange to vivid red', 'themeLangDomain' ),
            	'gradient' => 'linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%)',
            	'slug'     => 'luminous-vivid-orange-to-vivid-red',
			),
    	));
		
		// Support Featured Images
		add_theme_support('post-thumbnails');

		//Gutenberg support
		add_theme_support('align-wide');
		add_theme_support('editor-styles');
		add_theme_support('wp-block-styles');
		add_theme_support('dark-editor-style');
		add_theme_support('responsive-embeds');
		add_theme_support('custom-colors');
		add_theme_support('custom-font-sizes');
		add_theme_support('custom-gradients');
		add_theme_support('custom-line-height');
		add_theme_support('custom-units', 'px', 'rem', 'em');
		add_theme_support('custom-spacing');
		add_theme_support('experimental-link-color');
		
		//Gutenberg disable
	}

	add_action('after_setup_theme', 'gutenbergsetup');
?>