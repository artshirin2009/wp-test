<?php
    function art_create_post_type() {
        register_post_type( 'movies',
        array(
            'labels' => array(
            'name' => __( 'Фильмы' ),
            'singular_name' => __( 'Movies' )
            ),
            'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
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
    add_action( 'init', 'art_create_post_type' );

    

    function last_five_posts(){
       
            global $post;
            $args = array( 'posts_per_page' => 5, 'post_type'  => 'movies', 'orderby' => 'date' );
            $postslist = get_posts( $args );
            foreach ( $postslist as $post ) :
            setup_postdata( $post ); ?> 
                <div>
                    
                    <?php the_title(); ?>   
                    <?php the_excerpt(); ?>
                </div>
            <?php
            endforeach; 
            wp_reset_postdata();
        }
    
    
    add_shortcode( 'recentposts', 'last_five_posts' );