/**
 * Live preview for Customizer - Absolute Masterpiece (v9.7)
 * 100% Coverage for all dynamic settings.
 */
( function( $ ) {

    // --- HELPER UTILITIES ---
    function updateList( containerSelector, newval ) {
        var items = newval.split('\n');
        var html = '';
        items.forEach(function(item) {
            if(item.trim()) {
                html += '<li class="mb-3 d-flex align-items-center gap-3 fs-5"><i class="fas fa-check-circle text-gold"></i> ' + item.trim() + '</li>';
            }
        });
        $( containerSelector ).html( html );
    }

    function updatePlaceholder( selector, newval ) {
        $( selector ).attr('placeholder', newval);
    }

    // --- 1. DESIGN SYSTEM ---
    wp.customize( 'primary_color', function( value ) { value.bind( function( newval ) { $( ':root' ).css('--navy', newval); } ); } );
    wp.customize( 'accent_color', function( value ) {
		value.bind( function( newval ) {
			$( ':root' ).css('--gold', newval);
            $( ':root' ).css('--accent', newval);
		} );
	} );
    wp.customize( 'border_radius', function( value ) { value.bind( function( newval ) { $( ':root' ).css('--border-radius', newval + 'px'); } ); } );
    wp.customize( 'logo_width', function( value ) { value.bind( function( newval ) { $( ':root' ).css('--logo-width', newval + 'px'); } ); } );

    // --- 2. HEADER & ANNOUNCEMENT ---
    wp.customize( 'announcement_text', function( value ) { value.bind( function( newval ) { $( '.announcement-bar .announcement-text' ).text( newval ); } ); } );
    wp.customize( 'header_cta_text', function( value ) { value.bind( function( newval ) { $( '.header-cta .btn-gold, .offcanvas-body .btn-gold' ).text( newval ); } ); } );
    wp.customize( 'header_dark_mode_title', function( value ) { value.bind( function( newval ) { $( '#dark-mode-toggle' ).attr('title', newval); } ); } );

    // --- 3. HOMEPAGE MASTER ENGINE ---

    // 1. Hero
    wp.customize( 'hero_badge', function( value ) { value.bind( function( newval ) { $( '.hero-badge-text' ).text( newval ); } ); } );
	wp.customize( 'hero_headline', function( value ) { value.bind( function( newval ) { $( '.hero-section h1' ).text( newval ); } ); } );
	wp.customize( 'hero_subheadline', function( value ) { value.bind( function( newval ) { $( '.hero-section p.lead' ).text( newval ); } ); } );
    wp.customize( 'hero_cta_1_text', function( value ) { value.bind( function( newval ) { $( '.hero-section .hero-cta-1' ).text( newval ); } ); } );
    wp.customize( 'hero_cta_2_text', function( value ) { value.bind( function( newval ) { $( '.hero-section .hero-cta-2' ).text( newval ); } ); } );
    wp.customize( 'hero_social_proof', function( value ) { value.bind( function( newval ) { $( '.hero-social-proof' ).text( newval ); } ); } );
    wp.customize( 'hero_card_title', function( value ) { value.bind( function( newval ) { $( '.hero-card-title' ).text( newval ); } ); } );
    wp.customize( 'hero_card_status', function( value ) { value.bind( function( newval ) { $( '.hero-card-status' ).text( newval ); } ); } );
    wp.customize( 'hero_card_rate', function( value ) { value.bind( function( newval ) { $( '.hero-card-rate' ).text( newval ); } ); } );

    // 1.5 Featured Posts
    wp.customize( 'featured_posts_title', function( value ) { value.bind( function( newval ) { $( '.featured-posts-title' ).text( newval ); } ); } );

    // 2. Trust Badges
    wp.customize( 'trust_badges_title', function( value ) { value.bind( function( newval ) { $( '.trust-badges-title' ).text( newval ); } ); } );

    // 3. Process
    wp.customize( 'process_title', function( value ) { value.bind( function( newval ) { $( '.process-title' ).text( newval ); } ); } );

    // 4. Features
    wp.customize( 'features_title', function( value ) { value.bind( function( newval ) { $( '.features-title' ).text( newval ); } ); } );

    // 5. Problem
    wp.customize( 'problem_badge', function( value ) { value.bind( function( newval ) { $( '.problem-section .text-gold' ).text( newval ); } ); } );
    wp.customize( 'problem_title', function( value ) { value.bind( function( newval ) { $( '.problem-section h2' ).text( newval ); } ); } );
    wp.customize( 'problem_lead', function( value ) { value.bind( function( newval ) { $( '.problem-section p.lead' ).text( newval ); } ); } );

    // 6. Solution
    wp.customize( 'solution_badge_text', function( value ) { value.bind( function( newval ) { $( '.solution-section .text-gold' ).text( newval ); } ); } );
    wp.customize( 'solution_title', function( value ) { value.bind( function( newval ) { $( '.solution-title' ).text( newval ); } ); } );
    wp.customize( 'solution_desc', function( value ) { value.bind( function( newval ) { $( '.solution-desc' ).text( newval ); } ); } );
    wp.customize( 'solution_cert_title', function( value ) { value.bind( function( newval ) { $( '.solution-cert-title' ).text( newval ); } ); } );
    wp.customize( 'solution_cert_desc', function( value ) { value.bind( function( newval ) { $( '.solution-cert-desc' ).text( newval ); } ); } );
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

    // 7. Categories
    wp.customize( 'categories_title', function( value ) { value.bind( function( newval ) { $( '.categories-section h2' ).text( newval ); } ); } );
    wp.customize( 'categories_desc', function( value ) { value.bind( function( newval ) { $( '.categories-section .section-desc' ).text( newval ); } ); } );

    // 8. Lead Magnet Home
    wp.customize( 'lm_title', function( value ) { value.bind( function( newval ) { $( '.lead-magnet-section h2' ).text( newval ); } ); } );
    wp.customize( 'lm_subtitle', function( value ) { value.bind( function( newval ) { $( '.lead-magnet-section p.fs-5' ).text( newval ); } ); } );
    wp.customize( 'lm_newsletter_ph', function( value ) { value.bind( function( newval ) { updatePlaceholder('.lead-magnet-section input', newval); } ); } );
    wp.customize( 'lm_btn_text', function( value ) { value.bind( function( newval ) { $( '.lm-btn-text' ).text( newval ); } ); } );
    wp.customize( 'lm_list', function( value ) { value.bind( function( newval ) {
        updateList('.lead-magnet-section ul', newval);
    } ); } );
    wp.customize( 'lm_social_proof', function( value ) { value.bind( function( newval ) {
        $( '.lm-social-proof' ).contents().filter(function(){ return this.nodeType == 3; }).replaceWith(' ' + newval);
    } ); } );

    // 9. Products Home
    wp.customize( 'products_title', function( value ) { value.bind( function( newval ) { $( '.products-section h2' ).text( newval ); } ); } );
    wp.customize( 'products_desc', function( value ) { value.bind( function( newval ) { $( '.products-section .section-desc' ).text( newval ); } ); } );
    wp.customize( 'products_btn_text', function( value ) { value.bind( function( newval ) { $( '.products-btn-text' ).text( newval ); } ); } );

    // 10. Services Home
    wp.customize( 'services_home_title', function( value ) { value.bind( function( newval ) { $( '.services-section h2' ).text( newval ); } ); } );
    wp.customize( 'services_home_btn_text', function( value ) { value.bind( function( newval ) {
        $( '.services-home-btn-text' ).contents().filter(function(){ return this.nodeType == 3; }).replaceWith(newval + ' ');
    } ); } );

    // 11. Testimonials Home
    wp.customize( 'testimonials_badge_text', function( value ) { value.bind( function( newval ) { $( '.testimonials-badge-text' ).text( newval ); } ); } );
    wp.customize( 'testimonials_home_title', function( value ) { value.bind( function( newval ) { $( '.testimonials-home-title' ).text( newval ); } ); } );
    wp.customize( 'testimonials_home_lead', function( value ) { value.bind( function( newval ) { $( '.testimonials-home-lead' ).text( newval ); } ); } );
    wp.customize( 'testimonials_home_btn_text', function( value ) { value.bind( function( newval ) { $( '.testimonials-home-btn-text' ).text( newval ); } ); } );
    wp.customize( 'testimonial_quote', function( value ) { value.bind( function( newval ) { $( '.testimonials-section .quote-text' ).text( '"' + newval + '"' ); } ); } );
    wp.customize( 'testimonial_author', function( value ) { value.bind( function( newval ) { $( '.testimonials-section .author-name' ).text( newval ); } ); } );
    wp.customize( 'testimonial_role', function( value ) { value.bind( function( newval ) { $( '.testimonials-section .author-role' ).text( newval ); } ); } );

    // 12. Final CTA
    wp.customize( 'final_cta_title', function( value ) { value.bind( function( newval ) { $( '.final-cta-section h2' ).text( newval ); } ); } );
    wp.customize( 'final_cta_desc', function( value ) { value.bind( function( newval ) { $( '.final-cta-section p.lead' ).text( newval ); } ); } );
    wp.customize( 'final_cta_trust', function( value ) { value.bind( function( newval ) { $( '.final-cta-trust' ).text( newval ); } ); } );
    wp.customize( 'final_cta_1_text', function( value ) { value.bind( function( newval ) { $( '.final-cta-1' ).text( newval ); } ); } );
    wp.customize( 'final_cta_2_text', function( value ) { value.bind( function( newval ) { $( '.final-cta-2' ).text( newval ); } ); } );

    // --- 4. POPUP ---
    wp.customize( 'popup_title', function( value ) { value.bind( function( newval ) { $( '.popup-title' ).text( newval ); } ); } );
    wp.customize( 'popup_desc', function( value ) { value.bind( function( newval ) { $( '.popup-desc' ).text( newval ); } ); } );
    wp.customize( 'popup_btn_text', function( value ) { value.bind( function( newval ) { $( '.popup-btn-text' ).text( newval ); } ); } );
    wp.customize( 'popup_ph', function( value ) { value.bind( function( newval ) { updatePlaceholder('.popup-form input', newval); } ); } );
    wp.customize( 'popup_social_proof', function( value ) { value.bind( function( newval ) { $( '.popup-social-proof' ).text( newval ); } ); } );

    // --- 5. SIDEBAR & AUTHOR ---
    wp.customize( 'sidebar_author_title', function( value ) { value.bind( function( newval ) { $( '.sidebar-author-title' ).text( newval ); } ); } );
    wp.customize( 'sidebar_bio_text', function( value ) { value.bind( function( newval ) { $( '.sidebar-bio' ).text( newval ); } ); } );
    wp.customize( 'sidebar_newsletter_title', function( value ) { value.bind( function( newval ) { $( '.sidebar-newsletter-title' ).text( newval ); } ); } );
    wp.customize( 'sidebar_newsletter_desc', function( value ) { value.bind( function( newval ) { $( '.sidebar-newsletter-desc' ).text( newval ); } ); } );
    wp.customize( 'sidebar_newsletter_btn', function( value ) { value.bind( function( newval ) { $( '.sidebar-newsletter-btn' ).text( newval ); } ); } );
    wp.customize( 'sidebar_newsletter_ph', function( value ) { value.bind( function( newval ) { updatePlaceholder('.sidebar-newsletter input', newval); } ); } );

    // --- 6. MONETIZATION ---
    wp.customize( 'product_item_1_title', function( value ) { value.bind( function( newval ) { $( '.monetization-product-title' ).text( newval ); } ); } );
    wp.customize( 'monetization_product_desc', function( value ) { value.bind( function( newval ) { $( '.monetization-product-desc' ).text( newval ); } ); } );
    wp.customize( 'monetization_product_btn', function( value ) { value.bind( function( newval ) {
        $( '.monetization-product-btn' ).contents().filter(function(){ return this.nodeType == 3; }).replaceWith(newval + ' ');
    } ); } );
    wp.customize( 'product_item_1_price', function( value ) { value.bind( function( newval ) { $( '.monetization-product-price' ).text( newval ); } ); } );
    wp.customize( 'monetization_newsletter_title', function( value ) { value.bind( function( newval ) { $( '.monetization-newsletter-title' ).text( newval ); } ); } );
    wp.customize( 'monetization_newsletter_desc', function( value ) { value.bind( function( newval ) { $( '.monetization-newsletter-desc' ).text( newval ); } ); } );
    wp.customize( 'monetization_newsletter_btn', function( value ) { value.bind( function( newval ) { $( '.monetization-newsletter-btn' ).text( newval ); } ); } );
    wp.customize( 'monetization_newsletter_ph', function( value ) { value.bind( function( newval ) { updatePlaceholder('.cta-newsletter-form input', newval); } ); } );

    // --- 7. BLOG & POSTS ---
    wp.customize( 'breadcrumb_home_label', function( value ) { value.bind( function( newval ) { $( '.breadcrumb-home-label' ).text( newval ); } ); } );
    wp.customize( 'blog_by_text', function( value ) { value.bind( function( newval ) { $( '.author-vcard' ).contents().filter(function(){ return this.nodeType == 3; }).replaceWith(' ' + newval + ' '); } ); } );
    wp.customize( 'blog_min_text', function( value ) { value.bind( function( newval ) { $( '.small.text-muted span:last-child' ).contents().filter(function(){ return this.nodeType == 3; }).replaceWith(' ' + newval); } ); } );
    wp.customize( 'blog_min_read_text', function( value ) { value.bind( function( newval ) { $( '.reading-time' ).contents().filter(function(){ return this.nodeType == 3; }).replaceWith(' ' + newval); } ); } );
    wp.customize( 'blog_posted_on_text', function( value ) { value.bind( function( newval ) { $( '.posted-on' ).contents().filter(function(){ return this.nodeType == 3; }).replaceWith(' ' + newval + ' '); } ); } );
    wp.customize( 'blog_search_btn_text', function( value ) { value.bind( function( newval ) { $( 'body.search-results .btn-navy' ).text( newval ); } ); } );
    wp.customize( 'blog_share_text', function( value ) { value.bind( function( newval ) { $( '.blog-share-text' ).text( newval ); } ); } );
    wp.customize( 'blog_share_on_text', function( value ) { value.bind( function( newval ) {
        $( '.sticky-social-share a' ).each(function() {
            var platform = $(this).attr('aria-label').split(' ').pop();
            $(this).attr('aria-label', newval + ' ' + platform);
        });
    } ); } );
    wp.customize( 'read_more_text', function( value ) { value.bind( function( newval ) { $( '.read-more-text' ).contents().filter(function(){ return this.nodeType == 3; }).replaceWith(newval + ' '); } ); } );
    wp.customize( 'author_box_title', function( value ) { value.bind( function( newval ) { $( '.author-box-title' ).text( newval ); } ); } );
    wp.customize( 'related_posts_title', function( value ) { value.bind( function( newval ) { $( '.related-posts-title' ).text( newval ); } ); } );
    wp.customize( 'nav_prev_label', function( value ) { value.bind( function( newval ) { $( '.nav-prev-label' ).text( newval ); } ); } );
    wp.customize( 'nav_next_label', function( value ) { value.bind( function( newval ) { $( '.nav-next-label' ).text( newval ); } ); } );
    wp.customize( 'archive_older_label', function( value ) { value.bind( function( newval ) { $( '.archive-older-label' ).text( newval ); } ); } );
    wp.customize( 'archive_newer_label', function( value ) { value.bind( function( newval ) { $( '.archive-newer-label' ).text( newval ); } ); } );
    wp.customize( 'nothing_found_title', function( value ) { value.bind( function( newval ) { $( '.nothing-found-title' ).text( newval ); } ); } );
    wp.customize( 'nothing_found_desc', function( value ) { value.bind( function( newval ) { $( '.nothing-found-desc' ).text( newval ); } ); } );
    wp.customize( 'toc_title', function( value ) { value.bind( function( newval ) { $( '.toc-title' ).contents().filter(function(){ return this.nodeType == 3; }).replaceWith(newval); } ); } );

    // --- 8. PAGE MANAGEMENT ---

    // About Page
    wp.customize( 'about_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-about-page-php .entry-title' ).text( newval ); } ); } );
    wp.customize( 'about_badge', function( value ) { value.bind( function( newval ) { $( '.about-badge' ).text( newval ); } ); } );
    wp.customize( 'about_lead', function( value ) { value.bind( function( newval ) { $( 'body.page-template-about-page-php p.lead' ).text( newval ); } ); } );
    wp.customize( 'about_mission_title', function( value ) { value.bind( function( newval ) { $( '.about-mission-title' ).text( newval ); } ); } );
    wp.customize( 'about_mission_content', function( value ) { value.bind( function( newval ) { $( '.mission-text' ).html( newval ); } ); } );
    wp.customize( 'about_stat_number', function( value ) { value.bind( function( newval ) { $( '.about-stat-number' ).text( newval ); } ); } );
    wp.customize( 'about_stat_text', function( value ) { value.bind( function( newval ) { $( '.about-stat-text' ).text( newval ); } ); } );
    wp.customize( 'about_team_title', function( value ) { value.bind( function( newval ) { $( '.about-team-title' ).text( newval ); } ); } );

    // Services Page
    wp.customize( 'services_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-services-page-php .entry-title' ).text( newval ); } ); } );
    wp.customize( 'services_badge', function( value ) { value.bind( function( newval ) { $( '.services-badge' ).text( newval ); } ); } );
    wp.customize( 'services_custom_title', function( value ) { value.bind( function( newval ) { $( '.services-custom-title' ).text( newval ); } ); } );
    wp.customize( 'services_custom_desc', function( value ) { value.bind( function( newval ) { $( '.services-custom-desc' ).text( newval ); } ); } );
    wp.customize( 'services_custom_btn', function( value ) { value.bind( function( newval ) { $( '.services-custom-btn' ).text( newval ); } ); } );

    // Contact Page
    wp.customize( 'contact_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-contact-page-php .entry-title' ).text( newval ); } ); } );
    wp.customize( 'contact_badge', function( value ) { value.bind( function( newval ) { $( '.contact-badge' ).text( newval ); } ); } );
    wp.customize( 'contact_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-contact-page-php p.lead' ).text( newval ); } ); } );
    wp.customize( 'contact_info_title', function( value ) { value.bind( function( newval ) { $( '.contact-info-title' ).text( newval ); } ); } );
    wp.customize( 'contact_email_label', function( value ) { value.bind( function( newval ) { $( '.contact-email-label' ).text( newval ); } ); } );
    wp.customize( 'contact_email', function( value ) { value.bind( function( newval ) { $( '.contact-email' ).text( newval ); } ); } );
    wp.customize( 'contact_phone_label', function( value ) { value.bind( function( newval ) { $( '.contact-phone-label' ).text( newval ); } ); } );
    wp.customize( 'contact_phone', function( value ) { value.bind( function( newval ) { $( '.contact-phone' ).text( newval ); } ); } );
    wp.customize( 'contact_address_label', function( value ) { value.bind( function( newval ) { $( '.contact-address-label' ).text( newval ); } ); } );
    wp.customize( 'contact_address', function( value ) { value.bind( function( newval ) { $( '.contact-address' ).text( newval ); } ); } );
    wp.customize( 'contact_social_title', function( value ) { value.bind( function( newval ) { $( '.contact-social-title' ).text( newval ); } ); } );
    wp.customize( 'contact_form_title', function( value ) { value.bind( function( newval ) { $( '.contact-form-title' ).text( newval ); } ); } );
    wp.customize( 'contact_form_name_label', function( value ) { value.bind( function( newval ) { $( '.contact-form-name-label' ).text( newval ); } ); } );
    wp.customize( 'contact_form_name_ph', function( value ) { value.bind( function( newval ) { updatePlaceholder('.contact-form-card input:first', newval); } ); } );
    wp.customize( 'contact_form_email_label', function( value ) { value.bind( function( newval ) { $( '.contact-form-email-label' ).text( newval ); } ); } );
    wp.customize( 'contact_form_email_ph', function( value ) { value.bind( function( newval ) { updatePlaceholder('.contact-form-card input[type=email]', newval); } ); } );
    wp.customize( 'contact_form_subject_label', function( value ) { value.bind( function( newval ) { $( '.contact-form-subject-label' ).text( newval ); } ); } );
    wp.customize( 'contact_form_subject_ph', function( value ) { value.bind( function( newval ) { updatePlaceholder('.contact-form-card input:nth-child(3)', newval); } ); } );
    wp.customize( 'contact_form_msg_label', function( value ) { value.bind( function( newval ) { $( '.contact-form-msg-label' ).text( newval ); } ); } );
    wp.customize( 'contact_form_msg_ph', function( value ) { value.bind( function( newval ) { updatePlaceholder('.contact-form-card textarea', newval); } ); } );
    wp.customize( 'contact_form_btn', function( value ) { value.bind( function( newval ) {
        $( '.contact-form-btn' ).contents().filter(function(){ return this.nodeType == 3; }).replaceWith(newval + ' ');
    } ); } );

    // Shop Page
    wp.customize( 'shop_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-shop-page-php .entry-title' ).text( newval ); } ); } );
    wp.customize( 'shop_badge', function( value ) { value.bind( function( newval ) { $( '.shop-badge' ).text( newval ); } ); } );
    wp.customize( 'shop_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-shop-page-php p.lead' ).text( newval ); } ); } );
    wp.customize( 'shop_item_badge', function( value ) { value.bind( function( newval ) { $( '.shop-item-badge' ).text( newval ); } ); } );
    wp.customize( 'shop_view_btn', function( value ) { value.bind( function( newval ) { $( '.shop-view-btn' ).text( newval ); } ); } );
    wp.customize( 'shop_btn_text', function( value ) { value.bind( function( newval ) {
        $( '.shop-btn-text' ).contents().filter(function(){ return this.nodeType == 3; }).replaceWith(newval + ' ');
    } ); } );
    wp.customize( 'shop_newsletter_title', function( value ) { value.bind( function( newval ) { $( '.shop-newsletter-title' ).text( newval ); } ); } );
    wp.customize( 'shop_newsletter_desc', function( value ) { value.bind( function( newval ) { $( '.shop-newsletter-desc' ).text( newval ); } ); } );
    wp.customize( 'shop_newsletter_btn', function( value ) { value.bind( function( newval ) { $( '.shop-newsletter-btn' ).text( newval ); } ); } );
    wp.customize( 'shop_newsletter_ph', function( value ) { value.bind( function( newval ) { updatePlaceholder('.newsletter-cta input', newval); } ); } );

    // Free Resources Page
    wp.customize( 'free_resources_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-free-resources-page-php .entry-title' ).text( newval ); } ); } );
    wp.customize( 'free_resources_badge', function( value ) { value.bind( function( newval ) { $( '.free-resources-badge' ).text( newval ); } ); } );
    wp.customize( 'free_resources_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-free-resources-page-php p.lead' ).text( newval ); } ); } );
    wp.customize( 'resources_btn_text', function( value ) { value.bind( function( newval ) { $( '.resources-btn-text' ).text( newval ); } ); } );
    wp.customize( 'resources_cta_title', function( value ) { value.bind( function( newval ) { $( '.resources-cta-title' ).text( newval ); } ); } );
    wp.customize( 'resources_cta_desc', function( value ) { value.bind( function( newval ) { $( '.resources-cta-desc' ).text( newval ); } ); } );
    wp.customize( 'resources_cta_btn', function( value ) { value.bind( function( newval ) { $( '.resources-cta-btn' ).text( newval ); } ); } );

    // Testimonials Page
    wp.customize( 'testimonials_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-testimonials-page-php .entry-title' ).text( newval ); } ); } );
    wp.customize( 'testimonials_badge', function( value ) { value.bind( function( newval ) { $( '.testimonials-badge' ).text( newval ); } ); } );
    wp.customize( 'testimonials_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-testimonials-page-php p.lead' ).text( newval ); } ); } );
    wp.customize( 'testimonials_cta_title', function( value ) { value.bind( function( newval ) { $( '.testimonials-cta-title' ).text( newval ); } ); } );
    wp.customize( 'testimonials_cta_desc', function( value ) { value.bind( function( newval ) { $( '.testimonials-cta-desc' ).text( newval ); } ); } );
    wp.customize( 'testimonials_cta_btn', function( value ) { value.bind( function( newval ) { $( '.testimonials-cta-btn' ).text( newval ); } ); } );
    wp.customize( 'testimonials_fallback_quote', function( value ) { value.bind( function( newval ) { $( 'body.page-template-testimonials-page-php blockquote' ).text( newval ); } ); } );
    wp.customize( 'testimonials_fallback_author', function( value ) { value.bind( function( newval ) { $( 'body.page-template-testimonials-page-php .h6.fw-bold' ).text( newval ); } ); } );

    // Lead Magnet Landing
    wp.customize( 'lead_magnet_landing_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-lead-magnet-landing-php h1' ).text( newval ); } ); } );
    wp.customize( 'lead_magnet_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-lead-magnet-landing-php p.lead' ).text( newval ); } ); } );
    wp.customize( 'lm_badge_text', function( value ) { value.bind( function( newval ) { $( '.lm-badge-text' ).text( newval ); } ); } );
    wp.customize( 'lm_benefit_title', function( value ) { value.bind( function( newval ) { $( '.lm-benefit-title' ).text( newval ); } ); } );
    wp.customize( 'lm_trust_pill', function( value ) { value.bind( function( newval ) { $( '.lm-trust-pill' ).text( newval ); } ); } );
    wp.customize( 'lm_form_title', function( value ) { value.bind( function( newval ) { $( '.lm-form-title' ).text( newval ); } ); } );
    wp.customize( 'lm_form_desc', function( value ) { value.bind( function( newval ) { $( '.lm-form-desc' ).text( newval ); } ); } );
    wp.customize( 'lm_form_name_label', function( value ) { value.bind( function( newval ) { $( '.lm-form-name-label' ).text( newval ); } ); } );
    wp.customize( 'lm_form_name_ph', function( value ) { value.bind( function( newval ) { updatePlaceholder('.landing-form-card input:first', newval); } ); } );
    wp.customize( 'lm_form_email_label', function( value ) { value.bind( function( newval ) { $( '.lm-form-email-label' ).text( newval ); } ); } );
    wp.customize( 'lm_form_email_ph', function( value ) { value.bind( function( newval ) { updatePlaceholder('.landing-form-card input[type=email]', newval); } ); } );
    wp.customize( 'lm_form_btn', function( value ) { value.bind( function( newval ) {
        $( '.lm-form-btn' ).contents().filter(function(){ return this.nodeType == 3; }).replaceWith(newval + ' ');
    } ); } );
    wp.customize( 'lm_form_trust', function( value ) { value.bind( function( newval ) {
        $( '.lm-form-trust' ).contents().filter(function(){ return this.nodeType == 3; }).replaceWith(' ' + newval);
    } ); } );
    wp.customize( 'lm_quote_text', function( value ) { value.bind( function( newval ) { $( '.lm-quote-text' ).text( '"' + newval + '"' ); } ); } );
    wp.customize( 'lm_quote_author', function( value ) { value.bind( function( newval ) { $( '.lm-quote-author' ).text( newval ); } ); } );
    wp.customize( 'lm_quote_role', function( value ) { value.bind( function( newval ) { $( '.lm-quote-role' ).text( newval ); } ); } );

    // Thank You Page
    wp.customize( 'thank_you_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-thank-you-php h1' ).text( newval ); } ); } );
    wp.customize( 'thank_you_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-thank-you-php p.lead' ).text( newval ); } ); } );
    wp.customize( 'thank_you_next_title', function( value ) { value.bind( function( newval ) { $( '.thank-you-next-title' ).text( newval ); } ); } );
    wp.customize( 'thank_you_next_desc', function( value ) { value.bind( function( newval ) { $( '.thank-you-next-desc' ).text( newval ); } ); } );
    wp.customize( 'thank_you_btn_text', function( value ) { value.bind( function( newval ) { $( 'body.page-template-thank-you-php .btn' ).text( newval ); } ); } );

    // Legal Pages
    wp.customize( 'affiliate_disclosure_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-affiliate-disclosure-php h1' ).text( newval ); } ); } );
    wp.customize( 'affiliate_disclosure_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-affiliate-disclosure-php .legal-content' ).html( newval ); } ); } );
    wp.customize( 'privacy_policy_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-privacy-policy-php h1' ).text( newval ); } ); } );
    wp.customize( 'privacy_policy_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-privacy-policy-php .legal-content' ).html( newval ); } ); } );
    wp.customize( 'terms_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-terms-php h1' ).text( newval ); } ); } );
    wp.customize( 'terms_content', function( value ) { value.bind( function( newval ) { $( 'body.page-template-terms-php .legal-content' ).html( newval ); } ); } );

    // FAQ Page
    wp.customize( 'faq_title', function( value ) { value.bind( function( newval ) { $( 'body.page-template-faq-page-php .faq-title' ).text( newval ); } ); } );
    wp.customize( 'faq_badge', function( value ) { value.bind( function( newval ) { $( '.faq-badge' ).text( newval ); } ); } );
    wp.customize( 'faq_lead', function( value ) { value.bind( function( newval ) { $( '.faq-lead' ).text( newval ); } ); } );
    wp.customize( 'faq_cta_title', function( value ) { value.bind( function( newval ) { $( '.faq-cta-title' ).text( newval ); } ); } );
    wp.customize( 'faq_cta_desc', function( value ) { value.bind( function( newval ) { $( '.faq-cta-desc' ).text( newval ); } ); } );
    wp.customize( 'faq_cta_btn', function( value ) { value.bind( function( newval ) { $( '.faq-cta-btn' ).text( newval ); } ); } );

    // 404 & Search
    wp.customize( 'error_404_title', function( value ) { value.bind( function( newval ) { $( '.error-404-title' ).text( newval ); } ); } );
    wp.customize( 'error_404_desc', function( value ) { value.bind( function( newval ) { $( '.error-404-desc' ).text( newval ); } ); } );
    wp.customize( 'error_404_btn1', function( value ) { value.bind( function( newval ) { $( '.error-404 .btn-navy' ).text( newval ); } ); } );
    wp.customize( 'error_404_btn2', function( value ) { value.bind( function( newval ) { $( '.error-404 .btn-outline-navy' ).text( newval ); } ); } );
    wp.customize( 'search_results_title', function( value ) { value.bind( function( newval ) { $( '.search-results-title' ).text( newval + ' ' + '...' ); } ); } );
    wp.customize( 'archive_title_prefix', function( value ) { value.bind( function( newval ) { $( '.archive-title-prefix' ).text( newval ); } ); } );

    // --- 9. INDEXED ITEMS ---
    for ( var i = 1; i <= 6; i++ ) {
        ( function( i ) {
            wp.customize( 'process_step_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.process-step-' + i + ' .step-title' ).text( newval ); } ); } );
            wp.customize( 'process_step_' + i + '_desc', function( value ) { value.bind( function( newval ) { $( '.process-step-' + i + ' .step-desc' ).text( newval ); } ); } );
            wp.customize( 'feature_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.feature-item-' + i + ' .item-title' ).text( newval ); } ); } );
            wp.customize( 'feature_' + i + '_desc', function( value ) { value.bind( function( newval ) { $( '.feature-item-' + i + ' .item-desc' ).text( newval ); } ); } );
            wp.customize( 'problem_item_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.problem-section .problem-item:nth-child(' + i + ') h3' ).text( newval ); } ); } );
            wp.customize( 'problem_item_' + i + '_desc', function( value ) { value.bind( function( newval ) { $( '.problem-section .problem-item:nth-child(' + i + ') p' ).text( newval ); } ); } );
            wp.customize( 'service_item_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.services-section .col-lg-4:nth-child(' + i + ') h3' ).text( newval ); } ); } );
            wp.customize( 'service_item_' + i + '_desc', function( value ) { value.bind( function( newval ) { $( '.services-section .col-lg-4:nth-child(' + i + ') p' ).text( newval ); } ); } );
            wp.customize( 'product_item_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.products-section .col-lg-4:nth-child(' + i + ') h3' ).text( newval ); } ); } );
            wp.customize( 'product_item_' + i + '_price', function( value ) { value.bind( function( newval ) { $( '.products-section .col-lg-4:nth-child(' + i + ') .price-tag' ).text( newval ); } ); } );
            wp.customize( 'category_item_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.categories-section .col-lg-4:nth-child(' + i + ') h3' ).text( newval ); } ); } );
            wp.customize( 'team_member_' + i + '_name', function( value ) { value.bind( function( newval ) { $( '.team-member-' + i + ' .member-name' ).text( newval ); } ); } );
            wp.customize( 'team_member_' + i + '_role', function( value ) { value.bind( function( newval ) { $( '.team-member-' + i + ' .member-role' ).text( newval ); } ); } );
            wp.customize( 'shop_item_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.product-item:nth-child(' + i + ') .item-title' ).text( newval ); } ); } );
            wp.customize( 'shop_item_' + i + '_price', function( value ) { value.bind( function( newval ) { $( '.product-item:nth-child(' + i + ') .item-price' ).text( newval ); } ); } );
            wp.customize( 'services_tier_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.pricing-card:nth-child(' + i + ') h3' ).text( newval ); } ); } );
            wp.customize( 'services_tier_' + i + '_price', function( value ) { value.bind( function( newval ) { $( '.pricing-card:nth-child(' + i + ') .price' ).text( newval ); } ); } );
            wp.customize( 'services_tier_' + i + '_btn', function( value ) { value.bind( function( newval ) { $( '.pricing-card:nth-child(' + i + ') .btn' ).text( newval ); } ); } );
            wp.customize( 'resource_' + i + '_title', function( value ) { value.bind( function( newval ) { $( '.resource-item:nth-child(' + i + ') .item-title' ).text( newval ); } ); } );
            wp.customize( 'resource_' + i + '_type', function( value ) { value.bind( function( newval ) { $( '.resource-item:nth-child(' + i + ') .item-type' ).text( newval ); } ); } );
            wp.customize( 'lm_benefit_' + i, function( value ) { value.bind( function( newval ) { $( '.benefit-item-' + i + ' .benefit-text' ).text( newval ); } ); } );
        } )( i );
    }

    // --- 10. FOOTER ---
    wp.customize( 'footer_branding_text', function( value ) { value.bind( function( newval ) { $( '.branding-text' ).text( newval ); } ); } );
    wp.customize( 'footer_col2_title', function( value ) { value.bind( function( newval ) { $( '.footer-col2-title' ).text( newval ); } ); } );
    wp.customize( 'footer_col3_title', function( value ) { value.bind( function( newval ) { $( '.footer-col3-title' ).text( newval ); } ); } );
    wp.customize( 'footer_newsletter_title', function( value ) { value.bind( function( newval ) { $( '.footer-newsletter-title' ).text( newval ); } ); } );
    wp.customize( 'footer_newsletter_desc', function( value ) { value.bind( function( newval ) { $( '.footer-newsletter-desc' ).text( newval ); } ); } );
    wp.customize( 'footer_newsletter_ph', function( value ) { value.bind( function( newval ) { updatePlaceholder('.site-footer .newsletter-form input', newval); } ); } );
    wp.customize( 'footer_newsletter_btn', function( value ) { value.bind( function( newval ) { $( '.footer-newsletter-btn' ).text( newval ); } ); } );
    wp.customize( 'footer_newsletter_trust', function( value ) { value.bind( function( newval ) { $( '.footer-newsletter-trust' ).contents().filter(function(){ return this.nodeType == 3; }).replaceWith(' ' + newval); } ); } );
    wp.customize( 'footer_privacy_label', function( value ) { value.bind( function( newval ) { $( '.footer-privacy-label' ).text( newval ); } ); } );
    wp.customize( 'footer_terms_label', function( value ) { value.bind( function( newval ) { $( '.footer-terms-label' ).text( newval ); } ); } );
    wp.customize( 'footer_copyright', function( value ) { value.bind( function( newval ) { $( '.site-footer .copyright' ).text( newval ); } ); } );

} )( jQuery );
