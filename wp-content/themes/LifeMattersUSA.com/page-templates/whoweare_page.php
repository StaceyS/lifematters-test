<?php
/*
Template Name: Who We Are
*/

get_header(); ?>

<div id="primary_whoweare" class="our-team">
	
		<h1 class="staffhdr blue">Our Team</h1>
		<?php $args = array( 'post_type' => 'staff_mbr','posts_per_page' => '-1','orderby' => 'title', 'order' => 'ASC' );
			$loop = new WP_Query( $args );
			$terms = get_terms( 'grouping' );
			$anchornum = 0;
			
				foreach ( $terms as $term ) {
					
					echo '<div class="row"><div class="col-lg-12"><h2 class="staffhdr"><a id="' . $anchornum++ . '" class="anchor"></a>' . $term->name . '</h2></div>';
					
					$posts = get_posts(array('post_type' => 'post'));
				
					while ( $loop->have_posts() ) : $loop->the_post();
					
						if( has_term( $term->name , 'grouping' ) ) {
						
							echo '<div class="col-xs-6 col-sm-4 col-md-3 thmbcol"><div class="staff_thumbnail">';

							echo '<div class="staff-headshot">';
							
							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
							$title = get_the_title();
							echo '<img class="img-responsive" src="' . $image_url[0] . '" alt="Photo of ' . $title . '" />';

							echo '</div>';
			
							echo '<div class="caption"><h3 class="name">' . $title . '</h3>';
							
							$postid = get_the_ID();
							$jobtitle =  get_post_meta($postid, 'staffjobtitle', 'true');
							echo '<h4 class="title">' . $jobtitle . '</h4>';

							// Get the url for individual bio pages
							$bio_link = get_permalink();

							//echo $bio_link;
							echo '<a href="'. $bio_link .'" class="sm-link">Read Bio</a>';
							//echo '<button class="sm-link">Read More</button>';
							
							$content = apply_filters( 'the_content', get_the_content() );
							$content = str_replace( ']]>', ']]&gt;', $content );
							echo '<div class="bio">' . $content . '</div>';
							
							echo '</div></div></div>';
						}
						
					endwhile;
					
					echo '</div>';
				}
		 ?>
		 
 			<h2 id="caregiverspotlight" class="staffhdr">Caregiver Spotlight: LifematterSTAR Awards</h2>
		 <p>We are pleased and proud to introduce a few of our caregivers who have been identified by their supervisors, clients, and clients’ family members as consistently providing exemplary service and showing strong dedication. Always reliable, professional and compassionate, these LifematterSTARs are wonderful examples of the Lifematters Difference.</p>
		 
				 <?php $args = array( 'post_type' => 'care_giver','posts_per_page' => '-1','orderby' => 'title', 'order' => 'ASC', 'spotlight_designation' => 'caregiverspotlight' ); $loop = new WP_Query( $args );
				 
				 		while ( $loop->have_posts() ) : $loop->the_post();
							
							echo '<div class="col-xs-6 col-sm-4 col-md-3 thmbcol"><div class="staff_thumbnail">';

							echo '<div class="staff-headshot">';
							
							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
							$title = get_the_title();
							echo '<img class="img-responsive" src="' . $image_url[0] . '" alt="Photo of ' . $title . '" />';

							echo '</div>';

							echo '<div class="caption"><h3 class="name">' . $title . '</h3>';
							
							$postid = get_the_ID();
							$jobtitle =  get_post_meta($postid, 'enterjobtitle_meta_value_key', 'true'); // Should be staffjobtitle

							if ($jobtitle) {
								echo '<h4 class="title">' . $jobtitle . '</h4>';
							}
							
							//echo '<button class="sm-link">Read More</button>';
							
							$content = apply_filters( 'the_content', get_the_content() );
							$content = str_replace( ']]>', ']]&gt;', $content );

							if ($content) {
								echo '<div class="bio">' . $content . '</div>';
							}
							
							echo '</div></div></div>';
								
						endwhile; ?>	
		  </div>
				 
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

