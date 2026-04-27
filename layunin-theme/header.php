<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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

<?php if ( get_theme_mod( 'show_announcement', false ) ) : ?>
	<div class="announcement-bar bg-accent text-white text-center py-2 small fw-bold">
		<?php echo esc_html( get_theme_mod( 'announcement_text', 'Check out our new Goal Planner!' ) ); ?>
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

			<nav id="site-navigation" class="main-navigation d-flex align-items-center">
				<button id="dark-mode-toggle" class="btn btn-sm btn-outline-primary me-3">🌓</button>
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">☰</button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</nav>
		</div>
	</header>
