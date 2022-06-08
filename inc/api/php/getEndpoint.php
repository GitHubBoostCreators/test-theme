<?php
	add_action('rest_api_init', function() {
		register_rest_route('topposts/v1', 'topfive', [
			'method' => 'GET',
			'callback' => 'top_five_posts'
		]);
	});

//https://mamzo.gaatbijnaonline.nl/wp-json/posts/v1/topfive
?>