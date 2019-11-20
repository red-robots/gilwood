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
		

			<?php if (!$is_protected) { ?>
				
				<?php if ( $sections = get_field('sections') ) { ?>
					
					<?php $i=1; foreach ($sections as $s) { 
						$title = $s['title'];
						$subtitle = $s['subtitle'];
						$text = $s['text'];
						$text = ($text) ? email_obfuscator($text) : '';
						$photos = $s['photo'];
						$countPhotos = ($photos) ? count($photos) : 0;
						$rowClass = ($i % 2 == 0) ? 'even':'odd';
					?>
					<section class="section-text-image <?php echo $rowClass ?> row<?php echo $i?> <?php echo ($text || $photos) ? 'twocol':'full'; ?> cf">
						<div class="wrapper colwrap">
							<?php if ($text) { ?>
							<div class="stcol textcol">
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
							<div class="stcol imagecol <?php echo ($countPhotos>1) ? 'more':'one'?>">
								<?php foreach ($photos as $pic) { ?>
									<div class="pic"><img src="<?php echo $pic['url'] ?>" alt="<?php echo $pic['title'] ?>" /></div>
								<?php } ?>
							</div>	
							<?php } ?>
						</div>
					</section>	
					<?php $i++; } ?>

				<?php  } ?>
			
			<?php  } ?>


		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
