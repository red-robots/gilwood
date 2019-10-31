	</div><!-- #content -->

	<?php  
		$links_with_icon = get_field('link_with_icon','option');
	?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ($links_with_icon) { ?>
		<div class="link-with-icons cf">
			<div class="wrapper cf">
				<div class="flexrow cf">
					<?php foreach ($links_with_icon as $b) { 
						$icon = $b['icon'];
						$title = $b['title'];
						$link = $b['link'];
						$parse = '';
						if($link) {
							$parse = parse_external_url($link);
						}
						if($title && $link) { ?>
						<div class="linkcol">
							<a href="<?php echo $parse['url'] ?>" target="<?php echo $parse['target'] ?>" class="icol">
								<?php if ($icon) { ?>
								<div class="icondiv"><img src="<?php echo $icon['url'] ?>" alt="" aria-hidden="true" class="linkIcon"></div>
								<?php } ?>
								<span class="link-title"><?php echo $title ?></span>	
							</a>
						</div>	
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>	
		<?php } ?>

		<?php  
			$address1 = get_field('address1','option');
			$address2 = get_field('address2','option');
			$phone = get_field('phone','option');
			$email = get_field('email','option');
			$footer_logo = get_field('footer_logo','option');
			$footlinks = get_field('footlinks','option');
			$social_links = get_social_links();
		?>
		<div class="foot-links cf">
			<div class="wrapper">
				<div class="footflex">
					<div class="fotcol left">
						<?php if ($footer_logo) { ?>
							<div class="footlogo"><img class="footlogo" src="<?php echo $footer_logo['url'] ?>" alt="<?php echo get_bloginfo("name") ?>" /></div>
						<?php } ?>

						<?php if ($address1 && $address2 ) { ?>
							<div class="info">
								<div><?php echo $address1 ?></div>
								<div><?php echo $address2 ?></div>
							</div>
						<?php } ?>

						<?php if ($phone) { ?>
							<div class="info">Phone: <a href="tel:<?php echo format_phone_number($phone) ?>"><?php echo $phone ?></a></div>
						<?php } ?>

						<?php if ($email) { ?>
							<div class="info">Email: <a href="mailto:<?php echo antispambot($email,1) ?>"><?php echo antispambot($email) ?></a></div>
						<?php } ?>
					</div>
					<div class="fotcol right">
						<?php if ($footlinks) { ?>
							<div class="footlinkscol">
							<?php foreach ($footlinks as $n) { 
								$ftitle = $n['title'];
								$flinks = $n['links'];
								?>
								<div class="flinkcol">
									<?php if ($ftitle) { ?>
									<div class="ftitle"><strong><?php echo $ftitle ?></strong></div>	
									<?php } ?>
									<?php if ($flinks) { ?>
									<ul class="flinks">
										<?php foreach ($flinks as $e) { ?>
										<li><a href="<?php echo get_permalink($e->ID) ?>"><?php echo $e->post_title ?></a></li>
										<?php } ?>
									</ul>	
									<?php } ?>
								</div>
							<?php } ?>
							</div>
						<?php } ?>
						<?php if ($social_links) { ?>
						<div class="social-media">
							<?php foreach ($social_links as $k=>$s) { 
								$s_icon = $s['icon'];
								$s_link = $s['link'];
								?>
							<a href="<?php echo $s_link ?>" target="_blank"><i class="<?php echo $s_icon ?>" aria-hidden="true"></i><span class="sr"><?php echo $k ?></span></a>
							<?php } ?>
						</div>	
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
