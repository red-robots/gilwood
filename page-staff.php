<?php
/**
 * Template Name: Staff
 */

get_header(); ?>

<div id="primary" class="content-area cf">
	<main id="main" class="site-main cf" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			<h1 style="display:none"><?php the_title(); ?></h1>

			<?php if ( get_the_content() ) { ?>
			<div class="main-text-content">
				<div class="wrapper"><?php the_content(); ?></div>
			</div>	
			<?php } ?>
			
			<?php  
				$sections = get_field('sections');
			?>

			<?php if ($sections) { ?>
				
				<?php $i=1; foreach ($sections as $s) { 
					$title = $s['title'];
					$subtitle = $s['subtitle'];
					$text = $s['text'];
					$photos = $s['photo'];
					$countPhotos = ($photos) ? count($photos) : 0;
					$rowClass = ($i % 2 == 0) ? 'even':'odd';
				?>
				<section class="section-text-image <?php echo $rowClass ?> row<?php echo $i?> <?php echo ($text || $photos) ? 'twocol':'full'; ?> cf">
					<div class="wrapper">
						<?php if ($text) { ?>
						<div class="textcol">
							<?php if ($title) { ?>
							<h2 class="hd"><?php echo $title ?></h2>	
							<?php } ?>
							<?php if ($subtitle) { ?>
							<div class="subhd"><?php echo $subtitle ?></div>	
							<?php } ?>

							<?php if ($text) { ?>
							<div class="text"><?php echo $text ?></div>	
							<?php } ?>
						</div>	
						<?php } ?>

						<?php if ($photos) { ?>
						<div class="imagecol <?php echo ($countPhotos>1) ? 'more':'one'?>">
							<?php foreach ($photos as $pic) { ?>
								<div class="pic"><img src="<?php echo $pic['url'] ?>" alt="<?php echo $pic['title'] ?>" /></div>
							<?php } ?>
						</div>	
						<?php } ?>
					</div>
				</section>	
				<?php $i++; } ?>

			<?php  } ?>
		<?php endwhile; ?>

		<?php  
		//$paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
		// 'paged' => $paged
		$args = array(
			'posts_per_page'   => -1,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'staff',
			'post_status'      => 'publish',
			
		);
		$team = new WP_Query($args); 
		if ( $team->have_posts() ) {  ?>
		<section class="section-staff cf">
			<?php $j=1; while ( $team->have_posts() ) : $team->the_post();  
				$jobtitle = get_field("title");
				$image = get_field("image");
				$noimage = get_bloginfo("template_url") . "/images/photo-coming-soon.png";
				$imageSrc = ($image) ? $image['url'] : $noimage;
				$imageAlt = ($image) ? $image['title'] : '';
				$staffname = get_the_title(); 
				$row = ($j % 2 == 0) ? 'even':'odd';
			?>
			<div class="row-info <?php echo ($image) ? 'hasimage':'noimage' ?> <?php echo $row ?>">
				<div class="wrapper cf">
					<div class="flex cf">
						<div class="photo">
							<img src="<?php echo $imageSrc ?>" alt="<?php echo $imageAlt ?>" />
						</div>
						<div class="text">
							<div class="texwrap cf">
								<div class="subhd">
									<h2 class="hd name"><?php echo $staffname; ?></h2>
									<?php if ($jobtitle) { ?>
									<div class="jobtitle"><?php echo $jobtitle ?></div>	
									<?php } ?>
								</div>
								<div class="details">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $j++; endwhile; wp_reset_postdata(); ?>
		</section>
		<?php } ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
