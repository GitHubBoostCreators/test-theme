<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

// add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
// add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)

add_shortcode('footag', 'wpdocs_footag_func');
function wpdocs_footag_func($atts)
{
	return "foo = {$atts['foo']}";
}

function mt_dotiavatar_function()
{
	return '<img src="http://dayoftheindie.com/wp-content/uploads/avatar-simple.png" alt="doti-avatar" width="96" height="96" class="left-align" />';
}
add_shortcode('mt_dotiavatar', 'mt_dotiavatar_function');


// recent posts shortcode
// @ https://digwp.com/2018/08/shortcode-display-recent-posts/
function shapeSpace_recent_posts_shortcode($atts, $content = null)
{
	global $post;

	extract(shortcode_atts(array(
		'cat'     => '',
		'num'     => '5',
		'order'   => 'DESC',
		'orderby' => 'post_date',
	), $atts));

	$args = array(
		'cat'            => $cat,
		'posts_per_page' => $num,
		'order'          => $order,
		'orderby'        => $orderby,
	);

	$output = '';
	$posts = get_posts($args);

	foreach ($posts as $post) {
		setup_postdata($post);
		$output .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
	}

	wp_reset_postdata();

	return '<ul>' . $output . '</ul>';
}
add_shortcode('recent_posts', 'shapeSpace_recent_posts_shortcode');

function refslider_shortcode($atts)
{
	// Attributes
	$atts = shortcode_atts(
		array(
			'orderby' => 'menu_order title',
			'order' => 'ASC',
		),
		$atts
	);

	// WP_Query arguments
	$args = array(
		'post_type'              => array('referenties'),
		'order'                  => 'ASC',
		'orderby'                => 'menu_order title',
	);

	// The Query
	$the_query = new WP_Query($args);
	$theresult = 'Sorry, no posts matched your criteria.';
	$output = '';

	if ($the_query->have_posts()) :
		while ($the_query->have_posts()) : $the_query->the_post();
			if (has_post_thumbnail()) {
				$output = $output . '<div class="slide"><a href="/referenties" class="reflogo"><img src="' . get_the_post_thumbnail_url() . '" class="img-fluid" alt="' . get_the_title() . '" /></a></div>';
			}
		endwhile;
		$theresult = '<section class="customer-logos slider smallpadding">' . $output . '</section>';
		wp_reset_postdata();
	endif;

	return $theresult;
}
add_shortcode('refslider', 'refslider_shortcode');

function test_shortcode()
{
	return "<div>Test geslaagd!</div>";
}
add_shortcode('testshortcode', 'test_shortcode');

// bloginfo('name')
add_shortcode('sitename', function () {
	return get_bloginfo();
});

add_shortcode('siteurl', function () {
	//return get_site_url();
	$protocols = array('http://', 'http://www.', 'www.');
	return str_replace($protocols, '', get_bloginfo('wpurl'));
});

add_shortcode('sitemail', function () {
	return get_bloginfo('admin_email');
});

add_shortcode('getyear', function () {
	return date('Y');
});

add_shortcode('copyright', function () {
	$copyright = '<span class="copyright"><a target="_blank" href="https://www.boostcreators.nl" class="me-2 developer-icon"></a>' . do_shortcode(get_theme_mod("enable_scrolltop")) . '</span>';
	return $copyright;
});

add_shortcode('boostcreatorsicon', function ($atts) {
	$atts = shortcode_atts(
		array(
			'color' => '#000',
		),
		$atts
	);

	$boostcreatorsicon = '<span class="copyright"><a target="_blank" href="https://www.boostcreators.nl" class="me-2 developer-svg-icon"><svg viewBox="0 0 6.5 7.2" width="15" height="15" xml:space="preserve"><path fill="' . $atts['color'] . '" d="M4.3.7 2.4 3H1.1L0 4.7l2.1-.3-2 2.8 2.5-2.3v2.2l1.6-1.4L4 4.4l2-2.1.4-2.2z"/></svg></a></span>';
	return $boostcreatorsicon;
});

add_shortcode('getsocials', function ($atts) {
	$atts = shortcode_atts(
		array(
			'onlyshow' => '',
		),
		$atts
	);

	$facebook = get_theme_mod('facebook', '');
	$linkedin = get_theme_mod('linkedin', '');
	$instagram = get_theme_mod('instagram', '');
	$youtube = get_theme_mod('youtube', '');
	$twitter = get_theme_mod('twitter', '');
	$googleplus = get_theme_mod('googleplus', '');
	$pinterest = get_theme_mod('pinterest', '');
	$strava = get_theme_mod('strava', '');
	$whatsapp = getPhonelink(get_theme_mod('whatsapp', ''));
	$htmlcode = '';
	$sociallinks = '';
	
	if ($facebook != '') {
		$sociallinks .= '<li class="li-facebook"><a href="' . $facebook . '" class="facebook social-icon" target="_blank"></a></li>';
	}

	if ($instagram != '') {
		$sociallinks .= '<li class="li-instagram"><a href="' . $instagram . '" class="instagram social-icon" target="_blank"></a></li>';
	}

	if ($linkedin != '') {
		$sociallinks .= '<li class="li-linkedin"><a href="' . $linkedin . '" class="linkedin social-icon" target="_blank"></a></li>';
	}

	if ($youtube != '') {
		$sociallinks .= '<li class="li-youtube"><a href="' . $youtube . '" class="youtube social-icon" target="_blank"></a></li>';
	}

	if ($twitter != '') {
		$sociallinks .= '<li class="li-twitter"><a href="' . $twitter . '" class="twitter social-icon" target="_blank"></a></li>';
	}

	if ($googleplus != '') {
		$sociallinks .= '<li class="li-googleplus"><a href="' . $googleplus . '" class="googleplus social-icon" target="_blank"></a></li>';
	}

	if ($pinterest != '') {
		$sociallinks .= '<li class="li-pinterest"><a href="' . $pinterest . '" class="pinterest social-icon" target="_blank"></a></li>';
	}

	if ($strava != '') {
		$sociallinks .= '<li class="li-strava"><a href="' . $strava . '" class="strava social-icon" target="_blank"></a></li>';
	}

	if ($whatsapp != '') {
		$sociallinks .= '<li class="li-whatsapp"><a href="https://api.whatsapp.com/send?phone=' . $whatsapp . '" class="whatsapp social-icon" target="_blank"></a></li>';
	}

	/*

	if ($facebook != '' && ($atts['onlyshow'] == '' || strpos($atts['onlyshow'], 'facebook') !== false)) {
		$sociallinks .= '<li><a href="' . $facebook . '" class="facebook social-icon" target="_blank"></a></li>';
	}

	if ($linkedin != '' && ($atts['onlyshow'] == '' || str_contains($atts['onlyshow'], 'linkedin') !== false)) {
		$sociallinks .= '<li><a href="' . $linkedin . '" class="linkedin social-icon" target="_blank"></a></li>';
	}

	if ($instagram != '' && ($atts['onlyshow'] == '' || str_contains($atts['onlyshow'], 'instagram') !== false)) {
		$sociallinks .= '<li><a href="' . $instagram . '" class="instagram social-icon" target="_blank"></a></li>';
	}

	if ($youtube != '' && ($atts['onlyshow'] == '' || str_contains($atts['onlyshow'], 'youtube') !== false)) {
		$sociallinks .= '<li><a href="' . $youtube . '" class="youtube social-icon" target="_blank"></a></li>';
	}

	if ($twitter != '' && ($atts['onlyshow'] == '' || str_contains($atts['onlyshow'], 'twitter') !== false)) {
		$sociallinks .= '<li><a href="' . $twitter . '" class="twitter social-icon" target="_blank"></a></li>';
	}

	if ($googleplus != '' && ($atts['onlyshow'] == '' || str_contains($atts['onlyshow'], 'googleplus') !== false)) {
		$sociallinks .= '<li><a href="' . $googleplus . '" class="googleplus social-icon" target="_blank"></a></li>';
	}

	if ($pinterest != '' && ($atts['onlyshow'] == '' || str_contains($atts['onlyshow'], 'pinterest') !== false)) {
		$sociallinks .= '<li><a href="' . $pinterest . '" class="pinterest social-icon" target="_blank"></a></li>';
	}

	if ($strava != '' && ($atts['onlyshow'] == '' || str_contains($atts['onlyshow'], 'strava') !== false)) {
		$sociallinks .= '<li><a href="' . $strava . '" class="strava social-icon" target="_blank"></a></li>';
	}*/

	if ($sociallinks != '') {
		$htmlcode = '<ul class="social-icons">' . $sociallinks . '</ul>';
	}

	return $htmlcode;
});

function print_menu_shortcode($atts, $content = null)
{
	extract(shortcode_atts(array(
		'name' => null,
		'dept' => 99,
		'class' => null,
		'container' => null,
		'container_class' => null,
		'container_id' => null,
		'dropdownwithparentlink' => false,
	), $atts));

	return wp_nav_menu(array(
		'menu_id'					=> preg_replace('/\s+/', '_', $name),
		'menu' 						=> $name,
		'depth'         		    => $dept,
		'container'					=> $container,
		'container_class' 	  		=> $container_class,
		'container_id'    	 		=> $container_id,
		'menu_class' 				=> $class,
		'dropdownwithparentlink'	=> $dropdownwithparentlink,
		'fallback_cb'       		=> 'WP_Bootstrap_Navwalker::fallback',
		'walker'            		=> new WP_Bootstrap_Navwalker(),
		'echo' 						=> false
	));
}

add_shortcode('menu', 'print_menu_shortcode');


add_shortcode('company-name', function () {
	return get_theme_mod("mastertheme_company-name");
});

add_shortcode('company-email', function () {
	$email = get_theme_mod("mastertheme_company-email");
	return '<a href="mailto:' . $email . '" target="_blank">' . $email . '</a>';
});

add_shortcode('company-email-clean', function () {
	return get_theme_mod("mastertheme_company-email");
});

add_shortcode('company-phone', function () {
	$tel = get_theme_mod("mastertheme_company-phone");
	return '<a href="tel:' . getPhonelink($tel) . '">' . $tel . '</a>';
});
add_shortcode('company-phone-clean', function () {
	return get_theme_mod("mastertheme_company-phone");
});
add_shortcode('company-phone-clean-link', function () {
	return getPhonelink(get_theme_mod("mastertheme_company-phone"));
});
add_shortcode('company-phone2', function () {
	$tel = get_theme_mod("mastertheme_company-phone2");
	return '<a href="tel:' . getPhonelink($tel) . '">' . $tel . '</a>';
});
add_shortcode('company-phone2-clean', function () {
	return get_theme_mod("mastertheme_company-phone2");
});
add_shortcode('company-phone2-clean-link', function () {
	return getPhonelink(get_theme_mod("mastertheme_company-phone2"));
});
add_shortcode('company-waphone', function () {
	$tel = getPhonelink(get_theme_mod("mastertheme_company-waphone"));
	return '<a href="https://api.whatsapp.com/send?phone=' . getPhonelink($tel) . '">Stuur WhatsApp bericht</a>';
});
add_shortcode('company-waphone-clean-link', function () {
	return 'https://api.whatsapp.com/send?phone=' . getPhonelink(get_theme_mod("mastertheme_company-waphone"));
});
add_shortcode('company-address', function () {
	return get_theme_mod("mastertheme_company-address");
});
add_shortcode('company-postalcode', function () {
	return get_theme_mod("mastertheme_company-postalcode");
});
add_shortcode('company-city', function () {
	return get_theme_mod("mastertheme_company-city");
});
add_shortcode('company-kvk', function () {
	return get_theme_mod("mastertheme_company-kvk");
});
add_shortcode('company-vat', function () {
	return get_theme_mod("mastertheme_company-vat");
});

add_shortcode('company-address-formatted', function () {
	$address = get_theme_mod("mastertheme_company-kvk");
	return $address;
});

add_shortcode('company-openinghours', function () {

	$maandag = get_theme_mod('mastertheme_company-openma', '');
	$dinsdag = get_theme_mod('mastertheme_company-opendi', '');
	$woensdag = get_theme_mod('mastertheme_company-openwo', '');
	$donderdag = get_theme_mod('mastertheme_company-opendo', '');
	$vrijdag = get_theme_mod('mastertheme_company-openvr', '');
	$zaterdag = get_theme_mod('mastertheme_company-openza', '');
	$zondag = get_theme_mod('mastertheme_company-openzo', '');

	$openinghours = '';
	$openinghours .= '<ul itemscope itemtype="https://schema.org/Organization" class="openingstijden">';
	if ($maandag != '') {
		$openinghours .= '<li itemprop="openingHours"><span class="dag">Maandag</span><span class="tijd">' . $maandag . '</span></li>';
	}
	if ($dinsdag != '') {
		$openinghours .= '<li itemprop="openingHours"><span class="dag">Dinsdag</span><span class="tijd">' . $dinsdag . '</span></li>';
	}
	if ($woensdag != '') {
		$openinghours .= '<li itemprop="openingHours"><span class="dag">Woensdag</span><span class="tijd">' . $woensdag . '</span></li>';
	}
	if ($donderdag != '') {
		$openinghours .= '<li itemprop="openingHours"><span class="dag">Donderdag</span><span class="tijd">' . $donderdag . '</span></li>';
	}
	if ($vrijdag != '') {
		$openinghours .= '<li itemprop="openingHours"><span class="dag">Vrijdag</span><span class="tijd">' . $vrijdag . '</span></li>';
	}
	if ($zaterdag != '') {
		$openinghours .= '<li itemprop="openingHours"><span class="dag">Zaterdag</span><span class="tijd">' . $zaterdag . '</span></li>';
	}
	if ($zondag != '') {
		$openinghours .= '<li itemprop="openingHours"><span class="dag">Zondag</span><span class="tijd">' . $zondag . '</span></li>';
	}
	$openinghours .= '</ul>';

	return $openinghours;
});

function getPhonelink($phone)
{
	$vowels = array(' ', '-', '(', ')');
	$phonelink = str_replace($vowels, '', $phone);

	return preg_replace('/[^A-Za-z0-9\-]/', '', $phonelink);;
}
