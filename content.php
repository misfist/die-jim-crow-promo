<?php
/**
 * @package Die_Jim_Crow_Promo
 */
$format = get_post_format();
$slug = get_post_field( 'post_name', get_post() );
?>

<article id="<?php echo $slug; ?>" <?php post_class(); ?>>
	<?php if ( '' != get_the_post_thumbnail() && '' == $format ) : ?>
		<div class="entry-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'die-jim-crow' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="<?php the_ID(); ?>">
				<?php the_post_thumbnail( 'featured-image' ); ?>
			</a>
		</div><!-- .entry-thumbnail -->
	<?php endif; ?>

	<header class="entry-header">
		<?php
			if ( 'link' == $format ) :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( singl_get_link_url() ) . '" rel="bookmark">', '</a></h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_time(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
				<?php if( has_post_format() ) : ?>
					<span class="entry-format">&mdash; <a href="<?php echo esc_url( get_post_format_link( $format ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'die-jim-crow' ), get_post_format_string( $format ) ) ); ?>"><?php echo get_post_format_string( $format ); ?></a></span>
				<?php endif; ?>
				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
					<span class="comments-link">&mdash; <?php comments_popup_link( __( 'Leave a comment', 'die-jim-crow' ), __( '1 Comment', 'die-jim-crow' ), __( '% Comments', 'die-jim-crow' ) ); ?></span>
				<?php endif; ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading', 'die-jim-crow' ) ); ?>
			<?php
				wp_link_pages( array(
					'before'   => '<div class="page-links">',
					'after'    => '</div>',
					'pagelink' => '<span class="page-link">%</span>',
				) );
			?>
		</div><!-- .entry-content -->
	<?php endif; ?>

	<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
		<footer class="entry-meta">
			<?php
				/* translators: used between list items, there is a space after the comma */
				$category_list = get_the_category_list( __( ', ', 'die-jim-crow' ) );

				/* translators: used between list items, there is a space after the comma */
				$tag_list = get_the_tag_list( '', __( ', ', 'die-jim-crow' ) );

				if ( ! singl_categorized_blog() ) {
					// This blog only has 1 category so we just need to worry about tags in the meta text
					if ( '' != $tag_list ) {
						$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'die-jim-crow' );
					} else {
						$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'die-jim-crow' );
					}

				} else {
					// But this blog has loads of categories so we should probably display them here
					if ( '' != $tag_list ) {
						$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'die-jim-crow' );
					} else {
						$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'die-jim-crow' );
					}

				} // end check for categories on this blog

				printf(
					$meta_text,
					$category_list,
					$tag_list,
					get_permalink()
				);
			?>

			<?php edit_post_link( __( 'Edit', 'die-jim-crow' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	<?php endif; // End if 'post' == get_post_type() ?>
</article><!-- #post-## -->
