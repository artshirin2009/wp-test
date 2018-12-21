<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package unite
 */

get_header(); ?>
<div class="container"><p>unite-child/archive-art_movies.php</p></div>



<?php
$args = array( 'post_type' => 'movies', 'posts_per_page' => 6 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
?>
<div class="col-md-4">
	<div class="card">
	<img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_167cda4fc8a%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_167cda4fc8a%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.203125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
	<div class="card-body">
		<h5 class="card-title"> <?php the_title()?></h5>
		<!-- <section class="card-text"><?php the_content() ?></section> -->
		<section class="taxonomy-content"> 
		
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
		</section>
		<a href="<?php the_permalink();?>" class="btn btn-primary">Подробнее</a>
		<br><br>
	</div>
	</div>
</div>


<? endwhile;

get_footer(); ?>


