<?php
get_header(); ?>

<div id="primary" class="content-area staffpage default cf">
	<main id="main" class="site-main wrapper cf" role="main">

	<?php while ( have_posts() ) : the_post(); ?>
		<?php  
			$photo = get_field("image");
			$title = get_field("title");
		?>
		<article id="post-<?php the_ID(); ?>" class="entry-content cf <?php echo ($photo) ? 'hasphoto':'nophoto';?>">
			<?php if ($photo) { ?>
			<div class="photo">
				<img src="<?php echo $photo['url'] ?>" alt="<?php echo $photo['title'] ?>" />
			</div>	
			<?php } ?>

			<div class="text">
				<div class="head">
					<h1><?php the_title() ?></h1>
					<?php if ($title) { ?>
					<div class="jobtitle"><?php echo $title ?></div>	
					<?php } ?>
				</div>
				<?php the_content(); ?>
			</div>
		</article>

	<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
