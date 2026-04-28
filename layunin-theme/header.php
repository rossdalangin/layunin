<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo esc_attr( get_theme_mod( 'meta_description', 'Layunin helps Filipinos achieve their goals.' ) ); ?>">
	<?php wp_head(); ?>
	<style>
		:root {
			--navy: <?php echo get_theme_mod( 'primary_color', '#0A192F' ); ?>;
			--gold: <?php echo get_theme_mod( 'accent_color', '#D4AF37' ); ?>;
			--logo-width: <?php echo get_theme_mod( 'logo_width', '180' ); ?>px;
		}
	</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<header id="masthead" class="site-header fixed-top">
		<div class="container">
			<div class="d-flex align-items-center justify-content-between">
				<div class="site-branding">
					<?php if ( has_custom_logo() ) : ?>
						<div class="logo-wrapper" style="max-width: var(--logo-width);"><?php the_custom_logo(); ?></div>
					<?php else : ?>
						<h1 class="site-title mb-0 h4"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-navy text-decoration-none fw-bold"><?php bloginfo( 'name' ); ?></a></h1>
					<?php endif; ?>
				</div>

				<nav id="site-navigation" class="main-navigation d-none d-lg-flex align-items-center gap-4">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'menu_class'     => 'nav ms-auto'
					) );
					?>
					<div class="header-actions d-flex align-items-center gap-3">
						<button id="dark-mode-toggle" class="btn btn-link text-navy p-0 fs-5">🌓</button>
						<a href="<?php echo esc_url( get_theme_mod('header_cta_link', '/contact/') ); ?>" class="btn btn-gold px-4 py-2 small fw-bold"><?php echo esc_html(get_theme_mod('header_cta_text', 'Work With Us')); ?></a>
					</div>
				</nav>

				<div class="d-lg-none d-flex align-items-center gap-3">
					<button id="dark-mode-toggle-mobile" class="btn btn-link text-navy p-0 fs-4">🌓</button>
					<button class="menu-toggle btn p-0 text-navy fs-2">
						<i class="fas fa-bars"></i>
					</button>
				</div>
			</div>
		</div>
	</header>
    <div style="height: 100px;"></div> <!-- Header spacer -->
