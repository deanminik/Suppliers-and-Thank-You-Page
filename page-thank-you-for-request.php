<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
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
		$feature_id = get_post_thumbnail_id();
		$feature_alt = get_the_title($feature_id);
	} else {
		$feature_img = "";
	}
?>

<div class="container hero" style="background-image:url('https://livewireinc.com/wp-content/rogerinner.jpg');background-position:center">
	<img src="" alt="<?php echo $feature_alt; ?>" class="rellax" style="transform: translate3d(0px, 12.9px, 0px);">
	<div class="hero__title">
		<div class="grid-wrap">
			<div class="grid">
			</div>
		</div>
	</div>
</div>

<section class="container">
	<div class="grid-wrap">
		<div class="grid">
			<div class="grid__item desk--five-sixths push--desk--one-twelfth">
													
					<div class="page__content"><p>&nbsp;<br>
&nbsp;<br>
</p>
<div><h2 style="color:#8ac43f">Thank you for your request. </h2><h4>Expect your copy of <em>roger</em> in 7-10 business days (international orders may take longer).</h4></div>
&nbsp;<br>
&nbsp;<br>&nbsp;<br>&nbsp;<br>
</p>
</div>
						</div>
		</div>
	</div>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>