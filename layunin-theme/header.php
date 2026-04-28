<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo esc_attr( get_theme_mod( 'meta_description', 'Layunin helps Filipinos achieve their goals.' ) ); ?>">
	<?php wp_head(); ?>
	<style>
		:root {
			--primary: <?php echo get_theme_mod( 'primary_color', '#001f3f' ); ?>;
			--accent: <?php echo get_theme_mod( 'accent_color', '#D4AF37' ); ?>;
			--logo-width: <?php echo get_theme_mod( 'logo_width', '180' ); ?>px;
		}
		.custom-logo-link img { max-width: var(--logo-width); height: auto; }
	</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<div id="preloader">
		<div class="loader-circle"></div>
	</div>

<?php if ( get_theme_mod( 'show_announcement', true ) ) : ?>
	<a href="<?php echo esc_url( get_theme_mod('announcement_link', '/lead-magnet/') ); ?>" class="announcement-bar bg-gold text-navy text-center py-2 small fw-bold text-uppercase d-block text-decoration-none">
		<?php echo esc_html( get_theme_mod( 'announcement_text', 'EXCLUSIVE: Claim Your Free 7-Day Goal Reset Guide & Transform Your Life!' ) ); ?>
	</a>
<?php endif; ?>

<div id="page" class="site">
	<header id="masthead" class="site-header <?php echo get_theme_mod('header_sticky', true) ? 'sticky-top' : ''; ?>">
		<div class="container">
			<div class="d-flex align-items-center justify-content-between">
				<div class="site-branding">
					<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php else : ?>
						<h1 class="site-title mb-0 h3"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-navy text-decoration-none fw-bold"><?php bloginfo( 'name' ); ?></a></h1>
					<?php endif; ?>
				</div>

				<nav id="site-navigation" class="main-navigation d-none d-lg-flex align-items-center gap-5">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'menu_class'     => 'nav'
					) );
					?>
					<div class="header-cta">
						<a href="<?php echo esc_url( get_theme_mod('header_cta_link', '/contact/') ); ?>" class="btn btn-gold"><?php echo esc_html(get_theme_mod('header_cta_text', 'Work With Us')); ?></a>
					</div>
				</nav>

				<div class="d-lg-none d-flex align-items-center gap-3">
					<button class="menu-toggle btn p-0 text-navy fs-3">
						<i class="fas fa-bars"></i>
					</button>
				</div>
			</div>
		</div>
	</header>
