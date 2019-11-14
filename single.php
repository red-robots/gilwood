<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bellaworks
 */

get_header();
$posttype = get_post_type();
?>

<div class="content-area wrapper singlepage cf">
	<main id="main" class="site-main wrapper cf" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php if ($posttype=='post') { ?>

				 <!-- <div class="breadcrumb">
				 	<span class="wrap">
				 		<a href="<?php //echo get_site_url() ?>/news-events/">&lsaquo; News &amp; Events</a>
				 	</span>
				 </div> -->
				 <h1 class="pagetitle"><span><?php echo get_the_title(); ?></span></h1>
				 <div class="postdate top"><?php echo get_the_date('F j, Y'); ?></div>

				 <div class="content-wrapper">
					 <div class="content-left">
					
						<!-- <header class="entry-header">
							<h1 class="pagetitle"><?php //echo get_the_title(); ?></h1>
							<div class="postdate"><?php //echo get_the_date('F j, Y'); ?></div>
						</header> -->
						

						 <?php  
							$pid = get_the_ID();
							$thumbId = get_post_thumbnail_id($pid);
							$img = wp_get_attachment_image_src($thumbId,'full');
						 ?>

						 <div class="entry-content cf">
						 	<?php if (has_post_thumbnail()): ?>
						 		<?php the_post_thumbnail('large'); ?>
						 	<?php endif ?>
						 	<?php the_content(); ?>
						 </div>

					 </div>
					 <?php get_sidebar(); ?>
				 </div>
				
			<?php } else { ?>

				<h1 class="pagetitle"><span><?php echo get_the_title(); ?></span></h1>

				<div class="entry-content cf">
				 	<?php if (has_post_thumbnail()): ?>
				 		<?php the_post_thumbnail('large'); ?>
				 	<?php endif ?>
				 	<?php the_content(); ?>
				 </div>

			<?php } ?>

		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
