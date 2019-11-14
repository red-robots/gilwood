<?php
/**
 * Template Name: News & Events
 */

get_header(); 
$banner = display_banner();
?>

<div class="content-area wrapper newspage cf">

	<?php if ($banner) { ?>
		<h1 style="display:none;"><?php echo get_the_title(); ?></h1>
	<?php } else { ?>
		<h1 class="pagetitle"><span><?php echo get_the_title(); ?></span></h1>
	<?php } ?>

	<main id="main" class="site-main full cf" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php if ( get_the_content() ) { ?>
			<div class="main-text-content">
				<div class="wrapper"><?php the_content(); ?></div>
			</div>	
			<?php } ?>
		<?php endwhile; ?>
		
		<?php  
		$perpage = 10;
		$paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
		$args = array(
			'posts_per_page'   => $perpage,
			'paged'			   => $paged,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'post',
			'post_status'      => 'publish',
			);
		$news = new WP_Query($args);
		if ( $news->have_posts() ) { ?>
		<div class="news-list cf">
			<div class="flex-columns main-stage">
				<?php while ( $news->have_posts() ) : $news->the_post();
					$content = get_the_content();
					if($content) {
						$content = strip_tags($content);
						$content = shortenText($content, 200," ","...");
					}
					$pid = get_the_ID();
					$thumbId = get_post_thumbnail_id($pid);
					$img = wp_get_attachment_image_src($thumbId,'full');
					$px = get_bloginfo("template_url") . "/images/rectangle.png";
				?>
				<article id="news-<?php the_ID(); ?>" class="news-entry">
					<div class="inside cf">
						<?php if ($img) { ?>
							<figure>
								<a href="<?php echo get_permalink(); ?>" style="background-image:url('<?php echo $img[0] ?>');">
									<img src="<?php echo $px ?>" alt="" aria-hidden="true" />
								</a>
							</figure>
						<?php } ?>
						<div class="excerpt cf">
							<h3 class="title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
							<div class="postdate"><?php echo get_the_date('F j, Y'); ?></div>
							<?php if ($content) { ?>
							<div class="text"><?php echo $content ?></div>
							<?php } ?>
							<div class="btndiv"><a href="<?php echo get_permalink(); ?>">Read More &rarr;</a></div>
						</div>
					</div>
				</article>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
		<?php } ?>

		<?php
			$total_pages = $news->max_num_pages;
		    if ($total_pages > 1){ ?>

		        <div id="pagination" class="pagination">
			        <?php
					    $pagination = array(
					        'base' => @add_query_arg('pg','%#%'),
					        'format' => '?pg=%#%',
					        'mid-size' => 1,
					        'current' => $paged,
					        'total' => $total_pages,
					        'prev_next' => True,
					        'prev_text' => __( '<span class="fas fa-angle-left"></span>' ),
					        'next_text' => __( '<span class="fas fa-angle-right"></span>' )
					    );
					    echo paginate_links($pagination);
					?>
				</div>
				<?php
		    }
		?>

	</main><!-- #main -->
	<?php //get_sidebar(); ?>
</div><!-- #primary -->


<?php
get_footer();
