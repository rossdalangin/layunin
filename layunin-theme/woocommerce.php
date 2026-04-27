<?php
/**
 * WooCommerce integration template
 */

get_header();
?>

<main id="primary" class="site-main container py-5">
	<?php woocommerce_content(); ?>
</main>

<?php
get_footer();
