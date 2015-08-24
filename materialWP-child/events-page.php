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

		<div class="leftColumn border1">
			<div class="lcContent">
				<h1>recent event</h1>
				<div class="card recentSection">
				  	<iframe width="560" height="315" src="https://www.youtube.com/embed/zh6q04X-p1g" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="upcomingSection">
					<h1>upcoming events</h1>
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
										echo '<h2>'.the_title().'</h2><hr />';
										//echo '<h3>Date: '.get_field("Date").'    Time: '.get_field("Time").'</h3>';
									echo '</div>';
									
									if (the_post_thumbnail()){
										echo '<div class="eventImage">';
											the_post_thumbnail();
									}else{
										echo '<div class="defaultImage">';
									}
									echo '</div>';
								echo '</div>';




																}
						}else{
							echo '<h3 class="card">keep checking back!</h3>';
						}
					?>
				</div><!--end of upcoming section-->
			</div>
		</div>

		<div class="rightColumn border2">
			<div class="rcContent">
				<h1>past events</h1>
				<div class="card pastSection">
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