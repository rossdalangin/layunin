<?php
/**
 * Template Name: Thank You Page
 */
get_header(); ?>
<main id="primary" class="site-main py-5 text-center">
	<div class="container">
		<div class="py-5">
			<i class="icon-success display-1 text-success mb-4"></i>
			<h1 class="display-3"><?php echo esc_html( get_theme_mod( 'thank_you_title', "You're All Set!" ) ); ?></h1>
			<p class="lead mb-5"><?php echo esc_html( get_theme_mod( 'thank_you_content', 'Thank you for your interest. Please check your inbox for the link to your resource.' ) ); ?></p>
			<div class="next-steps py-4 border-top border-bottom">
				<h3>What's Next?</h3>
				<p>While you wait, why not check out our most popular articles?</p>
				<a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="btn btn-outline-primary">Visit the Blog</a>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
