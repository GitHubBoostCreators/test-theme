<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action("customize_register", "mastertheme_theme_customize_register_extras");
function mastertheme_theme_customize_register_extras($wp_customize)
{


	// ADD A SECTION FOR HEADER & FOOTER CODE -- to fix
	$wp_customize->add_section("addcode", array(
		"title" => __("Add Code to Page", "mastertheme"),
		"priority" => 180,
	));

	//ADD HEADER CODE  
	$wp_customize->add_setting("mastertheme_header_code", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_header_code",
		array(
			"label" => __("Add code to Header", "mastertheme"),
			"section" => "addcode",
			'type'     => 'textarea',
			'description' => 'Placed inside the HEAD of the page'
		)
	));

	//ADD BODY CODE  
	$wp_customize->add_setting("mastertheme_body_code", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_body_code",
		array(
			"label" => __("Add code to start of Body", "mastertheme"),
			"section" => "addcode",
			'type'     => 'textarea',
			'description' => 'Placed after opening the BODY of the page'
		)
	));

	//ADD FOOTER CODE 
	$wp_customize->add_setting("mastertheme_footer_code", array(
		"default" => "",
		"transport" => "refresh",
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_footer_code",
		array(
			"label" => __("Add code to Footer", "mastertheme"),
			"section" => "addcode",
			'type'     => 'textarea',
			'description' => 'Placed before closing the BODY of the page'
		)
	));

	//ADD SECTION FOR FOOTER  //////////////////////////////////////////////////////////////////////////////////////////////////////////
	$wp_customize->add_section("footer", array(
		"title" => __("Footer", "mastertheme"),
		"priority" => 100,
	));

	//FOOTER TEXT
	$wp_customize->add_setting("footer_content", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"footer_content",
		array(
			"label" => __("Footer Text / HTML", "mastertheme"),
			"description"  => "Plaats hier HTML code of een shortcode van de UX-blocks",
			"section" => "footer",
			'type'     => 'textarea',

		)
	));

	//COPYRIGHT TEXT
	$wp_customize->add_setting("copyright_content", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"copyright_content",
		array(
			"label" => __("Copyright Text", "mastertheme"),
			"description"  => "Dit blok kan worden toegevoegd met de shortcode [copyright]. Voeg shortcode [getyear] toe om de datum te tonen. Bijvoorbeeld 'Copyright © [getyear] - [sitename]'",
			"section" => "footer",
			'type'     => 'textarea',

		)
	));


	//ENABLE TOPBAR
	$wp_customize->add_setting("enable_scrolltop", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"enable_scrolltop",
		array(
			"label" => __("Enable Scroll to top", "mastertheme"),
			// "description" => __("Adds scroll top top button", "mastertheme"),
			"section" => "footer",
			'type'     => 'checkbox',
		)
	));


	// ADD A SECTION FOR COMPANY INFO //////////////////////////////
	$wp_customize->add_section("companyinfo", array(
		"title" => __("Bedrijfsinformatie", "mastertheme"),
		"priority" => 50,
	));

	//ADD BEDRIJFSNAAM  
	$wp_customize->add_setting("mastertheme_company-name", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_company-name",
		array(
			"label" => __("Bedrijfsnaam", "mastertheme"),
			"section" => "companyinfo",
		)
	));

	//ADD BEDRIJFS E-MAIL  
	$wp_customize->add_setting("mastertheme_company-email", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_company-email",
		array(
			"label" => __("E-mailadres", "mastertheme"),
			"section" => "companyinfo",
		)
	));

	//ADD BEDRIJFS TELEFOON  
	$wp_customize->add_setting("mastertheme_company-phone", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_company-phone",
		array(
			"label" => __("Telefoonnummer", "mastertheme"),
			"section" => "companyinfo",
		)
	));

	//ADD BEDRIJFS Mobile PHONE
	$wp_customize->add_setting("mastertheme_company-phone2", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_company-phone2",
		array(
			"label" => __("Extra telefoonnummer", "mastertheme"),
			"section" => "companyinfo",
		)
	));

		//ADD BEDRIJFS Whatsapp PHONE
		$wp_customize->add_setting("mastertheme_company-waphone", array(
			"default" => "",
			"transport" => "refresh",
		));
		$wp_customize->add_control(new WP_Customize_Control(
			$wp_customize,
			"mastertheme_company-waphone",
			array(
				"label" => __("Whatsapp telefoonnummer", "mastertheme"),
				"section" => "companyinfo",
			)
		));
	

	//ADD BEDRIJFS ADRES  
	$wp_customize->add_setting("mastertheme_company-address", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_company-address",
		array(
			"label" => __("Adres", "mastertheme"),
			"section" => "companyinfo",
		)
	));

	//ADD BEDRIJFS POSTCODE  
	$wp_customize->add_setting("mastertheme_company-postalcode", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_company-postalcode",
		array(
			"label" => __("Postcode", "mastertheme"),
			"section" => "companyinfo",
		)
	));

	//ADD BEDRIJFS PLAATS  
	$wp_customize->add_setting("mastertheme_company-city", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_company-city",
		array(
			"label" => __("Plaats", "mastertheme"),
			"section" => "companyinfo",
		)
	));

	//ADD BEDRIJFS KVK  
	$wp_customize->add_setting("mastertheme_company-kvk", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_company-kvk",
		array(
			"label" => __("KvK nummer", "mastertheme"),
			"section" => "companyinfo",
		)
	));

	//ADD BEDRIJFS KVK  
	$wp_customize->add_setting("mastertheme_company-vat", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_company-vat",
		array(
			"label" => __("BTW-nummer", "mastertheme"),
			"section" => "companyinfo",
		)
	));

	// ADD A SECTION FOR OPENING HOURS //////////////////////////////
	$wp_customize->add_section("companyopeninghours", array(
		"title" => __("Openingstijden", "mastertheme"),
		"priority" => 51,
	));


	//ADD BEDRIJFS OPENINGSTIJDEN MA  
	$wp_customize->add_setting("mastertheme_company-openma", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_company-openma",
		array(
			"label" => __("Maandag", "mastertheme"),
			"section" => "companyopeninghours",
		)
	));

	//ADD BEDRIJFS OPENINGSTIJDEN MA  
	$wp_customize->add_setting("mastertheme_company-opendi", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_company-opendi",
		array(
			"label" => __("Dinsdag", "mastertheme"),
			"section" => "companyopeninghours",
		)
	));

	//ADD BEDRIJFS OPENINGSTIJDEN MA  
	$wp_customize->add_setting("mastertheme_company-openwo", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_company-openwo",
		array(
			"label" => __("Woensdag", "mastertheme"),
			"section" => "companyopeninghours",
		)
	));

	//ADD BEDRIJFS OPENINGSTIJDEN MA  
	$wp_customize->add_setting("mastertheme_company-opendo", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_company-opendo",
		array(
			"label" => __("Donderdag", "mastertheme"),
			"section" => "companyopeninghours",
		)
	));

	//ADD BEDRIJFS OPENINGSTIJDEN MA  
	$wp_customize->add_setting("mastertheme_company-openvr", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_company-openvr",
		array(
			"label" => __("Vrijdag", "mastertheme"),
			"section" => "companyopeninghours",
		)
	));

	//ADD BEDRIJFS OPENINGSTIJDEN MA  
	$wp_customize->add_setting("mastertheme_company-openza", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_company-openza",
		array(
			"label" => __("Zaterdag", "mastertheme"),
			"section" => "companyopeninghours",
		)
	));

	//ADD BEDRIJFS OPENINGSTIJDEN MA  
	$wp_customize->add_setting("mastertheme_company-openzo", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"mastertheme_company-openzo",
		array(
			"label" => __("Zondag", "mastertheme"),
			"section" => "companyopeninghours",
		)
	));

	//  HEADER SECTION //////////////////////////////////////////////////////////////////////////////////////////////////////////
	$wp_customize->add_section("theheader", array(
		"title" => __("Header", "mastertheme"),
		"priority" => 60,
	));


	// THEME COLOR
	$wp_customize->add_setting("theme_color", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"theme_color",
		array(
			"label" => __("Thema kleur", "mastertheme"),
			"description"  => "HEX kleur wordt gebruikt in bijvoorbeeld de adresbalk van de browser",
			"section" => "theheader",
			// 'type'     => 'textarea',

		)
	));



	//HEADER TEXT
	$wp_customize->add_setting("header_content", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"header_content",
		array(
			"label" => __("Header Text / HTML", "mastertheme"),
			"description"  => "Plaats hier HTML code of een shortcode van de UX-blocks",
			"section" => "theheader",
			'type'     => 'textarea',

		)
	));



	// ADD A SECTION FOR CUSROM POSTS ///////////////////
	$wp_customize->add_section("customposts", array(
		"title" => __("Custom Posts", "mastertheme"),
		"priority" => 180,
	));

	$wp_customize->add_setting("enable_portfolio", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"enable_portfolio",
		array(
			"label" => __("Enable Portfolio", "mastertheme"),
			"description" => __("Adds Custom Post Portfolio", "mastertheme"),
			"section" => "customposts",
			'type'     => 'checkbox',
		)
	));

	$wp_customize->add_setting("enable_references", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"enable_references",
		array(
			"label" => __("Enable References", "mastertheme"),
			"description" => __("Adds Custom Post References", "mastertheme"),
			"section" => "customposts",
			'type'     => 'checkbox',
		)
	));

	$wp_customize->add_setting("enable_projects", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"enable_projects",
		array(
			"label" => __("Enable Projects", "mastertheme"),
			"description" => __("Adds Custom Post Projects. Gebruik shortcode [get_cp_projects] om projecten op te halen.", "mastertheme"),
			"section" => "customposts",
			'type'     => 'checkbox',
		)
	));

	$wp_customize->add_setting("enable_vacatures", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"enable_vacatures",
		array(
			"label" => __("Enable Vacatures", "mastertheme"),
			"description" => __("Adds Custom Post Vacatures. Gebruik shortcode [get_cp_vacatures] om vacatures op te halen.", "mastertheme"),
			"section" => "customposts",
			'type'     => 'checkbox',
		)
	));

	$wp_customize->add_setting("enable_employees", array(
		"default" => "",
		"transport" => "refresh",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"enable_employees",
		array(
			"label" => __("Enable Employees", "mastertheme"),
			"description" => __("Adds Custom Post Employees. Gebruik shortcode [get_cp_employees] om medewerkers op te halen.", "mastertheme"),
			"section" => "customposts",
			'type'     => 'checkbox',
		)
	));
}

function ts_customize_register($wp_customize)
{

	$wp_customize->add_section('ts_social_media', array(
		'title'             => __('Social Media', 'ts'),
		'priority'          => 181,
		'description'       => __('Enter the URL to your account for each service for the icon to appear in the header.', 'ts'),
	));

	// Add Facebook Setting
	$wp_customize->add_setting('facebook', array('default' => '', 'sanitize_callback' => 'esc_url_raw',));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'facebook', array(
		'label'             => __('Facebook', 'ts'),
		'section'           => 'ts_social_media',
		'settings'          => 'facebook',
		'sanitize_callback' => 'esc_url_raw',
	)));

	// Add Instagram Setting
	$wp_customize->add_setting('instagram', array('default' => '', 'sanitize_callback' => 'esc_url_raw',));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'instagram', array(
		'label'             => __('Instagram', 'ts'),
		'section'           => 'ts_social_media',
		'settings'          => 'instagram',
		'sanitize_callback' => 'esc_url_raw',
	)));

	// Add Linkedin Setting
	$wp_customize->add_setting('linkedin', array('default' => '', 'sanitize_callback' => 'esc_url_raw',));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'linkedin', array(
		'label'             => __('LinkedIn', 'ts'),
		'section'           => 'ts_social_media',
		'settings'          => 'linkedin',
		'sanitize_callback' => 'esc_url_raw',
	)));

	// Add YouTube Setting
	$wp_customize->add_setting('youtube', array('default' => '', 'sanitize_callback' => 'esc_url_raw',));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'youtube', array(
		'label'             => __('YouTube', 'ts'),
		'section'           => 'ts_social_media',
		'settings'          => 'youtube',
		'sanitize_callback' => 'esc_url_raw',
	)));

	// Add Twitter Setting
	$wp_customize->add_setting('twitter', array('default' => '', 'sanitize_callback' => 'esc_url_raw',));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'twitter', array(
		'label'             => __('Twitter', 'ts'),
		'section'           => 'ts_social_media',
		'settings'          => 'twitter',
		'sanitize_callback' => 'esc_url_raw',
	)));

	// Add Pinterest Setting
	$wp_customize->add_setting('pinterest', array('default' => '', 'sanitize_callback' => 'esc_url_raw',));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pinterest', array(
		'label'             => __('Pinterest', 'ts'),
		'section'           => 'ts_social_media',
		'settings'          => 'pinterest',
	)));

	// Add Google+ Setting
	$wp_customize->add_setting('googleplus', array('default' => '', 'sanitize_callback' => 'esc_url_raw',));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'googleplus', array(
		'label'             => __('Google+', 'ts'),
		'section'           => 'ts_social_media',
		'settings'          => 'googleplus',
	)));

	// Add Strava Setting
	$wp_customize->add_setting('strava', array('default' => '', 'sanitize_callback' => 'esc_url_raw',));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'strava', array(
		'label'             => __('Strava', 'ts'),
		'section'           => 'ts_social_media',
		'settings'          => 'strava',
	)));

	// Add Whatsapp Setting
	$wp_customize->add_setting('whatsapp', array('default' => '', 'sanitize_callback' => 'esc_url_raw',));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'whatsapp', array(
		'label'             => __('WhatsApp', 'ts'),
		'section'           => 'ts_social_media',
		'settings'          => 'whatsapp',
	)));
}
add_action('customize_register', 'ts_customize_register');
