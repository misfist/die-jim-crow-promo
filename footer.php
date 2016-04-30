<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Singl
 */
$sidebar = ( is_active_sidebar( 'sidebar-1' )
          || is_active_sidebar( 'sidebar-2' )
          || is_active_sidebar( 'sidebar-3' )
) ? true : false;
?>

		</div><!-- #content -->
	</div><!-- .page-wrapper -->

	<div class="bottom-wrapper<?php if ( $sidebar ) echo ' has-sidebar'; ?>">
		<?php if ( $sidebar ) : ?>
			<div class="trigger-wrapper clear">
				<a href="#" class="widgets-trigger closed" title="<?php esc_attr_e( 'Widgets', 'singl' ); ?>">
					<span class="fa fa-angle-up"><span class="screen-reader-text"><?php _e( 'Widgets', 'singl' ); ?></span></span>
				</a>
			</div><!-- .trigger-wrapper -->
			<div id="widgets-wrapper" class="bottom-panel hide">
				<?php get_sidebar(); ?>
			</div><!-- #widgets-wrapper -->
		<?php endif ;?>

		<?php if ( singl_display_subscribe_widget() ) : ?>
			<div class="subscribe-form-wrapper">
				<?php singl_subscribe_widget(); ?>
			</div><!-- .subscribe-form-wrapper -->
		<?php endif; ?>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				Copyleft Info. <a href="https://github.com/misfist/die-jim-crow-promo" target="_blank">Source Code</a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- .bottom-wrapper -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
