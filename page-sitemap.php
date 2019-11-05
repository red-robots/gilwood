<?php
/**
 * Template Name: Sitemap
 */

get_header(); ?>

<div id="primary" class="content-area default cf">
	<main id="main" class="site-main wrapper cf" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			<header class="page-header">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</header><!-- .page-header -->

			<div class="main-text-content">
				<?php the_content(); ?>
				<?php get_template_part('template-parts/content','sitemap'); ?>
			</div>	
			
		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
