<?php
	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;


	function theme_settings_page() {
		$default_tab = null;
 		$tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;
		
		?>
		<div class="wrap">
			<h1 class="wp-heading-inline"><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<hr class="wp-header-end">
			<nav class="nav-tab-wrapper wp-clearfix" aria-label="Secundair menu">
				<a href="?page=theme-admin-page" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>" aria-current="page">API's</a>
				<a href="?page=theme-admin-page&tab=security-settings" class="nav-tab <?php if($tab==='security-settings'):?>nav-tab-active<?php endif; ?>" aria-current="page">Beveiliging</a>
				<a href="?page=theme-admin-page&tab=email-settings" class="nav-tab <?php if($tab==='email-settings'):?>nav-tab-active<?php endif; ?>" aria-current="page">E-mail</a>
				<a href="?page=theme-admin-page&tab=github-settings" class="nav-tab <?php if($tab==='github-settings'):?>nav-tab-active<?php endif; ?>" aria-current="page">GithHub</a>
			</nav>
			<div class="tab-content">
				<?php
					switch($tab) :
      					case 'security-settings': 
							//load_template
							//locate_template()
							load_template(
								dirname( __FILE__ ).
								'/security-settings.php'
							);
        					break;
      					case 'github-settings': 
							//load_template
							//locate_template()
							load_template(
								dirname( __FILE__ ).
								'/github-settings.php'
							);
        					break;
      					case 'email-settings': 
							//load_template
							//locate_template()
							load_template(
								dirname( __FILE__ ).
								'/email-settings.php'
							);
        					break;
      					default:
        					get_template_part(
    							dirname( __FILE__ ) . '/template-parts',
    							'colors',
    							array(
        							'key'   => 'value',
        							'key2'  => 'value2'
    							)
							);
        				break;
    				endswitch;
				?>
			</div>
		</div>
	<?php
	}
?>