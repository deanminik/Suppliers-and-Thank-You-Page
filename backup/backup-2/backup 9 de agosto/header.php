<?php 
	$lw_instagram = starkers_admin_get_option( 'instagram_text' );
	$lw_linkedin = starkers_admin_get_option( 'linkedin_text' );
	$lw_twitter = starkers_admin_get_option( 'twitter_text' );
?>
<style>
.menu--main ul li:last-child .sub-menu, .menu--main ul li:nth-last-child(2) .sub-menu {
    left:0 !important;
    right:auto;
}
</style>
<header class="header">
	<div class="grid-wrap">
		<div class="grid">
			<div class="grid__item desk--one-quarter push--desk--one-twelfth">
				<a href="<?php echo home_url(); ?>" class="logo"><?php include(get_stylesheet_directory() . '/images/svg/logo-livewire.php'); ?></a>
				<button class="hamburger hamburger--squeeze menu-toggle" type="button">
				  <span class="hamburger-box">
				    <span class="hamburger-inner"></span>
				  </span>
				</button>
			</div><!--
		
			--><div class="grid__item desk--seven-twelfths push--desk--one-twelfth">
				<nav class="menu--main" id="menu">
					<ul>
						<?php wp_nav_menu( array('menu' => 'Main Menu', 'container' => '', 'items_wrap' => '%3$s'  )); ?>
					</ul>
					<ul class="menu--social--header">
						<?php if( $lw_instagram) : ?>
							<li><a href="<?php echo $lw_instagram; ?>" target="_blank">Instagram</a></li>
						<?php endif; ?>
						<?php if( $lw_linkedin) : ?>
							<li><a href="<?php echo $lw_twitter; ?>" target="_blank">Twitter</a></li>
						<?php endif; ?>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</header>