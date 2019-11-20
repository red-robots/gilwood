<?php 
$pageId = get_the_ID();
$is_protected = post_password_required( $pageId );
if ( is_front_page() ) { ?>
		
	<?php if( $slides = get_field('slides') ) { 
		$count = count($slides);
		$slidesId = ($count>1) ? 'slideshow':'static';
		?>
		<div id="<?php echo $slidesId ?>" class="swiper-container">
    		<div class="swiper-wrapper">
    			<?php foreach ($slides as $s) { 
    				$image = $s['image'];
    				$caption = $s['caption'];
    				$buttonName = $s['button_name'];
    				$buttonLink = $s['button_link']; ?>
    				<?php if ($image) { ?>
    				<div class="swiper-slide" style="background-image:url('<?php echo $image['url'] ?>');">
    					<?php if ($caption || ($buttonName && $buttonLink)) { ?>
    					<div class="slideCaption">
    						<div class="wrapper">
	    						<div class="caption"><?php echo $caption ?></div>
	    						<?php if ($buttonName && $buttonLink) { ?>
	    						<div class="slideBtn"><a href="<?php echo $buttonLink ?>" class="sbtn"><?php echo $buttonName ?></a></div>
	    						<?php } ?>
    						</div>
    					</div>	
    					<?php } ?>
    				</div>
    				<?php } ?>
    			<?php } ?>
    		</div>
			
			<?php if ($count>1) { ?>
	    		<!-- Add Pagination -->
			    <div class="swiper-pagination"></div>
			    <!-- Add Arrows -->
			    <div class="swiper-button-next"></div>
			    <div class="swiper-button-prev"></div>
			<?php } ?>

    	</div>
	<?php } ?>


<?php } else { ?>

	<?php if (!$is_protected) { ?>
	
		<?php  
		if( $banner = display_banner() ) {
			$banner_image = $banner['image'];
			$banner_caption = $banner['caption'];
			$banner_button_name = $banner['button_name'];
			$banner_button_link = $banner['button_link'];
			?>
			<div class="hero cf">
				<img src="<?php echo $banner_image['url'] ?>" alt="<?php echo $banner_image['title'] ?>" />
				<?php if ($banner_caption) { ?>
				<div class="hero-caption">
					<div class="wrap cf">
						<div class="caption text-center">
							<?php echo $banner_caption ?>
							<?php if ($banner_button_name && $banner_button_link) { ?>
							<div class="btndiv">
								<a href="<?php echo $banner_button_link ?>"><?php echo $banner_button_name ?></a>
							</div>	
							<?php } ?>
						</div>
					</div>
				</div>	
				<?php } ?>
			</div>	
		<?php } ?>

	<?php } ?>

<?php } ?>