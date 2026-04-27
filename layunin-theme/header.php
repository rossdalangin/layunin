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
	<meta property="og:image" content="<?php echo esc_url( get_theme_mod( 'hero_bg_image' ) ); ?>">

	<!-- Twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
	<meta property="twitter:title" content="<?php echo wp_get_document_title(); ?>">
	<meta property="twitter:description" content="<?php echo esc_attr( get_theme_mod( 'meta_description' ) ); ?>">
	<meta property="twitter:image" content="<?php echo esc_url( get_theme_mod( 'hero_bg_image' ) ); ?>">

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<style>
		:root {
			--primary: <?php echo get_theme_mod( 'primary_color', '#001f3f' ); ?>;
			--accent: <?php echo get_theme_mod( 'accent_color', '#D4AF37' ); ?>;
		}
		body { font-family: '<?php echo get_theme_mod( "body_font", "Inter" ); ?>', sans-serif; }
		<?php if ( get_theme_mod( 'hero_bg_image' ) ) : ?>
			.hero-section { background-image: url('<?php echo esc_url( get_theme_mod( "hero_bg_image" ) ); ?>'); background-size: cover; background-position: center; }
		<?php endif; ?>
	</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if ( get_theme_mod( 'show_announcement', true ) ) : ?>
	<div class="announcement-bar bg-gold text-white text-center py-3 small fw-bold text-uppercase letter-spacing-1">
		<?php echo esc_html( get_theme_mod( 'announcement_text', 'Exclusive: Get the 7-Day Goal Reset Guide Free Today!' ) ); ?>
	</div>
<?php endif; ?>

<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;
				?>
			</div>

			<nav id="site-navigation" class="main-navigation d-flex align-items-center gap-4">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'container'      => false,
				) );
				?>
				<div class="header-actions d-none d-lg-flex align-items-center gap-3">
					<button id="dark-mode-toggle" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 40px; height: 40px; padding: 0;">🌓</button>
					<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-gold btn-sm px-4">Work With Us</a>
				</div>
				<button class="menu-toggle d-lg-none" aria-controls="primary-menu" aria-expanded="false">☰</button>
			</nav>
		</div>
	</header>
