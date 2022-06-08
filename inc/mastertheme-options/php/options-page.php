<?php

function add_mastertheme_theme_page() {
    add_theme_page( 'mastertheme Theme Options Page', 'mastertheme Theme', 'edit_theme_options', 'mastertheme-theme-options', 'theme_option_page' );
}
add_action( 'admin_menu', 'add_mastertheme_theme_page' );
 
function theme_option_page() {
    
    if (isset($_GET['successful-import'])){
        echo "<h1>Import Done!</h1><p><a class='button button-primary button-hero' href='".get_site_url()."'>Visit site</a> </p>";
        return;
    }
    ?>
    <div class="wrap">

        <div class="welcome-panel">
        
            <div class="welcome-panel-content">
                <h2>Welcome to mastertheme  <?php 
				
				//get active parent theme / framework information
				if (get_template_directory() === get_stylesheet_directory())  { $my_theme = wp_get_theme(); } else { $my_theme = wp_get_theme()->parent(); }
				
				//print theme version 
				echo $my_theme->get( 'Version' ) ?> </h2>
                <p class="about-description">The best way to experience Bootstrap 4 and WordPress</p>
                 
                <p><i>Build your own Bootstrap CSS easily. Gain total control!</i></p>
                <p><b>Use  the WordPress Customizer</b> to control Bootstrap variables  
                and <b>set your own project colors</b>, typography and graphical options.<br>
                Hit "<b>Publish</b>" and mastertheme will recompile the Bootstrap SCSS code "on the fly" (and optionally include YOUR additional CSS / SCSS files). </p>
                <p>A <b>single, minified <a href="<?php echo mastertheme_get_css_url() ?>" target="_blank">CSS file</a></b> is generated and served. </p>
                <p><small>If you're not a fan of the Customizer, you can alternatively edit the <b> sass/_theme-variables.scss </b> file too, inside  your child theme folder. 
				Changes will be automatically "picked".</small></p>
                 

                
                <div class="welcome-panel-column-container">
                    
					<div class="welcome-panel-column" style="width:55%;">
                            <h3>Get Started</h3>
                            <a class="button button-primary button-hero" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>">Customize Your Site</a>
                            <p>  to make your own Bootstrap build!		</p>
                    </div>

                    <div class="welcome-panel-column welcome-panel-last">

                        <h3>Secondary Utilities</h3>
						
						<style>

							ul#pico-utils li {
							margin-bottom: 10px;
							}
							ul#pico-utils li a svg {
								color:#007cba;
								width:20px;
								margin-right:10px;
								vertical-align: middle;
							}
							
							ul#pico-utils li a span {
								font-weight: 700;
							    text-decoration: underline;
							}

							 
						</style> 

                        <ul id="pico-utils">
                                    <li>
										<a onclick="jQuery('#ps-panel-actions-loading-target').load('<?php echo admin_url('?ps_compile_scss&ps_compiler_api') ?>');" href="#" class="">
											<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16" style="" lc-helper="svg-icon">
												<path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"></path>
												<path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"></path>
											</svg>
											<span>Force CSS Bundle Rebuild</a> </span>
										<small>(No fear)</small> 
									</li>
                                    
									
									<li>
										<a onclick="if(confirm('This will DESTROY all your Customizer settings. Are you sure?')) jQuery('#ps-panel-actions-loading-target').load('<?php echo admin_url('?ps_reset_theme&ps_compiler_api') ?>');"   href="#" >
											<svg viewBox="0 0 24 24">
    										<path fill="currentColor" d="M16.24,3.56L21.19,8.5C21.97,9.29 21.97,10.55 21.19,11.34L12,20.53C10.44,22.09 7.91,22.09 6.34,20.53L2.81,17C2.03,16.21 2.03,14.95 2.81,14.16L13.41,3.56C14.2,2.78 15.46,2.78 16.24,3.56M4.22,15.58L7.76,19.11C8.54,19.9 9.8,19.9 10.59,19.11L14.12,15.58L9.17,10.63L4.22,15.58Z" />
											</svg>
											<span>Reset Theme Options</span>
										</a> 
										<small style="color:red">(Destructive!)</small>
										
									</li>
                                       
                                    
									
									<li>
										<a target="_blank" href="https://mastertheme.com/" class="">
											<svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" viewBox="0 0 16 16" style="" lc-helper="svg-icon">
												<path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"></path>
											</svg>
											<span>Learn more at mastertheme.com</span>
										</a>
									
									</li>
                        </ul>
                        <div style="font-size:9px" id="ps-panel-actions-loading-target"></div>
                
				    </div>
				</div>
        	</div>
    	</div>                        
    </div> <!-- close wrap -->






    <div class="wrap">
		
		<h2> How to add your own CSS / SCSS code</h2>
		 
		<div class="metabox-holder">
			<div class="postbox" style="padding: 0 10px;"> 
				<?php 
				if (get_template_directory() === get_stylesheet_directory()) {
					echo '
					<p style="font-style:italic"><b style="font-family:Courier;font-size:20px;">Please do not edit directly the mastertheme theme folder. </b></p>
					
					<p>To add your own [SASSy] CSS code, you need to enable a child theme (free at mastertheme.com). </p>
					
					';
					} else {
					echo '<p>You can freely edit the <b style="font-family:Courier;font-size:20px;"> sass/_custom.scss </b> file inside your child theme folder.</p>
					<p>Open this file with your favourite text editor, save, and view the page as admin in your browser:<br>
					A new CSS bundle will be built and served via ajax after a couple seconds.<br> So while working on your CSS / SCSS code, you can immediately see the "results" of your new styling edits without reloading the page.</p>
					
					<p style="font-style:italic" >Stop hitting cmd-R like a drunken monkey!</p>';
					}
				?>
			</div><!-- .postbox -->
 
		</div><!-- .metabox-holder -->

	</div><!--end .wrap-->





    <div class="wrap">
		<h2> Import / Export Theme Settings</h2>

		<div class="metabox-holder">
			<div class="postbox">
				<h3><span><?php _e( 'Export Settings' ); ?></span></h3>
				<div class="inside">
					<p><?php _e( 'Export the theme settings for this site as a .json file. This allows you to easily import the configuration into another site.' ); ?></p>
					<form method="post">
						<p><input type="hidden" name="pico_action" value="export_settings" /></p>
						<p>
							<?php wp_nonce_field( 'pico_export_nonce', 'pico_export_nonce' ); ?>
							<?php submit_button( __( 'Export' ), 'secondary', 'submit', false ); ?>
						</p>
					</form>
				</div><!-- .inside -->
			</div><!-- .postbox -->

			<div class="postbox">
				<h3><span><?php _e( 'Import Settings' ); ?></span></h3>
				<div class="inside">
					<p><?php _e( 'Import the plugin settings from a .json file. This file can be obtained by exporting the settings on another site using the form above.' ); ?></p>
					<form method="post" enctype="multipart/form-data">
						<p>
							<input type="file" name="import_file"/>
						</p>
						<p>
							<input type="hidden" name="pico_action" value="import_settings" />
							<?php wp_nonce_field( 'pico_import_nonce', 'pico_import_nonce' ); ?>
							<?php submit_button( __( 'Import' ), 'secondary', 'submit', false ); ?>
						</p>
					</form>
				</div><!-- .inside -->
			</div><!-- .postbox -->
		</div><!-- .metabox-holder -->

	</div><!--end .wrap-->




    <?php
}


///EXPORT AS JSON FILE
function pico_process_settings_export() {

	if( empty( $_POST['pico_action'] ) || 'export_settings' != $_POST['pico_action'] )
		return;

	if( ! wp_verify_nonce( $_POST['pico_export_nonce'], 'pico_export_nonce' ) )
		return;

	if( ! current_user_can( 'manage_options' ) )
		return;

	$settings = array();

    foreach (get_theme_mods() as $setting_name => $setting_value):
        if ($setting_name=="mastertheme_scss_last_filesmod_timestamp") continue;
        if ($setting_name=="custom_css_post_id") continue;
        $settings[$setting_name]=$setting_value;
    endforeach;

	ignore_user_abort( true );

	nocache_headers();
	header( 'Content-Type: application/json; charset=utf-8' );
	header( 'Content-Disposition: attachment; filename=pico-settings-export-' . date( 'm-d-Y' ) . '.json' );
	header( "Expires: 0" );

	echo json_encode( $settings );
	exit;
}
add_action( 'admin_init', 'pico_process_settings_export' );




//IMPORT FROM JSON

function pico_process_settings_import() {

	if( empty( $_POST['pico_action'] ) || 'import_settings' != $_POST['pico_action'] )
		return;

	if( ! wp_verify_nonce( $_POST['pico_import_nonce'], 'pico_import_nonce' ) )
		return;

	if( ! current_user_can( 'manage_options' ) )
		return;

	@$extension = end( explode( '.', $_FILES['import_file']['name'] ) );

	if( $extension != 'json' ) {
		wp_die( __( 'Please upload a valid .json file' ) );
	}

	$import_file = $_FILES['import_file']['tmp_name'];

	if( empty( $import_file ) ) {
		wp_die( __( 'Please upload a file to import' ) );
	}

	// Retrieve the settings from the file and convert the json object to an array.
	$settings = (array) json_decode( file_get_contents( $import_file ) );
    
	$theme = get_option( 'stylesheet' );
	
	update_option( "theme_mods_$theme", $settings );
    wp_safe_redirect( admin_url( 'themes.php?page=mastertheme-theme-options&successful-import' ) ); 
    
    exit;

}
add_action( 'admin_init', 'pico_process_settings_import' );