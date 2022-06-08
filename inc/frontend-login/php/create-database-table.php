<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function usersfrontendtable(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'users_frontend';
	
	$charset_collate = $wpdb->get_charset_collate();

	if( $wpdb->get_var("SHOW TABLES LIKE '%" . $table_name . "%'") != $table_name){ 
		$sql = "CREATE TABLE $table_name (
			id INT(11) NOT NULL AUTO_INCREMENT,
			user_login VARCHAR(255) NOT NULL,
			user_pass VARCHAR(255) NOT NULL,
			user_registered datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			display_name VARCHAR(255) NOT NULL,
			PRIMARY KEY (id)
		) $charset_collate;
		ALTER TABLE $table_name ADD UNIQUE( `user_login`);";
		
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}
}

add_action( 'init', 'usersfrontendtable');
?>