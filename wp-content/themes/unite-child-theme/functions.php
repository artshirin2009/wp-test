<?php
    function create_post_type() {
        register_post_type( 'movies',
        array(
            'labels' => array(
            'name' => __( 'Фильмы' ),
            'singular_name' => __( 'Movies' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'custom-fields' )
        )
        );
    };

    register_taxonomy(
		'genre',
		'movies',
		array(
			'label' => __( 'Жанр' ),
			'rewrite' => array( 'slug' => 'genre' ),
			'hierarchical' => true,
		)
    );
    register_taxonomy(
		'countries',
		'movies',
		array(
			'label' => __( 'Страны' ),
			'rewrite' => array( 'slug' => 'countries' ),
			'hierarchical' => true,
		)
    );
    register_taxonomy(
		'year',
		'movies',
		array(
			'label' => __( 'Год' ),
			'rewrite' => array( 'slug' => 'year' ),
			'hierarchical' => true,
		)
    );
    register_taxonomy(
		'actors',
		'movies',
		array(
			'label' => __( 'Актёры' ),
			'rewrite' => array( 'slug' => 'actors' ),
			'hierarchical' => true,
		)
	);
    add_action( 'init', 'create_post_type' );


    // add_action( 'pre_get_posts', 'wpse_242473_add_post_type_to_home' );

    // function wpse_242473_add_post_type_to_home( $query ) {
    
    //     if( $query->is_main_query() && $query->is_home() ) {
    //         $query->set( 'post_type', array( 'post', 'movies') );
    //     }
    // }


    /**
     * Plugin name: WP Trac #42573: Fix for theme template file caching.
     * Description: Flush the theme file cache each time the admin screens are loaded which uses the file list.
     * Plugin URI: https://core.trac.wordpress.org/ticket/42573
     * Author: Weston Ruter, XWP.
     * Author URI: https://weston.ruter.net
     */
    function wp_42573_fix_template_caching( WP_Screen $current_screen ) {
        // Only flush the file cache with each request to post list table, edit post screen, or theme editor.
        if ( ! in_array( $current_screen->base, array( 'post', 'edit', 'theme-editor' ), true ) ) {
            return;
        }
        $theme = wp_get_theme();
        if ( ! $theme ) {
            return;
        }
        $cache_hash = md5( $theme->get_theme_root() . '/' . $theme->get_stylesheet() );
        $label = sanitize_key( 'files_' . $cache_hash . '-' . $theme->get( 'Version' ) );
        $transient_key = substr( $label, 0, 29 ) . md5( $label );
        delete_transient( $transient_key );
    }
    add_action( 'current_screen', 'wp_42573_fix_template_caching' );



?>