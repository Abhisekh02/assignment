<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Assignment
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'assignment' ); ?></a>

	<header>
		<div class="site_container">
			<div class="site_row">
				<div class="col-20">
					<div class="site_logo">
						<h1><a href="<?php echo get_home_url(); ?>">Logo</a></h1>
					</div>
				</div>
				<div class="col-80">
					<div class="herader_menu">
						<?Php 
              wp_nav_menu( array(
                  'menu'           => 'Primary',
                  'theme_location' => 'menu-1'
              ) );
						?>
					</div>
				</div>
			</div>
		</div>
	</header>