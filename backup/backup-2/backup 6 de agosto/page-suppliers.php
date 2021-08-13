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

?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header-suppliers' ) ); ?>

<section class="container">
	<div class="hero__title">
		<div class="grid-wrap">
			<div class="grid">
				<div class="grid__item desk--five-sixths push--desk--one-twelfth">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>

	<div class="grid-wrap">
		<div class="grid">
			<div class="grid__item desk--five-sixths push--desk--one-twelfth">
				<?php 
					$notice = wpautop(get_post_meta( get_the_ID(), '_lw_suppliers_notice_content', true ), true);
				?>
				<?php if( $notice != '' ): ?>
					<div class="message notice">
						<?php echo $notice; ?>
					</div>
				<?php endif; ?>

				<?php the_content(); ?>

				<?php gravity_form( 3, false, false ); ?>

				<?php 
					$help = wpautop(get_post_meta( get_the_ID(), '_lw_suppliers_help_content', true ), true);
				?>
				<?php if( $help != '' ): ?>
					<div class="message help icon-help">
						<?php echo $help; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer-suppliers','parts/shared/html-footer' ) ); ?>