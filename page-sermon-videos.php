<?php
/**
 * Template Name: Sermon Videos
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */
$banner_image = get_field('banner_image');
get_header(); 
$id = get_the_ID();
$is_protected = post_password_required( $id );
?>

<div id="primary" class="content-area sectional default cf">
	<main id="main" class="site-main cf" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			<?php if ($banner_image) { ?>
				<h1 style="display:none"><?php the_title(); ?></h1>
				<?php if ( get_the_content() ) { ?>
				<div class="main-text-content">
					<div class="wrapper"><?php the_content(); ?></div>
				</div>	
				<?php } ?>

			<?php } else { ?>
				<header class="page-header wrapper">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header>
				<div class="page-content wrapper"><?php the_content(); ?></div>
			<?php } ?>
		<?php endwhile; ?>		

<div class="wrapper">



		<?php
			$i = 0;
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'sermon_video',
				'posts_per_page' => 1,
				'paged' => $paged
			));
				if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); 
						$pId = get_the_ID();
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						if(1 == $paged) {
					?>

					<div class="firstvideo ">
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>
				<?php } endwhile; endif; ?>




			<?php
			$i = 0;
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'sermon_video',
				'posts_per_page' => 30,
				'post__not_in' => array($pID),
				'paged' => $paged,
				'facetwp' => true,
			));
				if ($wp_query->have_posts()) : ?>
					
						<section class="videos ">
							<div class="filters">
								<?php echo do_shortcode('[facetwp facet="sermon_videos"]'); ?>
							</div>
							<div class="video-container">
							<?php  while ($wp_query->have_posts()) : $wp_query->the_post(); $i++; ?>
								
								<div class="video <?php echo $i; ?>">
									<a href="<?php the_permalink(); ?>">
										<h2><?php the_title(); ?></h2>
										<div class="vidicon">
											<i class="fas fa-video fa-3x"></i>
										</div>
										<div class="button">
											Watch Now <i class="fas fa-chevron-circle-right"></i>
										</div>
									</a>
								</div>

							<?php endwhile; ?>
							
							</div>
							<?php pagi_posts_nav(); ?>
						</section>
					
				<?php endif; ?>
			 </div>   
			


		

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
