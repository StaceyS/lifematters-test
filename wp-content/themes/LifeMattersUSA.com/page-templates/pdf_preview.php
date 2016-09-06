<?php 

/* Template Name: PDF Preview Template  */

get_header(); ?>

	<div class="row main col-lg-12 interior-section pdf-preview" role="main">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php the_title('<h1>','</h1>');  ?>

					<div class="pdf-preview-details">
						<?php the_content(); ?>
					</div>

					<div class="pdf-preview-thumb">
						<?php echo get_field('pdf_preview_link'); ?>
						<p class="instructions">[Click thumbnail to preview]</p>
					</div>
					
				<?php endwhile; ?>

			<?php endif; ?>
	
	</div>


<?php get_footer(); ?>