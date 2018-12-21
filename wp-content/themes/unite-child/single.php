<?php
/**
 * The Template for displaying all single posts.
 *
 * @package unite
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
		
	<p>unite-child/single.php</p>
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<p>Страна - 
			<?php $cur_terms = get_the_terms( $post->ID, 'countries' );
			if( is_array( $cur_terms ) ){
				foreach( $cur_terms as $cur_term ){
					echo '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>';
				}
			}
			?>
		</p>

		<p>Жанр - 
		<?php $cur_terms = get_the_terms( $post->ID, 'genre' );
			if( is_array( $cur_terms ) ){
				foreach( $cur_terms as $cur_term ){
					echo '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a> ';
				}
			}
		?>
		</p>
		<p>Стоимость сеанса - <?php echo get_post_meta($post->ID, 'Стоимость сеанса', true); ?> </p>
		<p>Дата выхода - <?php echo get_post_meta($post->ID, 'Дата выхода', true); ?></p>

		<?php get_posts();?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>