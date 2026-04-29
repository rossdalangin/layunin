/**
 * Live preview for Customizer - Definitive Masterpiece (v9.6)
 */
( function( $ ) {
    // Helper function for list-based updates
    function updateList( containerSelector, newval ) {
        var items = newval.split('\n');
        var html = '';
        items.forEach(function(item) {
            if(item.trim()) {
                html += '<li class="mb-2"><i class="fas fa-check-circle text-accent me-2"></i> ' + item.trim() + '</li>';
            }
        });
        $( containerSelector ).html( html );
    }

    // Hero Section
    wp.customize( 'hero_badge', function( value ) { value.bind( function( newval ) { $( '.hero-badge-text' ).text( newval ); } ); } );
	wp.customize( 'hero_headline', function( value ) { value.bind( function( newval ) { $( '.hero-section h1' ).text( newval ); } ); } );
	wp.customize( 'hero_subheadline', function( value ) { value.bind( function( newval ) { $( '.hero-section p.lead' ).text( newval ); } ); } );
    wp.customize( 'hero_cta_1_text', function( value ) { value.bind( function( newval ) { $( '.hero-section .hero-cta-1' ).text( newval ); } ); } );
    wp.customize( 'hero_cta_2_text', function( value ) { value.bind( function( newval ) { $( '.hero-section .hero-cta-2' ).text( newval ); } ); } );
    wp.customize( 'hero_social_proof', function( value ) { value.bind( function( newval ) { $( '.hero-social-proof' ).text( newval ); } ); } );

    // Featured Posts
    wp.customize( 'featured_posts_title', function( value ) { value.bind( function( newval ) { $( '.featured-posts-title' ).text( newval ); } ); } );

    // Trust Badges
    wp.customize( 'trust_badges_title', function( value ) { value.bind( function( newval ) { $( '.trust-badges-title' ).text( newval ); } ); } );

    // Colors
    wp.customize( 'primary_color', function( value ) { value.bind( function( newval ) { $( ':root' ).css('--navy', newval); } ); } );
    wp.customize( 'accent_color', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css('--gold', newval);
            $( ':root' ).css('--accent', newval);
		} );
	} );
    wp.customize( 'border_radius', function( value ) { value.bind( function( newval ) { $( ':root' ).css('--border-radius', newval + 'px'); } ); } );

    // Header Settings
    wp.customize( 'header_cta_text', function( value ) { value.bind( function( newval ) { $( '.header-cta .btn-gold' ).text( newval ); } ); } );
    wp.customize( 'logo_width', function( value ) { value.bind( function( newval ) { $( ':root' ).css('--logo-width', newval + 'px'); } ); } );

    // Announcement Bar
    wp.customize( 'announcement_text', function( value ) { value.bind( function( newval ) { $( '.announcement-bar .announcement-text' ).text( newval ); } ); } );

    // Homepage Sections
    wp.customize( 'process_title', function( value ) { value.bind( function( newval ) { $( '.process-title' ).text( newval ); } ); } );
    wp.customize( 'features_title', function( value ) { value.bind( function( newval ) { $( '.features-title' ).text( newval ); } ); } );

    wp.customize( 'problem_badge', function( value ) { value.bind( function( newval ) { $( '.problem-section .text-gold' ).text( newval ); } ); } );
    wp.customize( 'problem_title', function( value ) { value.bind( function( newval ) { $( '.problem-section h2' ).text( newval ); } ); } );
    wp.customize( 'problem_lead', function( value ) { value.bind( function( newval ) { $( '.problem-section p.lead' ).text( newval ); } ); } );

    wp.customize( 'solution_badge_text', function( value ) { value.bind( function( newval ) { $( '.solution-section .text-gold' ).text( newval ); } ); } );
    wp.customize( 'solution_title', function( value ) { value.bind( function( newval ) { $( '.solution-title' ).text( newval ); } ); } );
    wp.customize( 'solution_desc', function( value ) { value.bind( function( newval ) { $( '.solution-desc' ).text( newval ); } ); } );
    wp.customize( 'solution_bullets', function( value ) { value.bind( function( newval ) {
        var items = newval.split('\n');
        var html = '';
        items.forEach(function(item) {
            if(item.trim()) {
                html += '<li class="d-flex align-items-center gap-3 mb-4 fs-5 fw-bold text-navy"><div class="bg-light-gold text-gold rounded-circle p-2" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-check"></i></div>' + item.trim() + '</li>';
            }
        });
        $( '.solution-section ul' ).html( html );
    } ); } );

    wp.customize( 'categories_title', function( value ) { value.bind( function( newval ) { $( '.categories-section h2' ).text( newval ); } ); } );
    wp.customize( 'categories_desc', function( value ) { value.bind( function( newval ) { $( '.categories-section .section-desc' ).text( newval ); } ); } );

    // Lead Magnet Home
    wp.customize( 'lm_title', function( value ) { value.bind( function( newval ) { $( '.lead-magnet-section h2' ).text( newval ); } ); } );
    wp.customize( 'lm_subtitle', function( value ) { value.bind( function( newval ) { $( '.lead-magnet-section p.fs-5' ).text( newval ); } ); } );
    wp.customize( 'lm_list', function( value ) { value.bind( function( newval ) {
        var items = newval.split('\n');
        var html = '';
        items.forEach(function(item) {
            if(item.trim()) {
                html += '<li class="mb-3 d-flex align-items-center gap-3 fs-5"><i class="fas fa-check-circle text-gold"></i> ' + item.trim() + '</li>';
            }
        });
        $( '.lead-magnet-section ul' ).html( html );
    } ); } );
    wp.customize( 'lm_social_proof', function( value ) { value.bind( function( newval ) { $( '.lead-magnet-section p.small' ).contents().filter(function(){ return this.nodeType == 3; }).replaceWith(newval); } ); } );

    wp.customize( 'products_title', function( value ) { value.bind( function( newval ) { $( '.products-section h2' ).text( newval ); } ); } );
    wp.customize( 'products_desc', function( value ) { value.bind( function( newval ) { $( '.products-section .section-desc' ).text( newval ); } ); } );
    wp.customize( 'services_home_title', function( value ) { value.bind( function( newval ) { $( '.services-section h2' ).text( newval ); } ); } );

    wp.customize( 'testimonials_badge_text', function( value ) { value.bind( function( newval ) { $( '.testimonials-section .text-gold' ).text( newval ); } ); } );
    wp.customize( 'testimonials_home_title', function( value ) { value.bind( function( newval ) { $( '.testimonials-section h2' ).text( newval ); } ); } );
    wp.customize( 'testimonials_home_lead', function( value ) { value.bind( function( newval ) { $( '.testimonials-section p.lead' ).text( newval ); } ); } );

    wp.customize( 'final_cta_title', function( value ) { value.bind( function( newval ) { $( '.final-cta-section h2' ).text( newval ); } ); } );
    wp.customize( 'final_cta_desc', function( value ) { value.bind( function( newval ) { $( '.final-cta-section p.lead' ).text( newval ); } ); } );
    wp.customize( 'final_cta_1_text', function( value ) { value.bind( function( newval ) { $( '.final-cta-section .final-cta-1' ).text( newval ); } ); } );
    wp.customize( 'final_cta_2_text', function( value ) { value.bind( function( newval ) { $( '.final-cta-section .final-cta-2' ).text( newval ); } ); } );

    // Home Testimonial
    wp.customize( 'testimonial_quote', function( value ) { value.bind( function( newval ) { $( '.testimonials-section .quote-text' ).text( '"' + newval + '"' ); } ); } );
    wp.customize( 'testimonial_author', function( value ) { value.bind( function( newval ) { $( '.testimonials-section .author-name' ).text( newval ); } ); } );
    wp.customize( 'testimonial_role', function( value ) { value.bind( function( newval ) { $( '.testimonials-section .author-role' ).text( newval ); } ); } );

    // Lead Popup
    wp.customize( 'popup_title', function( value ) { value.bind( function( newval ) { $( '.popup-title' ).text( newval ); } ); } );
    wp.customize( 'popup_desc', function( value ) { value.bind( function( newval ) { $( '.popup-desc' ).text( newval ); } ); } );
    wp.customize( 'popup_social_proof', function( value ) { value.bind( function( newval ) { $( '#layunin-popup p.small' ).text( newval ); } ); } );

    // Sidebar & Author
    wp.customize( 'sidebar_bio_text', function( value ) { value.bind( function( newval ) { $( '.sidebar-bio' ).text( newval ); } ); } );
    wp.customize( 'sidebar_newsletter_title', function( value ) { value.bind( function( newval ) { $( '.sidebar-newsletter-title' ).text( newval ); } ); } );
    wp.customize( 'sidebar_newsletter_desc', function( value ) { value.bind( function( newval ) { $( '.sidebar-newsletter-desc' ).text( newval ); } ); } );

    // Monetization
    wp.customize( 'product_item_1_title', function( value ) { value.bind( function( newval ) { $( '.monetization-product-title' ).text( newval ); } ); } );
    wp.customize( 'product_item_1_price', function( value ) { value.bind( function( newval ) { $( '.monetization-product-price' ).text( newval ); } ); } );
    wp.customize( 'monetization_newsletter_title', function( value ) { value.bind( function( newval ) { $( '.monetization-newsletter-title' ).text( newval ); } ); } );
    wp.customize( 'monetization_newsletter_desc', function( value ) { value.bind( function( newval ) { $( '.monetization-newsletter-desc' ).text( newval ); } ); } );
    wp.customize( 'monetization_product_desc', function( value ) { value.bind( function( newval ) { $( '.monetization-product-desc' ).text( newval ); } ); } );

    // Blog settings
    wp.customize( 'author_box_title', function( value ) { value.bind( function( newval ) { $( '.author-box-title' ).text( newval ); } ); } );
    wp.customize( 'related_posts_title', function( value ) { value.bind( function( newval ) { $( '.related-posts-title' ).text( newval ); } ); } );
    wp.customize( 'read_more_text', function( value ) { value.bind( function( newval ) { $( '.read-more-text' ).text( newval ); } ); } );
    wp.customize( 'nothing_found_title', function( value ) { value.bind( function( newval ) { $( '.nothing-found-title' ).text( newval ); } ); } );
    wp.customize( 'nothing_found_desc', function( value ) { value.bind( function( newval ) { $( '.nothing-found-desc' ).text( newval ); } ); } );
    wp.customize( 'toc_title', function( value ) { value.bind( function( newval ) { $( '.toc-title' ).contents().filter(function(){ return this.nodeType == 3; }).replaceWith(newval); } ); } );
    wp.customize( 'breadcrumb_home_label', function( value ) { value.bind( function( newval ) { $( '.breadcrumb-home-label' ).text( newval ); } ); } );
    wp.customize( 'nav_prev_label', function( value ) { value.bind( function( newval ) { $( '.nav-prev-label' ).text( newval ); } ); } );
    wp.customize( 'nav_next_label', function( value ) { value.bind( function( newval ) { $( '.nav-next-label' ).text( newval ); } ); } );
    wp.customize( 'archive_older_label', function( value ) { value.bind( function( newval ) { $( '.archive-older-label' ).text( newval ); } ); } );
    wp.customize( 'archive_newer_label', function( value ) { value.bind( function( newval ) { $( '.archive-newer-label' ).text( newval ); } ); } );

    // Page Management - General Headings and Leads
    wp.customize( 'about_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-about-page-php .entry-title' ).text( newval ); } ); } );
    wp.customize( 'about_badge', function( value ) { value.bind( function( newval ) { $( '.about-badge' ).text( newval ); } ); } );
    wp.customize( 'about_lead', function( value ) { value.bind( function( newval ) { $( 'body.page-template-about-page-php p.lead' ).text( newval ); } ); } );
    wp.customize( 'about_team_title', function( value ) { value.bind( function( newval ) { $( '.about-team-title' ).text( newval ); } ); } );

    wp.customize( 'services_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-services-page-php .entry-title' ).text( newval ); } ); } );
    wp.customize( 'services_badge', function( value ) { value.bind( function( newval ) { $( '.services-badge' ).text( newval ); } ); } );

    wp.customize( 'contact_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-contact-page-php .entry-title' ).text( newval ); } ); } );
    wp.customize( 'contact_badge', function( value ) { value.bind( function( newval ) { $( '.contact-badge' ).text( newval ); } ); } );
    wp.customize( 'contact_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-contact-page-php p.lead' ).text( newval ); } ); } );
    wp.customize( 'contact_email', function( value ) { value.bind( function( newval ) { $( '.contact-email' ).text( newval ); } ); } );
    wp.customize( 'contact_phone', function( value ) { value.bind( function( newval ) { $( '.contact-phone' ).text( newval ); } ); } );
    wp.customize( 'contact_address', function( value ) { value.bind( function( newval ) { $( '.contact-address' ).text( newval ); } ); } );

    wp.customize( 'shop_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-shop-page-php .entry-title' ).text( newval ); } ); } );
    wp.customize( 'shop_badge', function( value ) { value.bind( function( newval ) { $( '.shop-badge' ).text( newval ); } ); } );
    wp.customize( 'shop_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-shop-page-php p.lead' ).text( newval ); } ); } );

    wp.customize( 'free_resources_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-free-resources-page-php .entry-title' ).text( newval ); } ); } );
    wp.customize( 'free_resources_badge', function( value ) { value.bind( function( newval ) { $( '.free-resources-badge' ).text( newval ); } ); } );
    wp.customize( 'free_resources_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-free-resources-page-php p.lead' ).text( newval ); } ); } );

    wp.customize( 'testimonials_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-testimonials-page-php .entry-title' ).text( newval ); } ); } );
    wp.customize( 'testimonials_badge', function( value ) { value.bind( function( newval ) { $( '.testimonials-badge' ).text( newval ); } ); } );
    wp.customize( 'testimonials_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-testimonials-page-php p.lead' ).text( newval ); } ); } );

    wp.customize( 'lead_magnet_landing_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-lead-magnet-landing-php h1' ).text( newval ); } ); } );
    wp.customize( 'lead_magnet_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-lead-magnet-landing-php p.lead' ).text( newval ); } ); } );
    wp.customize( 'lm_benefit_title', function( value ) { value.bind( function( newval ) { $( '.lm-benefit-title' ).text( newval ); } ); } );

    wp.customize( 'thank_you_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-thank-you-php h1' ).text( newval ); } ); } );
    wp.customize( 'thank_you_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-thank-you-php p.lead' ).text( newval ); } ); } );
    wp.customize( 'thank_you_next_title', function( value ) { value.bind( function( newval ) { $( '.thank-you-next-title' ).text( newval ); } ); } );
    wp.customize( 'thank_you_next_desc', function( value ) { value.bind( function( newval ) { $( '.thank-you-next-desc' ).text( newval ); } ); } );

    wp.customize( 'affiliate_disclosure_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-affiliate-disclosure-php h1' ).text( newval ); } ); } );
    wp.customize( 'affiliate_disclosure_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-affiliate-disclosure-php .legal-content' ).html( newval ); } ); } );
    wp.customize( 'privacy_policy_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-privacy-policy-php h1' ).text( newval ); } ); } );
    wp.customize( 'privacy_policy_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-privacy-policy-php .legal-content' ).html( newval ); } ); } );
    wp.customize( 'terms_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-terms-php h1' ).text( newval ); } ); } );
    wp.customize( 'terms_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-terms-php .legal-content' ).html( newval ); } ); } );

    // 404 and Search
    wp.customize( 'error_404_title', function( value ) { value.bind( function( newval ) { $( '.error-404-title' ).text( newval ); } ); } );
    wp.customize( 'error_404_desc', function( value ) { value.bind( function( newval ) { $( '.error-404-desc' ).text( newval ); } ); } );
    wp.customize( 'search_results_title', function( value ) { value.bind( function( newval ) { $( '.search-results-title' ).text( newval + ' ' + '...' ); } ); } );
    wp.customize( 'archive_title_prefix', function( value ) { value.bind( function( newval ) { $( '.archive-title-prefix' ).text( newval ); } ); } );

    // Loop through indexed items
    for ( var i = 1; i <= 6; i++ ) {
        ( function( i ) {
            // Process Steps
            wp.customize( 'process_step_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.process-step-' + i + ' .step-title' ).text( newval ); } ); } );
            wp.customize( 'process_step_' + i + '_desc', function( value ) { value.bind( function( newval ) { $( '.process-step-' + i + ' .step-desc' ).text( newval ); } ); } );

            // Features
            wp.customize( 'feature_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.feature-item-' + i + ' .item-title' ).text( newval ); } ); } );
            wp.customize( 'feature_' + i + '_desc', function( value ) { value.bind( function( newval ) { $( '.feature-item-' + i + ' .item-desc' ).text( newval ); } ); } );

            // Problem Items
            wp.customize( 'problem_item_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.problem-section .problem-item:nth-child(' + i + ') h3' ).text( newval ); } ); } );
            wp.customize( 'problem_item_' + i + '_desc', function( value ) { value.bind( function( newval ) { $( '.problem-section .problem-item:nth-child(' + i + ') p' ).text( newval ); } ); } );

            // Service Items (Home)
            wp.customize( 'service_item_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.services-section .col-lg-4:nth-child(' + i + ') h3' ).text( newval ); } ); } );
            wp.customize( 'service_item_' + i + '_desc', function( value ) { value.bind( function( newval ) { $( '.services-section .col-lg-4:nth-child(' + i + ') p' ).text( newval ); } ); } );

            // Product Items (Home)
            wp.customize( 'product_item_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.products-section .col-lg-4:nth-child(' + i + ') h3' ).text( newval ); } ); } );
            wp.customize( 'product_item_' + i + '_price', function( value ) { value.bind( function( newval ) { $( '.products-section .col-lg-4:nth-child(' + i + ') .price-tag' ).text( newval ); } ); } );

            // Category Items
            wp.customize( 'category_item_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.categories-section .col-lg-4:nth-child(' + i + ') h3' ).text( newval ); } ); } );

            // Team Members (About)
            wp.customize( 'team_member_' + i + '_name', function( value ) { value.bind( function( newval ) { $( '.team-member-' + i + ' .member-name' ).text( newval ); } ); } );
            wp.customize( 'team_member_' + i + '_role', function( value ) { value.bind( function( newval ) { $( '.team-member-' + i + ' .member-role' ).text( newval ); } ); } );

            // Shop Items (Page)
            wp.customize( 'shop_item_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.product-item:nth-child(' + i + ') .item-title' ).text( newval ); } ); } );
            wp.customize( 'shop_item_' + i + '_price', function( value ) { value.bind( function( newval ) { $( '.product-item:nth-child(' + i + ') .item-price' ).text( newval ); } ); } );

            // Resource Items (Page)
            wp.customize( 'resource_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.resource-item:nth-child(' + i + ') .item-title' ).text( newval ); } ); } );
            wp.customize( 'resource_' + i + '_type', function( value ) { value.bind( function( newval ) { $( '.resource-item:nth-child(' + i + ') .item-type' ).text( newval ); } ); } );

            // Lead Magnet Benefits (Landing)
            wp.customize( 'lm_benefit_' + i, function( value ) { value.bind( function( newval ) { $( '.benefit-item-' + i + ' .benefit-text' ).text( newval ); } ); } );
        } )( i );
    }

    // Footer
    wp.customize( 'footer_branding_text', function( value ) { value.bind( function( newval ) { $( '.branding-text' ).text( newval ); } ); } );
    wp.customize( 'footer_col2_title', function( value ) { value.bind( function( newval ) { $( '.footer-col2-title' ).text( newval ); } ); } );
    wp.customize( 'footer_col3_title', function( value ) { value.bind( function( newval ) { $( '.footer-col3-title' ).text( newval ); } ); } );
    wp.customize( 'footer_newsletter_title', function( value ) { value.bind( function( newval ) { $( '.footer-newsletter-title' ).text( newval ); } ); } );
    wp.customize( 'footer_newsletter_desc', function( value ) { value.bind( function( newval ) { $( '.footer-newsletter-desc' ).text( newval ); } ); } );
    wp.customize( 'footer_copyright', function( value ) { value.bind( function( newval ) { $( '.site-footer .copyright' ).text( newval ); } ); } );

} )( jQuery );
