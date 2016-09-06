<?php 

/* Template Name: Checklist Form Template  */

get_header(); ?>

	<div class="row main col-lg-12 interior-section pdf-preview" role="main">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php the_title('<h1>','</h1>');  ?>

					<div class="pdf-preview-details">
						<?php the_content(); ?>
					</div>

					<div class="checklist-preview-thumb">
						<?php $checklist_thumb = get_field('checklist_preview_thumb'); ?>
						<img src="<?php echo $checklist_thumb['url']; ?>" alt="<?php echo $checklist_thumb['alt']; ?>" />	
					</div>
					
				<?php endwhile; ?>

			<?php endif; ?>
	
	</div>


<?php get_footer(); ?>