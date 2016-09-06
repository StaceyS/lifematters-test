<?php get_header(); ?>


<!-- GIT TEST  -->
<div id="primary_blog" class="container page-content blog-content">
	<div class="row" role="main">
		<div id="content" class="col-sm-8 col-md-9">

		<?php
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>
					
				<div class="media">
					<a class="pull-left" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php if ( has_post_thumbnail() ) {the_post_thumbnail('thumbnail',  array( 'class' => 'media-object img-circle' )); ?>
				  <?php } else { ?>
				  		<img class="media-object img-circle orng_bg" src="http://lifemattersusa.com/wp-content/themes/LifeMattersUSA.com/library/img/icons/blog.svg" alt="Icon" width="150" height="auto"/>
				  <?php } ?>
				  </a>
				 
				  <div class="media-body">
				    <?php get_template_part( 'content/content', get_post_format() ); ?>
				  </div>
				</div>

				<?php endwhile;

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content/content', 'none' );

			endif;
		?>

		</div>
	
		<div id="sidebar-col" class="col-sm-4 col-md-3">
		<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
