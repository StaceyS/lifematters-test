<!-- Code for events only -->

	<?php if ( function_exists( 'tribe_get_events' ) ) {
				
		/*
		if(tribe_is_upcoming() || tribe_is_event() ||){
					
				}
		*/
		
		if( tribe_is_month() || tribe_is_day() || tribe_is_past() || tribe_is_upcoming() || tribe_is_event() ||  tribe_is_venue() || get_post_type() == 'tribe_organizer' ) { ?>
			
			</div></div></div>
			
	<?php	}	} ?>
	<!-- Code for events only end -->


  <footer class="footer row" id="ftr_nav">
		<?php 
		wp_nav_menu( array(
	    'menu' => 'Footer Site Map',
	    'menu_class' => 'footer_nav col-lg-12 clearfix'
				) );
	 	?>

		<div class="row ftr_legal">				
			<p>&copy; <?php echo date('Y'); ?> Lifematters Virginia License # - HCO-12375 :: District of Columbia License # - NSA-0138 :: Maryland License # - R3022 :: Licensed as a Residential Service Agency by the Maryland Department of Health and Mental Hygiene, Office of Health Care Quality
			</p>
		</div>
	</footer>
  
  <?php wp_footer(); ?>

	<!-- Google Analytics - Moved to header 7/13 per DHS request. (Remove this eventually.)
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-15280566-1', 'auto');
	ga('send', 'pageview');

	</script>
	End Google Analytics -->

</body>
</html>