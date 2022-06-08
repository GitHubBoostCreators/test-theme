<?php /* Template name: Login */ ?>

<?php get_header(); ?>

	<div class="container">
        <h1><?php the_title(); ?></h1>
	</div>
    <?php
    // FLEXIBELE CONTENT
    if(isset($_COOKIE['logedin'])):	
	?>

		<div class="container">
    		<div class="row">
        		<div class="col-md-8">
            		<?php 
            			if ( have_posts() ) : 
                			while ( have_posts() ) : the_post();
                    			the_content();
                			endwhile;
            			else :
							_e( 'Sorry, no posts matched your criteria.', 'textdomain' );
            			endif;
            		?>
        		</div>
			</div>
		</div>
	<?php
	endif;
	if(!isset($_COOKIE['logedin'])):
		?>
			<section>
            	<div class="container">
                	<div class="row">
						<div class="col-12 col-md-6">
							<h1>Login to get access to this content.</h1>
						</div>
						<div class="col-12 col-md-6">
							<form id="downloadform">
								<div class="form-group">
    								<label for="username">Gebruikersnaam</label>
    								<input type="text" class="form-control" id="username">
  								</div>
  								<div class="form-group">
    								<label for="password">Wachtwoord</label>
    								<input type="password" class="form-control" id="password">
  								</div>
								<div class="form-group">
									<input class="btn btn-primary" type="submit" value="Login">
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
		<?php
	endif;
	get_footer();
    ?>

<?php get_footer(); ?>
