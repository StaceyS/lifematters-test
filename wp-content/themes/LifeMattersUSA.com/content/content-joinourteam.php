<div id="joblist" class="row">
	<a id="currentopenings" class="anchor"></a>
	<ul>

	<?php $args = array( 'post_type' => 'job_listing', 'posts_per_page' => -1 );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		
	 $parent_title = get_the_title( $post->post_parent );
	
	 echo '<li><a href="' . get_permalink( $post->post_parent ) . '" title="' . $parent_title . '">' . $parent_title . '</a></li>';
	endwhile;?>
</ul></div>
	
<div class="row">
	<div class="col-lg-12"><a href="http://lifemattersusa.applicantpro.com/jobs/"><button type="button" class="hrz_btnA blue_bg applyjob" class="hrz_btnA blue_bg applyjob">Apply Now!</button></a></div>
</div>


<!-- Modals -->
<div id="sonetoModal" class="modal fade" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header"><button class="close" type="button" data-dismiss="modal">×<span class="sr-only">Close</span></button>
<h2 id="sonetoModalName" class="modal-title">Tell us about yourself</h2></div>
<div class="modal-body"><iframe id="soneto" src="https://lifematters.soneto.net/Portal/Portal/Caregiver/Inquiry/Create?branchID=3" width="100%" height="500" frameborder="0" sandbox="allow-forms" seamless="seamless"></iframe></div>
</div>
</div>
</div>


<div id="joinModal" class="modal fade" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header"><button class="close" type="button" data-dismiss="modal">×<span class="sr-only">Close</span></button>
<h2 id="joinModalName" class="modal-title">Application Requirements</h2></div>
<div class="modal-body"><p><strong>Preferred Experience:</strong> 1 year of clinical experience</p>
					<p><strong>Required Documentation:</strong> You must bring the original and one copy of the following. (Please note, each document must be copied on a separate page.)</p>
					<ol><li>CNA, GNA , LPN, RN License (you MUST print your own license from one of these sites)
					<ul><li><a href="http://209.60.234.65/mdbon_weblookup/" target="_blank">Click for MD website</a></li>
					<li><a href="https://secure01.virginiainteractive.org/dhp/cgi-bin/search_publicdb.cgi" target="_blank">Click for VA website</a></li>
					<li><a href="https://www.asisvcs.com/services/registry/search_generic.asp?CPCat=0709NURSE" target="_blank">Click fo DC CNA website</a></li>
					<li><a href="http://app.hpla.doh.dc.gov/weblookup" target="_blank">Click for DC LPN/RN website</a></li></ul></li>
					<li>Documents to certify your legal right to work in the United States</li>
					<ul><li>Permanent Resident Card with Social Security Card</li>
					<li>US passport with Social Security Card</li>
					<li>Driver’s License with Social Security Card</li></ul></li>
					<li>Drivers License or State Photo ID</li>
					<li>Current CPR I.D.</li>
					<li>Current 2 STEPS PPD or Chest X-ray (<a href="http://www.google.com/url?q=http%3A%2F%2Fwww.currytbcenter.ucsf.edu%2Fabouttb%2Ftbcontrol_faqs%2F2_how_is_two_step_tst_done.pdf&sa=D&sntz=1&usg=AFQjCNGxSZX8DihB55wNAq1JRvZnqP9wIw" target="_blank">click here</a> for details on the 2 step PPD process)</li>
					<li>Current Pre- Employment Medical/Physical Examination</li>
					<li>Hepatitis-B Vaccine Record or Sign a declination form </li>
					<li>National Background check (Lifematters can run this for you for a $33.50 processing fee)</li>
					<li>Current Auto Insurance Documentation (if you drive)</li>
					<li>2 Employment Reference and 2 Personal References (with complete contact information)</li></ol>
					<strong>If you have all of the above documents, please apply for one of our open positions.</strong>
					<p>Along with the written application, you will have to take and pass an in-person exam and interview process. <a href="http://lifematters.digitalhealthstrategies.com/contact-us">Contact Us</a> if you have any questions.</p></div>
</div>
</div>
</div>