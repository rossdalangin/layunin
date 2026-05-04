<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
	<style>
		:root {
			--navy: <?php echo get_theme_mod( 'primary_color', '#050A18' ); ?>;
			--gold: <?php echo get_theme_mod( 'accent_color', '#C5A02B' ); ?>;
            --accent: var(--gold);
			--logo-width: <?php echo get_theme_mod( 'logo_width', '200' ); ?>px;
            --border-radius: <?php echo get_theme_mod( 'border_radius', '16' ); ?>px;
            --body-font: '<?php echo get_theme_mod( 'body_font', 'Inter' ); ?>', sans-serif;
            --heading-font: '<?php echo get_theme_mod( 'heading_font', 'Playfair Display' ); ?>', serif;
            --phi: 1.618;
		}
        <?php
        $cats = array('Goal Setting', 'Online Income', 'Productivity', 'AI Tools', 'Mindset', 'Business', 'Success Stories');
        foreach($cats as $cat) {
            $cat_id = sanitize_title($cat);
            $color = get_theme_mod("color_cat_{$cat_id}");
            if($color) {
                echo ".category-{$cat_id} { --cat-color: {$color}; }\n";
                echo ".bg-cat-{$cat_id} { background-color: {$color} !important; }\n";
                echo ".text-cat-{$cat_id} { color: {$color} !important; }\n";
            }
        }
        ?>
        body { font-family: var(--body-font); }
        h1, h2, h3, h4, h5, h6, .display-1, .display-2, .display-3, .display-4 { font-family: var(--heading-font); }
        .card, .btn, .form-control, .rounded-4 { border-radius: var(--border-radius) !important; }
        .announcement-bar { background: var(--navy); color: #fff; padding: 10px 0; text-align: center; font-size: 0.875rem; font-weight: 600; position: relative; z-index: 2001; }
        .announcement-bar a { color: var(--gold); text-decoration: none; }
        .site-header { transition: all 0.3s ease; }
        .site-header.scrolled { top: 0 !important; }
	</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <?php if ( get_theme_mod( 'show_announcement', true ) ) : ?>
    <div class="announcement-bar">
        <div class="container">
            <?php
            $ann_text = get_theme_mod( 'announcement_text', 'LIMITED: Secure Your Free "Elite Productivity Vault" – Over 15,000+ Downloads!' );
            $ann_link = get_theme_mod( 'announcement_link', '/lead-magnet/' );
            if ( $ann_link ) : ?>
                <a href="<?php echo esc_url( $ann_link ); ?>" class="announcement-link"><span class="announcement-text"><?php echo esc_html( $ann_text ); ?></span> <i class="fas fa-arrow-right ms-2"></i></a>
            <?php else : ?>
                <span class="announcement-text"><?php echo esc_html( $ann_text ); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

	<header id="masthead" class="site-header fixed-top" style="<?php echo (get_theme_mod('show_announcement', true)) ? 'top: 44px;' : 'top: 0;'; ?>">
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
					<div class="header-actions header-cta ms-5 d-flex align-items-center gap-3">
                        <button id="search-open" class="btn btn-link text-navy p-0 fs-5" title="Search Strategy"><i class="fas fa-search"></i></button>
						<button id="dark-mode-toggle" class="btn btn-link text-navy p-0 fs-5" title="<?php echo esc_attr(get_theme_mod('header_dark_mode_title', 'Switch Mode')); ?>"><i class="fas fa-moon"></i></button>
						<a href="<?php echo esc_url( get_theme_mod('header_cta_link', home_url('/contact/')) ); ?>" class="btn btn-gold px-4 py-2 small fw-bold shadow-sm"><?php echo esc_html(get_theme_mod('header_cta_text', 'Join the Elite Community')); ?></a>
					</div>
				</nav>

				<div class="d-lg-none d-flex align-items-center gap-3">
                    <button id="search-open-mobile" class="btn btn-link text-navy p-0 fs-4"><i class="fas fa-search"></i></button>
					<button id="dark-mode-toggle-mobile" class="btn btn-link text-navy p-0 fs-4"><i class="fas fa-moon"></i></button>
					<button class="menu-toggle btn p-0 text-navy fs-2" aria-expanded="false">
						<i class="fas fa-bars"></i>
					</button>
				</div>

			</div>
		</div>

        <!-- Mobile Overlay Menu -->
        <div id="mobile-overlay" class="mobile-overlay">
            <div class="mobile-overlay-bg"></div>
            <div class="mobile-menu-inner container pt-5 pb-5">
                <div class="d-flex justify-content-between align-items-center mb-phi-l">
                    <div class="mobile-logo">
                        <?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
                            <span class="h3 fw-bold text-white mb-0"><?php bloginfo( 'name' ); ?></span>
                        <?php endif; ?>
                    </div>
                    <button class="mobile-close btn text-white p-0 fs-1"><i class="fas fa-times"></i></button>
                </div>

                <div class="mobile-nav-wrapper mb-phi-l">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'container'      => false,
                        'menu_class'     => 'mobile-nav list-unstyled'
                    ) );
                    ?>
                </div>

                <div class="mobile-actions mt-auto">
                    <a href="<?php echo esc_url( get_theme_mod('header_cta_link', home_url('/contact/')) ); ?>" class="btn btn-gold w-100 mb-phi-s"><?php echo esc_html(get_theme_mod('header_cta_text', 'Join the Elite Community')); ?></a>

                    <div class="mobile-contact text-center text-white-50 mt-phi">
                        <p class="small mb-1"><?php echo esc_html(get_theme_mod('contact_email', 'elite@layunin.com')); ?></p>
                        <div class="d-flex justify-content-center gap-3 mt-3">
                            <?php
                            $socials = array( 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube' );
                            foreach ( $socials as $social ) :
                                $link = get_theme_mod( "social_{$social}", '#' );
                                if ( $link && $link !== '#' ) : ?>
                                    <a href="<?php echo esc_url( $link ); ?>" class="text-white-50 fs-4"><i class="fab fa-<?php echo $social; ?>"></i></a>
                                <?php endif;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Full-screen Search Overlay -->
        <div id="search-overlay" class="search-overlay">
            <div class="search-overlay-bg"></div>
            <button id="search-close" class="btn text-white fs-1 position-absolute top-0 end-0 m-4"><i class="fas fa-times"></i></button>
            <div class="search-container container h-100 d-flex flex-column align-items-center justify-content-center">
                <div class="search-box-wrapper w-100" style="max-width: 800px;">
                    <h2 class="text-white display-4 fw-bold mb-phi-l text-center">Audit Our Strategy Library</h2>
                    <form role="search" method="get" class="search-form-overlay" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <div class="input-group input-group-lg border-bottom border-white border-opacity-25 pb-3">
                            <input type="search" class="form-control bg-transparent border-0 text-white placeholder-white opacity-75 fs-2" placeholder="What are you pursuing?" value="<?php echo get_search_query(); ?>" name="s" id="search-input-overlay" autocomplete="off">
                            <button class="btn btn-link text-white fs-2 p-0" type="submit"><i class="fas fa-arrow-right"></i></button>
                        </div>
                    </form>
                    <div class="popular-searches mt-phi text-center">
                        <span class="text-white-50 small text-uppercase fw-bold letter-spacing-1 d-block mb-3">Priority Audit Areas:</span>
                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <a href="/?s=AI" class="badge rounded-pill bg-white bg-opacity-10 text-white px-3 py-2 text-decoration-none hover-lift">AI Tools</a>
                            <a href="/?s=Income" class="badge rounded-pill bg-white bg-opacity-10 text-white px-3 py-2 text-decoration-none hover-lift">Online Income</a>
                            <a href="/?s=Productivity" class="badge rounded-pill bg-white bg-opacity-10 text-white px-3 py-2 text-decoration-none hover-lift">Productivity</a>
                            <a href="/?s=Mindset" class="badge rounded-pill bg-white bg-opacity-10 text-white px-3 py-2 text-decoration-none hover-lift">Elite Mindset</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	</header>

    <?php if( is_single() ) : ?>
        <div class="reading-progress-container fixed-top" style="z-index: 2002; height: 4px; top: 0;">
            <div id="reading-progress-bar" class="bg-gold h-100" style="width: 0%; transition: width 0.1s ease;"></div>
        </div>
    <?php endif; ?>

    <div class="header-spacer" style="height: <?php echo (get_theme_mod('show_announcement', true)) ? '140px' : '100px'; ?>;"></div>
