<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		<div class="container h-100">
			<div class="header-inner d-flex align-items-center justify-content-between h-100">

                <div class="site-branding">
					<?php if ( has_custom_logo() ) : ?>
						<div class="logo-wrapper" style="max-width: var(--logo-width);"><?php the_custom_logo(); ?></div>
					<?php else : ?>
						<h1 class="site-title mb-0 h3"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-navy text-decoration-none fw-bold"><?php bloginfo( 'name' ); ?></a></h1>
					<?php endif; ?>
				</div>

				<nav id="site-navigation" class="main-navigation d-none d-lg-flex align-items-center">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'menu_class'     => 'nav ms-auto gap-1'
					) );
					?>
					<div class="header-actions ms-5 d-flex align-items-center gap-3">
						<button id="dark-mode-toggle" class="btn btn-link text-navy p-0 fs-5" title="Switch Mode">🌓</button>
						<a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="btn btn-gold px-4 py-2 small fw-bold shadow-sm"><?php echo esc_html(get_theme_mod('header_cta_text', 'Join the Elite')); ?></a>
					</div>
				</nav>

				<div class="d-lg-none d-flex align-items-center gap-3">
					<button id="dark-mode-toggle-mobile" class="btn btn-link text-navy p-0 fs-4">🌓</button>
					<button class="menu-toggle btn p-0 text-navy fs-2" aria-expanded="false">
						<i class="fas fa-bars"></i>
					</button>
				</div>

			</div>
		</div>

        <!-- Mobile Overlay Menu -->
        <div id="mobile-overlay" class="mobile-overlay">
            <div class="mobile-overlay-header d-flex justify-content-between align-items-center px-4 py-3">
                <span class="text-gold fw-bold letter-spacing-1 small">LAYUNIN ELITE</span>
                <button class="mobile-close btn text-white fs-3 p-0"><i class="fas fa-times"></i></button>
            </div>
            <div class="mobile-menu-inner container text-center d-flex flex-column py-5">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'container'      => false,
                    'menu_class'     => 'mobile-nav list-unstyled'
                ) );
                ?>
                <div class="mobile-menu-footer mt-5 px-4 animate-up">
                    <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="btn btn-gold w-100 mb-4"><?php echo esc_html(get_theme_mod('header_cta_text', 'Join the Elite')); ?></a>
                    <div class="social-links d-flex justify-content-center gap-4 fs-4 text-white opacity-75">
                        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>

	</header>
    <div class="header-spacer" style="height: 120px;"></div>
