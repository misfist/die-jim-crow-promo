<?php
/**
 * @package Die_Jim_Crow_Promo
 */
$format = get_post_format();
$slug = get_post_field( 'post_name', get_post() );
?>

<article id="<?php echo $slug; ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<?php if ( '' != get_the_post_thumbnail() && '' == $format ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'die-jim-crow' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="<?php the_ID(); ?>">
				<?php the_post_thumbnail( 'featured-image' ); ?>
			</a>
		</div><!-- .entry-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'   => '<div class="page-links">',
				'after'    => '</div>',
				'pagelink' => '<span class="page-link">%</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'die-jim-crow' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
