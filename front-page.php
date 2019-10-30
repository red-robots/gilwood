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

</div><!-- #primary -->
<?php
get_footer();
