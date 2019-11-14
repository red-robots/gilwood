<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package bellaworks
 */

get_header(); ?>

<div class="content-area wrapper newspage cf">

	<h1 class="pagetitle"><span>Search Results</span></h1>

	<main id="main" class="site-main" role="main">
	
	<?php
	global $wp_query;
	$total_pages = (isset($wp_query->max_num_pages) && $wp_query->max_num_pages) ? $wp_query->max_num_pages : 0;

	if ( have_posts() ) : ?>
		
		<h2 class="searchfor"><?php printf( esc_html__( 'Search term: %s', 'bellaworks' ), '<em>' . get_search_query() . '</em>' ); ?></h2>

		<div class="news-list cf">
			<div class="flex-columns main-stage">
				<?php /* Start the Loop */
				while ( have_posts() ) : the_post(); ?>

					<?php  
					$content = get_the_content();
					if($content) {
						$content = strip_tags($content);
						$content = shortenText($content, 200," ","...");
					}
					$pid = get_the_ID();
					$thumbId = get_post_thumbnail_id($pid);
					$img = wp_get_attachment_image_src($thumbId,'full');
					$px = get_bloginfo("template_url") . "/images/rectangle.png";
					?>
					<article id="news-<?php the_ID(); ?>" class="news-entry twocol">
						<div class="inside cf">
							<?php if ($img) { ?>
								<figure>
									<a href="<?php echo get_permalink(); ?>" style="background-image:url('<?php echo $img[0] ?>');">
										<img src="<?php echo $px ?>" alt="" aria-hidden="true" />
									</a>
								</figure>
							<?php } ?>
							<div class="excerpt cf">
								<h3 class="title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
								<div class="postdate"><?php echo get_the_date('F j, Y'); ?></div>
								<?php if ($content) { ?>
								<div class="text"><?php echo $content ?></div>
								<?php } ?>
								<div class="btndiv"><a href="<?php echo get_permalink(); ?>">Read More &rarr;</a></div>
							</div>
						</div>
					</article>
				
				<?php endwhile; ?>
			</div>
		</div>

		<?php
		    if ($total_pages > 1){ ?>

		        <div id="pagination" class="pagination">
			        <?php
			        	$the_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					    $pagination = array(
					        'base' => @add_query_arg('paged','%#%'),
					        'format' => '?paged=%#%',
					        'mid-size' => 1,
					        'current' => $the_paged,
					        'total' => $total_pages,
					        'prev_next' => True,
					        'prev_text' => __( '<span class="fas fa-angle-left"></span>' ),
					        'next_text' => __( '<span class="fas fa-angle-right"></span>' )
					    );
					    echo paginate_links($pagination);
					?>
				</div>
				<?php
		    }
		?>

	<?php else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>

	</main><!-- #main -->

	<?php get_sidebar(); ?>

</div><!-- #primary -->

<?php
get_footer();
