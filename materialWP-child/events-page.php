<?php
/**
 * Template Name: landing-page
 *
 *The template used for displaying page content in page.php
 *
 * @package materialwp
 */
?>
<div class="outerContentCont">
	<div class="innerContainer">

		<div class="leftColumn">
			<div class="lcContent">
				<h1>RECENT EVENT</h1>
				<div class="card recentSection">
				  	<iframe width="560" height="315" src="<?php echo get_field('External Video Link'); ?>" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="upcomingSection">
					<h1>UPCOMING EVENTS</h1>
					<!--Populate this section by posts-->
					<?php 
						$upcomingArgs = array(
										'category_name' => 'Events',
										'tag' => 'upcoming-event',
	    							'post_type' => 'post',
	    							'post_status' => 'publish',
	    							'posts_per_page' => -1
	    								);

						$upcomingPosts = new WP_Query($upcomingArgs);

						if( $upcomingPosts->have_posts() ){
							while ( $upcomingPosts->have_posts() ){
								$upcomingPosts->the_post();
									
								echo '<div class="card upcomingEvent">';
									echo '<div class="eventContent">';
										echo '<h3 class="upcomingTitle">'.strtoupper(get_the_title()).'</h3><hr />';
										echo '<h5 class="subtitle">DATE: '.strtoupper(get_field("Date")).' &nbsp&nbsp&nbsp&nbsp TIME: '.strtoupper(get_field("Time")).'</h5>';
										echo '<h5 class="subtitle">WHERE: '.strtoupper(get_field("Location")).'</h5>';								
										if ( get_the_content()){
											echo '<p>'.get_the_content().'</p>';
										}else{
											echo '<p>Here\'s some example content   bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbccccccccccccccccccccccccc ccccccccccccccc </p>';
										}

									echo '</div>';
									
									if ( get_the_post_thumbnail()){
										echo '<div class="eventImage">';
											the_post_thumbnail();
									}else{
										echo '<div class="defaultImage">';
									}

									echo '<a href="'.get_field('RSVP Link').'" target="_blank"><div class="rsvpBtn"><h3>RSVP</h3></div></a>';
									echo '</div>';
								echo '</div>';
							} //end of while loop
						}else{
							echo '<h3 class="card padding10">keep checking back!</h3>';
						}
					
								wp_reset_postdata();
  		          wp_reset_query();
             	?>
				</div><!--end of upcoming section-->
			</div>
		</div>

		<div class="rightColumn">
			<div class="rcContent">
				<h1>PAST EVENTS</h1>
				<div class="pastSection">
					<?php 
						$pastArgs = array(
										'category_name' => 'Events',
										'tag' => 'past-event',
	    								'post_type' => 'post',
	    								'post_status' => 'publish',
	    								'posts_per_page' => -1
	    								);

						$pastEvents = new WP_Query($pastArgs);
						
						if( $pastEvents->have_posts() ){
							while ( $pastEvents->have_posts() ){
								$pastEvents->the_post();

								echo '<div class="card pastEvent">';
								echo '<iframe width="160" height="90" src="'.get_field("External Video Link").'" frameborder="0" allowfullscreen></iframe>';
								echo '</div>';	
							}
						}else{

						}
					?>
				</div>
			</div>
		</div>
		
	</div>
</div><!-- End of Lower Content Container -->

<!-- <div class="upperEvents">
			
			<h1 class="border2">recent event</h1>
			<h1 class="border1">previous events</h1>
		    
		    <div class="card leftColumn50">
  			    	<iframe width="560" height="315" src="https://www.youtube.com/embed/zh6q04X-p1g" frameborder="0" allowfullscreen></iframe>
    		</div>

    		
    		<div class="rightColumn50 border1">This is where recent events category should populate
				<div class="card">
					<h2>Hey There</h2>
				</div>
    		</div>End of teh recent events category
		</div>
	</div>
</div>End of Upper Content Container
<div class="outerContentCont">
	<div class="innerContainer">
		<div class="lowerEvents">
			<h1>upcoming events</h1>
			<div class="card leftColumn50">
				This is where we'll populate "upcoming events"
			</div>
		</div> -->