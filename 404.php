<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bellaworks
 */

get_header(); ?>

	<div id="primary" class="content-area default error-404">
		<main id="main" class="site-main wrapper cf" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Sorry, that page can&rsquo;t be found.', 'bellaworks' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below.', 'bellaworks' ); ?></p>
				<?php get_template_part('template-parts/content','sitemap'); ?>
			</div>
				

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
