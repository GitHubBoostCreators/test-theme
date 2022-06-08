<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//tabel om mislukte login pogingen op te slaan
function loginattemptstable(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'loginattempts';
	
	$charset_collate = $wpdb->get_charset_collate();

	if( $wpdb->get_var("SHOW TABLES LIKE '%" . $table_name . "%'") != $table_name){ 
		$sql = "CREATE TABLE $table_name (
			id INT(11) NOT NULL AUTO_INCREMENT,
			attempttime datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			userip VARCHAR(255) NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	}
}

add_action( 'init', 'loginattemptstable');

//tabel om ip adressen op te slaan voor blacklist
function blacklistingtable(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'blacklisting';
	
	$charset_collate = $wpdb->get_charset_collate();

	if( $wpdb->get_var("SHOW TABLES LIKE '%" . $table_name . "%'") != $table_name){ 
		$sql = "CREATE TABLE $table_name (
			id INT(11) NOT NULL AUTO_INCREMENT,
			appendedtime datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			userip VARCHAR(255) NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";
		
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}
}

add_action( 'init', 'blacklistingtable');

//tabel om ip adressen op te slaan voor whitelist
function whitelistingtable(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'whitelisting';
	
	$charset_collate = $wpdb->get_charset_collate();

	if( $wpdb->get_var("SHOW TABLES LIKE '%" . $table_name . "%'") != $table_name){ 
		$sql = "CREATE TABLE $table_name (
			id INT(11) NOT NULL AUTO_INCREMENT,
			appendedtime datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			userip VARCHAR(255) NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	}
}

add_action( 'init', 'whitelistingtable');
?>
