<?php get_header(); ?>

<section class="interior-section row blog-content">

		<div class="col-xs-10 col-sm-8 col-md-9 clearfix">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('full', array( 'class' => 'post-featured'));
					}?>

					<?php //get_template_part( 'post-formats/format', get_post_format() ); ?>

					<article>
						<?php the_title('<h1>', '</h1>'); ?>
						<?php 	$postid = get_the_ID();
								$jobtitle =  get_post_meta($postid, 'enterjobtitle_meta_value_key', 'true'); // Should be staffjobtitle

							if ($jobtitle) {
								echo '<h3 class="title" style="margin: 4px 0 16px 0;">' . $jobtitle . '</h3>';
							}
					 	?>
					 	<section class="entry-content">
							<?php the_content(); ?>
						</section>
						
					</article>

				<?php endwhile; ?>

				<?php endif; ?>

			</div>
	
		<div id="sidebar-col" class="col-xs-2 col-sm-4 col-md-3">
			<?php get_sidebar(); ?>
		</div>
</section>


<?php get_footer(); ?>
