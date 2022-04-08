<?php 

$box1Title = get_field('box1_title');
$box1Desc = get_field('box1_description');
$box1Img = get_field('box1_image');
$box1Link = get_field('box1_link');

$box2Title = get_field('box2_title');
$box2Desc = get_field('box2_description');
$box2Img = get_field('box2_image');
$box2Link = get_field('box2_link');

$box3Title = get_field('box3_title');
$box3Desc = get_field('box3_description');
$box3stream = get_field('box3_stream_embed');
// $box2Link = get_field('box2_link');
?>
<div class="hero-boxes">
	<div class="box border-right">
		<?php if($box1Link){ ?><a href="<?php echo $box1Link; ?>"><?php } ?>
			<div class="box-image js-blocks">
				<img src="<?php echo $box1Img['url']; ?>">
			</div>
			<div class="box-footer odd">
				<?php if($box1Title){ ?><h2><?php echo $box1Title; ?></h2><?php } ?>
				<?php echo $box1Desc; ?>
			</div>
		<?php if($box1Link){ ?></a><?php } ?>
	</div>
	<div class="box border-right">
		<?php if($box2Link){ ?><a href="<?php echo $box2Link; ?>"><?php } ?>
			<div class="box-image js-blocks">
				<img src="<?php echo $box2Img['url']; ?>">
			</div>
			<div class="box-footer even">
				<?php if($box2Title){ ?><h2><?php echo $box2Title; ?></h2><?php } ?>
				<?php echo $box2Desc; ?>
			</div>
		<?php if($box2Link){ ?></a><?php } ?>
	</div>
	<div class="box ">
		<?php if($box3Link){ ?><a href="<?php echo $box3Link; ?>"><?php } ?>
			<div class="box-image js-blocks streamer">
				<?php echo $box3stream; ?>
			</div>
			<div class="box-footer odd">
				<?php if($box3Title){ ?><h2><?php echo $box3Title; ?></h2><?php } ?>
				<?php echo $box1Desc; ?>
			</div>
		<?php if($box3Link){ ?></a><?php } ?>
	</div>
</div>
<div class="clear"></div>