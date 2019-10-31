<?php get_header(); ?>
<div id="primary" class="full-content-area cf">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php  
			$row1_image = get_field('row1_image');
			$row1_text = get_field('row1_text');
			$row1_event = get_field('row1_event');
		?>
		
		<section class="section row1 cf">
			<div class="flexrow">
				<?php if ($row1_image) { ?>
					<div class="imagecol left">
						<img src="<?php echo $row1_image['url'] ?>" alt="<?php echo $row1_image['title'] ?>" />
					</div>
				<?php } ?>

				
					<div class="textcol right">
						<div class="pad cf">
							<?php if ($row1_text) { ?>
								<div class="text"><?php echo $row1_text; ?></div>
							<?php } ?>

							<?php if ( isset($row1_event['title']) && isset($row1_event['events']) ) { ?>
								<div class="event-info">
									<?php if ($row1_event['title']) { ?>
									<div class="event-title"><?php echo $row1_event['title'] ?></div>	
									<?php } ?>

									<?php foreach ($row1_event['events'] as $e) { 
										$time = $e['time'];
										$event = $e['description']; ?>
										<div class="info">
											<span class="time"><?php echo $time ?></span>
											<span class="event"><?php echo $event ?></span>
										</div>	
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					</div>
				
			</div>
		</section>
		
	<?php endwhile; ?>

	<?php  
	$posts_per_page = 8;
	$post_type = 'post';
	$args = array(
		'posts_per_page'=> $posts_per_page,
		'post_type'		=> $post_type,
		'post_status'	=> 'publish'
	);
	$news = new WP_Query($args);
	$news2 = get_posts($args);
	if ( $news->have_posts() ) { ?>
	<section class="section row2 news">
		<div class="titlediv">
			<span>News</span>
		</div>
		<div class="news-items">
			<div class="newsflex cf">
				<div class="newscol left">
					<div id="news-carousel" class="news-carousel owl-carousel">
						<?php $j=1; while ( $news->have_posts() ) : $news->the_post();  ?>
							<?php  
								$pid = get_the_ID();
								$thumbId = get_post_thumbnail_id($pid);
								$img = wp_get_attachment_image_src($thumbId,'full');
								$content = get_the_content();
								if($content) {
									$content = strip_tags($content);
									$content = shortenText($content, 500," ","...");
								}
								$px = get_bloginfo("template_url") . "/images/rectangle.png";
							?>
							<div id="pid-<?php echo $pid?>" data-row="<?php echo $j?>" data-postid="<?php echo $pid?>" class="news-item <?php echo ($img) ? 'hasimage':'noimage'?>">
								<div class="flexrow">
									<?php if ($img) { ?>
									<div class="news-image" style="background-image:url('<?php echo $img[0]?>');">
										<img src="<?php echo $px ?>" alt="" aria-hidden="true" />
									</div>	
									<?php } ?>
									<div class="news-text">
										<h3 class="newstitle"><?php echo get_the_title(); ?></h3>
										<?php echo $content ?>
										<div class="btndiv">
											<a href="<?php echo get_permalink(); ?>">Read More &gt;</a>
										</div>
									</div>
								</div>
							</div>
						<?php $j++; endwhile; wp_reset_postdata(); ?>	
					</div>
					<a href="#" data-action=".owl-prev" class="customnav prev"><span class="sr">Previous</span><i class="fas fa-chevron-left"></i></a>
					<a href="#" data-action=".owl-next" class="customnav next"><span class="sr">Next</span><i class="fas fa-chevron-right"></i></a>
				</div>
				<div class="newscol right">
					<div class="inside cf">
						<h3 class="coltitle">Latest News Posts</h3>
						<ul id="newsItemList" class="lists">
						<?php $k=1; foreach ($news2 as $n) { ?>
							<li class="<?php echo ($k==1) ? 'active':''?>" id="newsId<?php echo $n->ID?>"><a href="<?php echo get_permalink($n->ID); ?>"><?php echo $n->post_title; ?></a></li>
						<?php $k++; } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>

</div><!-- #primary -->
<?php
get_footer();
