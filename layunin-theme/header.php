<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo esc_attr( get_theme_mod( 'meta_description', 'Layunin - Empowering Filipinos to transform goals into action.' ) ); ?>">

	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
	<meta property="og:title" content="<?php echo wp_get_document_title(); ?>">
	<meta property="og:description" content="<?php echo esc_attr( get_theme_mod( 'meta_description' ) ); ?>">
	<meta property="og:image" content="<?php echo esc_url( get_theme_mod( 'hero_image' ) ); ?>">

	<!-- Twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
	<meta property="twitter:title" content="<?php echo wp_get_document_title(); ?>">
	<meta property="twitter:description" content="<?php echo esc_attr( get_theme_mod( 'meta_description' ) ); ?>">
	<meta property="twitter:image" content="<?php echo esc_url( get_theme_mod( 'hero_image' ) ); ?>">

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<style>
		:root {
			--primary: <?php echo get_theme_mod( 'primary_color', '#001f3f' ); ?>;
			--accent: <?php echo get_theme_mod( 'accent_color', '#D4AF37' ); ?>;
			--logo-width: <?php echo get_theme_mod( 'logo_width', '150' ); ?>px;
		}
		body { font-family: '<?php echo get_theme_mod( "body_font", "Inter" ); ?>', sans-serif; }
		.custom-logo-link img { max-width: var(--logo-width); height: auto; }

		/* Custom Section Colors */
		.problem-section { background-color: <?php echo get_theme_mod('bg_color_problem', '#ffffff'); ?>; }
		.solution-section { background-color: <?php echo get_theme_mod('bg_color_solution', '#f9f9f9'); ?>; }
		.categories-section { background-color: <?php echo get_theme_mod('bg_color_categories', '#ffffff'); ?>; }
		.products-section { background-color: <?php echo get_theme_mod('bg_color_products', '#ffffff'); ?>; }
		.services-section { background-color: <?php echo get_theme_mod('bg_color_services', '#f9f9f9'); ?>; }
		.testimonials-section { background-color: <?php echo get_theme_mod('bg_color_testimonials', '#f9f9f9'); ?>; }

		/* Design Controls */
		.card, .btn, .form-control { border-radius: <?php echo get_theme_mod('border_radius', '24'); ?>px !important; }
	</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<div id="preloader">
		<div class="loader-circle"></div>
	</div>

	<div id="search-overlay" class="search-overlay">
		<span id="search-close" class="search-close">&times;</span>
		<div class="search-overlay-content container">
			<form role="search" method="get" class="search-form-overlay text-center" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="search" class="search-field-overlay" placeholder="What are you looking for?" value="<?php echo get_search_query(); ?>" name="s" />
				<br>
				<button type="submit" class="search-submit-overlay btn btn-gold btn-lg mt-5">Search My Goals</button>
			</form>
		</div>
	</div>

<?php if ( get_theme_mod( 'show_announcement', true ) ) : ?>
	<a href="<?php echo esc_url( get_theme_mod('announcement_link', '#') ); ?>" class="announcement-bar bg-gold text-white text-center py-3 small fw-bold text-uppercase letter-spacing-1 d-block text-decoration-none">
		<?php echo esc_html( get_theme_mod( 'announcement_text', 'Exclusive: Get the 7-Day Goal Reset Guide Free Today!' ) ); ?>
	</a>
<?php endif; ?>

<div id="page" class="site">
	<header id="masthead" class="site-header <?php echo get_theme_mod('header_sticky', true) ? 'sticky-top' : ''; ?>">
		<div class="container d-flex align-items-center justify-content-between">
			<div class="site-branding">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<h1 class="site-title mb-0 h4"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-navy text-decoration-none fw-bold"><?php bloginfo( 'name' ); ?></a></h1>
				<?php endif; ?>
			</div>

			<nav id="site-navigation" class="main-navigation d-flex align-items-center gap-4">
				<div class="d-none d-lg-block">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'menu_class'     => 'nav justify-content-center'
					) );
					?>
				</div>
				<div class="header-actions d-none d-lg-flex align-items-center gap-3">
					<button id="search-open" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 40px; height: 40px; padding: 0;"><i class="fas fa-search"></i></button>
					<?php if(is_single()) : ?>
						<button id="reading-mode-toggle" class="btn btn-sm btn-outline-primary rounded-circle" title="Reading Mode" style="width: 40px; height: 40px; padding: 0;"><i class="fas fa-book-open"></i></button>
					<?php endif; ?>
					<button id="dark-mode-toggle" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 40px; height: 40px; padding: 0;">🌓</button>
					<a href="<?php echo esc_url( get_theme_mod('header_cta_link', '/contact/') ); ?>" class="btn btn-gold btn-sm px-4 fw-bold"><?php echo esc_html(get_theme_mod('header_cta_text', 'Work With Us')); ?></a>
				</div>
				<div class="header-actions-mobile d-lg-none d-flex align-items-center gap-3">
					<button id="search-open-mobile" class="btn p-0 text-primary fs-5"><i class="fas fa-search"></i></button>
					<button id="dark-mode-toggle-mobile" class="btn p-0 text-primary fs-5">🌓</button>
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span></span>
						<span></span>
						<span></span>
					</button>
				</div>
			</nav>
		</div>
	</header>
