<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jadwiga_theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<div>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</div>

			<?php
			endif;
			
			/*
			 * Aktualności, kategoria id 6 wyświetlona osobno, na początku.
			 * 5 elementów z kategorii.
			 */
			
			$category = get_category(6);
			$args=array(
					'showposts' => 5,
					'category__in' => array($category->term_id),
					'ignore_sticky_posts' => 1
			);
			query_posts($args);
			echo '<h2 class="category-title">' . $category->name . '</h2>';

			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/titles', get_post_format() );

			endwhile;
			echo '<p class="archives-link"><a href="'. get_category_link( $category->term_id ) . '" title="' . sprintf( __( "Zobacz wszystkie wpisy z kategorii %s" ), $category->name ) . '">Archiwum ' . $category->name . '</a></p>';
			wp_reset_query();
			
			/*
			 * Pozostałe kategorie, z wyłączeniem Aktualności.
			 * 1 element z kategorii.
			 */
			
			$cat_args=array(
				'orderby' => 'id',
				'order' => 'ASC',
				'exclude' => 6
			);
			$categories=get_categories($cat_args);
			
			foreach($categories as $category) { 
				$args=array(
					'showposts' => 1,
					'category__in' => array($category->term_id),
					'ignore_sticky_posts' => 1
				);
				query_posts($args); 
				echo '<h2 class="category-title">' . $category->name . '</h2>';

				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/titles', get_post_format() );

				endwhile;
				echo '<p class="archives-link"><a href="'. get_category_link( $category->term_id ) . '" title="' . sprintf( __( "Zobacz wszystkie wpisy z kategorii %s" ), $category->name ) . '">Archiwum ' . $category->name . '</a></p>';
				wp_reset_query();
			
			}

		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>

		</main>
	</div>

<?php
get_sidebar();
get_footer();
