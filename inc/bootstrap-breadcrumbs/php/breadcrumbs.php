<?php
function bootstrap_breadcrumb() {
	$categories = get_the_category();
	?>
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?php home_url(); ?>">Home</a>
			</li>
			<?php
    		if (is_category() || is_single()){
			?>
			<li class="breadcrumb-item">
				<a href="<?php echo get_category_link( $categories[0]->term_id ); ?>"><?php echo $categories[0]->name; ?></a>
			</li>
			<?php
				if (is_single()):
				?>
				<li class="breadcrumb-item active" aria-current="page">
					<?php the_title(); ?>
				</li>
				<?php
				endif;
			}
			elseif (is_page()){
			?>
			<li class="breadcrumb-item active" aria-current="page">
				<?php the_title(); ?>
			</li>
			<?php
			}
			elseif(is_search()){
			?>
			<li class="breadcrumb-item active" aria-current="page">
				<?php the_search_query(); ?>
			</li>
			<?php
			}
			?>
		</ol>
	</nav>
	<?php
}
?>