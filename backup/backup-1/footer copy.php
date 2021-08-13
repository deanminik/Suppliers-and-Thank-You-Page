<?php
	$lw_facebook = starkers_admin_get_option( 'facebook_text' );
	$lw_twitter = starkers_admin_get_option( 'twitter_text' );
	$lw_instagram = starkers_admin_get_option( 'instagram_text' );
	$lw_linkedin = starkers_admin_get_option( 'linkedin_text' );
	$lw_glassdoor = starkers_admin_get_option( 'glassdoor_text' );
?>

<footer class="container">
	<a href="#" class="go-top"><i class="icon-arrow-up"></i>Top</a>
	<div class="grid-wrap">
		<div class="grid">
			<div class="grid__item lap--one-half desk--one-quarter push--desk--one-twelfth">
				<a href="<?php echo home_url(); ?>" class="logo"><?php include(get_stylesheet_directory() . '/images/svg/Bottom-Logo.png'); ?></a>
			</div><!--
			--><div class="grid__item lap--one-quarter desk--one-sixth push--desk--one-third">
				<nav class="menu--footer">
					<ul>
						<?php wp_nav_menu( array('menu' => 'Footer Menu - Left', 'container' => '', 'items_wrap' => '%3$s'  )); ?>
					</ul>
				</nav>
			</div><!--
			--><div class="grid__item lap--one-quarter desk--one-third push--desk--one-third">
				<nav class="menu--footer">
					<ul>
						<?php wp_nav_menu( array('menu' => 'Footer Menu - Right', 'container' => '', 'items_wrap' => '%3$s'  )); ?>
					</ul>
				</nav>
				<?php if( $lw_facebook || $lw_twitter || $lw_linkedin || $lw_instagram || $lw_glassdoor ) : ?>
					<nav class="menu--social">
						<ul>
							<?php if( $lw_facebook) : ?>
								<li><a href="<?php echo $lw_facebook; ?>" target="_blank"><i class="icon-facebook"></i></a></li>
							<?php endif; ?>
							<?php if( $lw_twitter) : ?>
								<li><a href="<?php echo $lw_twitter; ?>" target="_blank"><i class="icon-twitter"></i></a></li>
							<?php endif; ?>
							<?php if( $lw_instagram) : ?>
								<li><a href="<?php echo $lw_instagram; ?>" target="_blank"><i class="icon-instagram"></i></a></li>
							<?php endif; ?>
							<?php if( $lw_linkedin) : ?>
								<li><a href="<?php echo $lw_linkedin; ?>" target="_blank"><i class="icon-linkedin"></i></a></li>
							<?php endif; ?>
							<?php if( $lw_glassdoor) : ?>
								<li><a href="<?php echo $lw_glassdoor; ?>" target="_blank"><i class="icon-glassdoor"></i></a></li>
							<?php endif; ?>
						</ul>
					</nav>
				<?php endif; ?>
			</div>
			<div class="grid__item desk--five-sixths push--desk--one-twelfth">
				<p class="copyright">&copy; <?php echo date('Y') ?> Livewire Communications Inc. <span>All Rights Reserved.</span> <!--<span><a href="/">Privacy</a> / <a href="/">Terms &amp; Conditions</a></span>--></p>
			</div>
		</div>
	</div>
	
</footer>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-10610969-1', 'auto');
  ga('send', 'pageview');

</script>