<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jadwiga_theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php
		$children = get_pages( array( 'child_of' => $post->ID ) );
		if (is_page() && (count( $children ) > 0 || $post->post_parent)) { ?>
			<section class="widget">
				<h2 class="widget-title">Podstrony</h2>
				<?php if ( $post->post_parent ) { ?>
				<a href="<?php echo get_permalink( $post->post_parent ); ?>" class="pages-navigate-back" >
					← Wstecz do: <?php echo get_the_title( $post->post_parent ); ?>
 				</a>
			<?php } ?>
			<?php echo do_shortcode("[jadwiga_childpages]"); ?>
			</section>
	<?php
		}
	?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
