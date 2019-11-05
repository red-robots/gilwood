<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */

get_header(); ?>

<div id="primary" class="content-area default cf">
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

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
