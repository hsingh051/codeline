<?php
/**
 * The Template for displaying all single posts.
 *
 * @package unite
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>
			<?php 
				$taxargs = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'names');
				$countries = wp_get_post_terms( $post->ID, 'films_country', $taxargs );
				$genres = wp_get_post_terms( $post->ID, 'films_genre', $taxargs );
				//print_r($countries);
				//die('d');
			?>
			<h3><b>Country</b>: <?php echo implode(', ',$countries);?></h3>
			<h3><b>Genre</b>: <?php echo implode(', ',$genres);?></h3>
			<h3><b>Ticket Price</b>: <?php echo get_field('fticket_price',$post->ID);?></h3> 
			<h3><b>Release Date</b>: <?php echo get_field('frelease_date',$post->ID);?></h3>
			<hr>
			<?php unite_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>