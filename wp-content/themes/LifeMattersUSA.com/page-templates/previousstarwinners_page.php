<?php
/*
Template Name: Previous Star Winners
*/

get_header(); ?>

	<section class="previous-winners" class="row">
		<h1 class="staffhdr blue"><?php echo get_the_title(); ?></h1>
		  	
			<?php $args = array( 'post_type' => 'care_giver','posts_per_page' => '-1','orderby' => 'title', 'order' => 'ASC', 'tax_query' => array( array(
        'taxonomy'  => 'spotlight_designation',
        'field'     => 'slug',
        'terms'     => array('caregiverspotlight', 'hide'),
        'operator'  => 'NOT IN'))); $cgprevloop = new WP_Query( $args );
        
      if ( $cgprevloop->have_posts() ) : ?>
	        			
				<div class="row">
						 
				 	<?php	while ( $cgprevloop->have_posts() ) : $cgprevloop->the_post();
							
							echo '<div class="col-xs-6 col-sm-4 col-md-3 thmbcol"><div class="staff_thumbnail">';

							echo '<div class="staff-headshot">';
							
							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb' );
							$title = get_the_title();
							echo '<img class="img-responsive" src="' . $image_url[0] . '" alt="Photo of ' . $title . '" />';

							echo '</div>';
			
							echo '<div class="caption"><h3 class="name">' . $title . '</h3>';
							
							$postid = get_the_ID();
							$jobtitle =  get_post_meta($postid, 'enterjobtitle_meta_value_key', 'true');
							echo '<h4 class="title">' . $jobtitle . '</h4>';
							
							//echo '<button class="hrz_btnA blue_bg">Read More</button>';
							
							$content = apply_filters( 'the_content', get_the_content() );
							$content = str_replace( ']]>', ']]&gt;', $content );
							echo '<div class="bio">' . $content . '</div>';
							
							echo '</div></div></div>';
								
						endwhile; ?>
								
				</div>
						
			<?php endif; ?>

	</section>

<!-- Modal -->
<div id="teamModal" class="modal fade" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header"><button class="close" type="button" data-dismiss="modal">×<span class="sr-only">Close</span></button>
<h2 id="teamModalName" class="modal-title"></h2>
<h3 id="teamModalTitle" class="modal-title"></h3>
</div>
<div class="modal-body"></div>
</div>
</div>
</div>

<?php get_footer(); ?>

