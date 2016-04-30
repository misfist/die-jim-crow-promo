<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Singl
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php post_type_archive_title(); ?>
					</h1>

				</header><!-- .page-header -->

				<?php //fetch terms
					$terms = get_terms( 'team-member-category', array(
					    'orderby'    => 'term_id',
					    'hide_empty' => 0
					) );
				?>

				<?php 
					// now run a query for each animal family
				foreach( $terms as $term ) :

					// Define the query
					$args = array(
						'post_type' => 'team-member',
						'tax_query' => array(
							array(
								'taxonomy' => 'team-member-category',
								'field'    => 'slug',
								'terms'    => $term->slug,
							),
						),
					);
					$query = new WP_Query( $args ); ?>

					<h2 class="entry-title"><?php echo $term->name; ?></h2>
					

				<?php /* Start the Loop */ ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_type() );
					?>

				<?php endwhile; ?>

				<?php singl_paging_nav(); ?>

			<?php endforeach; ?>

				

			<?php endif; ?>

		

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); ?>
