<?php get_header(); ?>

<div id="primary_jobdetails" class="container page-content">
	<div class="row" role="main">
		<div id="content" class="col-lg-12">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php get_template_part( 'content', 'job' ); ?>
				
			<?php endwhile; ?>

		</div>
	</div>
</div>

<!-- Modal -->
<div id="sonetoModal" class="modal fade" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header"><button class="close" type="button" data-dismiss="modal">×<span class="sr-only">Close</span></button>
<h2 id="sonetoModalName" class="modal-title">Tell us about yourself</h2></div>
<div class="modal-body"><iframe id="soneto" src="https://lifematters.soneto.net/Portal/Portal/Caregiver/Inquiry/Create?branchID=3" width="100%" height="500" frameborder="0" sandbox="allow-forms" seamless="seamless"></iframe></div>
</div>
</div>
</div>

<?php get_footer(); ?>