<?php
	$work_post = get_page_by_path( 'our-work' );
	$work_id = $work_post->ID;

	require_once( 'functions/meta-boxes.php' );
	require_once( 'functions/pages/functions.php' );
	require_once( 'functions/posts/functions.php' );
	require_once( 'functions/announcements/functions.php' );
	require_once( 'functions/team/functions.php' );
	require_once( 'functions/clients/functions.php' );
	require_once( 'functions/careers/functions.php' );
	require_once( 'functions/share/functions.php' );
	require_once( 'functions/forms/functions.php' );
	require_once( 'functions/suppliers/functions.php' );
	require_once( 'functions/admin/functions.php' );

	// Critical CSS

	function criticalCSS_wp_head() {
		echo '<style>';
		include get_stylesheet_directory() . '/css/critical.css.php';
		echo '</style>';
	}

	add_action( 'wp_head', 'criticalCSS_wp_head' );

	function lw_script_enqueuer() {
		wp_deregister_style('screen');
		wp_dequeue_script('site');
		wp_dequeue_script('flickity');
		wp_dequeue_script('modernizr');

        wp_register_style( 'fonts', '//fast.fonts.net/cssapi/57f2c7e2-dade-4dac-a768-08da04106f6a.css', '', '', 'screen' );
        wp_enqueue_style( 'fonts' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/css/style.css', '', '1.40', 'screen', true );
        wp_enqueue_style( 'screen' );

        wp_register_script( 'child-site', get_stylesheet_directory_uri().'/js/min/site.min.js', array( 'jquery' ), '1.40', true );
		wp_enqueue_script( 'child-site' );
	}

	add_action( 'wp_enqueue_scripts', 'lw_script_enqueuer', 100 );

	function loadmore_dialogue_scripts() {
	 
		global $wp_query; 
	 
		// register our main script but do not enqueue it yet
		wp_register_script( 'loadmore-dialogue', get_stylesheet_directory_uri() . '/js/loadmore-dialogue.js', array('jquery') );
	 
		// now the most interesting part
		// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
		// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
		wp_localize_script( 'loadmore-dialogue', 'loadmore_dialogue_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
			'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
			'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
			'max_page' => $wp_query->max_num_pages,
			'stylesheet_directory_uri' => get_stylesheet_directory_uri()
		) );
	 
		if( is_home() || is_archive() ) {
		 	wp_enqueue_script( 'loadmore-dialogue' );
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'loadmore_dialogue_scripts' );

	function loadmore_news_scripts() {
	 
		global $wp_query; 
	 
		// register our main script but do not enqueue it yet
		wp_register_script( 'loadmore-news', get_stylesheet_directory_uri() . '/js/loadmore-news.js', array('jquery') );
	 
		// now the most interesting part
		// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
		// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
		wp_localize_script( 'loadmore-news', 'loadmore_news_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
			'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
			'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
			'max_page' => $wp_query->max_num_pages,
			'stylesheet_directory_uri' => get_stylesheet_directory_uri()
		) );
	 
		if( is_post_type_archive( 'news' ) ) {
		 	wp_enqueue_script( 'loadmore-news' );
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'loadmore_news_scripts' );

	register_nav_menus( array( 'secondary' => 'Secondary Navigation', 'dialogue' => 'Dialogue Tags' ) );

	function new_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'new_excerpt_length', 999 );

	function lw_excerpt_more( $more ) {
	    return '&hellip; ';
	}
	add_filter( 'excerpt_more', 'lw_excerpt_more' );

	function lw_user_supplied_excerpt_more( $output ) {
	    if ( has_excerpt() ) {
	    	$output .= '&hellip; ';
	    }
	    return $output;
	}
	add_filter( 'get_the_excerpt', 'lw_user_supplied_excerpt_more' );

	// highlight active custom post page in nav
	add_filter( 'nav_menu_css_class', 'namespace_menu_classes', 10, 2 );
	function namespace_menu_classes( $classes , $item ){
		if ( get_post_type() == 'team' ) {
			// remove unwanted classes if found
			$classes = str_replace( 'current_page_parent', '', $classes );
			// find the url you want and add the class you want
			if ( $item->url == home_url() . '/our-story/' ) {
				$classes = str_replace( 'menu-item', 'menu-item current_page_parent', $classes );
			}
		}

		if ( get_post_type() == 'news' ) {
			// remove unwanted classes if found
			$classes = str_replace( 'current_page_parent', '', $classes );
			// find the url you want and add the class you want
			if ( $item->url == home_url() . '/our-culture/' ) {
				$classes = str_replace( 'menu-item', 'menu-item current_page_parent', $classes );
			}
		}

		return $classes;
	}

	// Get Archives for Custom Post Type
	function lw_post_type_archive_where($where,$args){  
	    $post_type  = isset($args['post_type'])  ? $args['post_type']  : 'post';  
	    $where = "WHERE post_type = '$post_type' AND post_status = 'publish'";
	    return $where;  
	}

	add_filter( 'getarchives_where','lw_post_type_archive_where',10,2);

	require_once( 'functions/plugin-cleanup.php' );
?>