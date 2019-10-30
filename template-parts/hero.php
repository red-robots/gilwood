<?php  
	$banner_image = get_field('banner_image');
	$banner_caption = get_field('banner_caption');
	$banner_button_name = get_field('banner_button_name');
	$banner_button_link = get_field('banner_button_link');
?>
<?php if ($banner_image) { ?>
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