<?php

while ( have_posts() ) : the_post();

	if( get_field('add_section') )  {
	
		while( has_sub_field('add_section') ) {
			
			$indv_sec = get_sub_field('indv_section');
			
			while( have_rows('indv_section') ): the_row(); 
	
			$sec_imgurl = get_sub_field('section_img');
			$sec_imgtop = get_sub_field('section_img_totop');
			$sec_hdr = get_sub_field('section_hdr');
			$sec_link = get_sub_field('section_lnk_nm');
			$sec_body = get_sub_field('section_body');?>
			
			<div id="<?php echo $sec_link; ?>" name="<?php echo $sec_link; ?>" <?php if($sec_imgurl){?> class="container-sp hidden-xs" style="background-image: url(<?php echo $sec_imgurl; ?>); background-position: center <?php echo $sec_imgtop.'px'; ?>;" <?php } ?>></div>
				<h1 class="sec_hdr blue"><?php echo $sec_hdr; ?></h1>
				<span class="sec_body"><?php echo $sec_body; ?></span>
	
			<?php endwhile;
	}
}
endwhile; ?>