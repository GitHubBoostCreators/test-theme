<?php
	add_action('rest_api_init', function() {
		register_rest_route('topfiveposts/v1', '', [
			'method' => 'GET',
			'callback' => 'top_five_posts'
		]);
	});
?>