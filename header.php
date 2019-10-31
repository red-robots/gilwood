<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Heebo:100,300,400,500,700,800,900&display=swap" rel="stylesheet">
<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script>


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site cf">
	<a class="skip-link sr" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>
	
	<?php 
		$address1 = get_field('address1','option');
		$address2 = get_field('address2','option');
		$phone = get_field('phone','option');
		$hdr_title = get_field('hdr_title','option');
		$hdr_link = get_field('hdr_link','option');
		$roundbtn = '';
		if($hdr_link) {
			$roundbtn = parse_external_url($hdr_link);
		}
	?>
	<header id="masthead" class="site-header cf" role="banner">
		<?php if ($address1 || $address2) { ?>
		<div class="tophead">
			<div class="wrapper">
				<?php if ($address1) { ?>
					<span class="info"><?php echo $address1 ?></span>
				<?php } ?>
				<?php if ($address2) { ?>
					<span class="info"><?php echo $address2 ?></span>
				<?php } ?>
				<?php if ($phone) { ?>
					<span class="info"><a href="tel:<?php echo format_phone_number($phone) ?>"><?php echo $phone ?></a></span>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
		<div class="wrapper siteinner cf">
			<?php if( get_custom_logo() ) { ?>
	            <div class="logo">
	            	<?php the_custom_logo(); ?>
	            </div>
	        <?php } else { ?>
	            <h1 class="logo">
		            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	            </h1>
	        <?php } ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="sr"><?php esc_html_e( 'MENU', 'bellaworks' ); ?></span>
					<span class="bar"></span>
				</button>
				<?php 
					$nav_arrs = array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container_class'=>'mainmenu');
					if($roundbtn) {
						$items_wrap = '<ul id="%1$s" class="%2$s">%3$s';
						$items_wrap .= sprintf( '</ul><a href="'.$roundbtn['url'].'" target="'.$roundbtn['target'].'" class="roundbtn"><span><em>'.$hdr_title.'</em></span></a>', '');
						$nav_arrs['items_wrap'] = $items_wrap;
					} 
					wp_nav_menu( $nav_arrs ); 
				?>
			</nav><!-- #site-navigation -->
		</div><!-- wrapper -->
	</header><!-- #masthead -->

	<?php get_template_part('template-parts/hero'); ?>

	<div id="content" class="site-content cf">
