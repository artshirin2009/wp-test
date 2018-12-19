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









?>