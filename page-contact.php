<?php
/**
 * Template Name: Contact
 */

get_header(); ?>
<div id="primary" class="content-area contactpage default cf">
	<main id="main" class="site-main wrapper cf" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				$contact = get_field('contact');  
				$google_map = get_field('google_map');  
			?>

			<?php if ($contact) { ?>
			<div class="contact contentcol">
				<?php echo $contact; ?>
			</div>	
			<?php } ?>

			<?php if ($google_map) { ?>
			<div class="map contentcol">
				<?php echo $google_map; ?>
			</div>	
			<?php } ?>

		<?php endwhile; ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
