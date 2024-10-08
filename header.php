<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jadwiga_theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">Przejdź do treści</a>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<a href="<?php echo get_home_url(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/images/banner.png" alt="Logo Strony parafii pw. Świętej Królowej Jadwigi w Inowrocławiu" />
			</a>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">Nawigacja</button>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
		</nav>
	</header>
	<?
	if (is_home()) {
	?>
		<div class="call-to-action">
			<?php
			if ( is_active_sidebar( 'slider-1' ) ) {
				dynamic_sidebar( 'slider-1' );
			}
			?>
		</div>
	<? } ?>
	<div id="content" class="site-content">
