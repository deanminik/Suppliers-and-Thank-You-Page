<?php
/*
Template Name: Page - Full
*/
	global $post;

	$parents = get_post_ancestors( $post->ID );
    /* Get the top Level page->ID count base 1, array base 0 so -1 */ 
	$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
	/* Get the parent and set the $class with the page slug (post_name) */
    $parent = get_post( $id );
	//var_dump($parent);
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php
	if( has_post_thumbnail() ) {
		$feature_img = get_the_post_thumbnail_url();
	} else {
		$feature_img = "";
	}
?>

<?php
	if ( $feature_img != "") {								
?>
	<div class="container hero hero-rtcc">
		<img src="<?php echo $feature_img; ?>" alt="" class="rellax">
	</div>
<?php
	}
?>
<section class="container">	
	<div class="grid-wrap">
		<!--<img class="bookdriveimg" src="<?php echo bloginfo('stylesheet_directory'); ?>/images/bookdrive-book.jpg" style="" />-->
		<div class="grid">
			<div class="grid__item desk--five-sixths push--desk--one-twelfth">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php if(get_children(array('post_parent'=>get_the_ID(), 'post_type'=>'page')) || $post->post_parent ): ?>
						<nav class="sub-nav">
							<ul>
								<?php echo starkers_display_subnav($post->ID, $post->ancestors); ?>
							</ul>
						</nav>
					<?php endif; ?>
					<div style="height:25px;width:100%"></div>
					<div class="page__content"><?php the_content(); ?></div>
			<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>