<?php
/**
 * Template Name: 100% Width
 * A full-width template.
 *
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<div class="sticky-sidebar">
	<a href="/delivery" class="fusion-button button-flat fusion-button-square button-medium button-custom button-2">
		<span class="fusion-button-text"><i class="fa fa-file-text-o"></i> Delivery Guide</span>
	</a>
	<a href="/quantity-calculator" class="fusion-button button-flat fusion-button-square button-medium button-custom button-2">
		<span class="fusion-button-text"><i class="fa fa-calculator"></i> Quantity Calculator</span>
	</a>
</div>
<?php get_header(); ?>
<section id="content" class="full-width">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php echo fusion_render_rich_snippets_for_pages(); // WPCS: XSS ok. ?>
			<?php avada_featured_images_for_pages(); ?>
			<div class="post-content">
				<?php the_content(); ?>
				<?php fusion_link_pages(); ?>
			</div>
			<?php if ( ! post_password_required( $post->ID ) ) : ?>
				<?php if ( Avada()->settings->get( 'comments_pages' ) ) : ?>
					<?php wp_reset_postdata(); ?>
					<?php comments_template(); ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	<?php endwhile; ?>
</section>
<?php
get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
