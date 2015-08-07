<!-- Scratch File For Creative Cypher on 6/02/15 -->

<div class="heroBodyBG">
    <div class="outerContentCont">
        <div class="innerContainer">
            <div class="art-hero">
                <?php the_content(); ?>
            </div>
        </div>

<!--Create the video section where the hero img would usually go -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="card">
        <div class="innerContainer">
		<div class="fullShowDescription">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

			</header><!-- .entry-header -->

			<div class="entry-content">
                <!--We need to find a way to import text before of after the youtube embed section-->
                <p>Information about this particular episode goes here!</p>
				
			</div><!-- .entry-content -->
        </div>
        </div>
    </div> 

<?php elseif (in_category( 'team' ) || post_is_in_descendant_category(get_cat_ID('team'))) : ?>
  
<div class="heroBodyBG">
    <div class="outerContentCont">
        <div class="innerContainer">
            <div class="team-hero">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>

<!--Create the video section where the hero img would usually go -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="card">
        <div class="innerContainer">
		<div class="fullShowDescription">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

			</header><!-- .entry-header -->

			<div class="entry-content">
                <?php the_content(); ?>
			</div><!-- .entry-content -->
        </div>
        </div>
    </div> 
    

 <?php if ( !(in_category( 'team' ) || post_is_in_descendant_category(get_cat_ID('team')))) : ?>
    <!--Recommended/next Shows to watch! -->
    
                <div class="innerContainer">
                
                <!--Start Populating an array with all of the categories-->
                <?php $catID = get_cat_ID('Shows'); ?>
                <?php $args = array(
                                'parent' => $catID
                            ); ?>

                <?php $categories = get_categories($args); ?>
                
                <?php foreach($categories as $catName): ?>
                  <div class="card PR">
                      <?php echo '<a class="showLink" href="' . get_category_link($catName->cat_ID) . '"><h3 class="showTitle">' . $catName->cat_name . '</h3></a>'; ?>
                      
                      <div class="slideContainer">
                            <!-- Start of the inside loop for posts within the show! -->                            
                                <?php $args = array(
                                                'category_name' => $catName->cat_name,
                                                'post_type' => 'post',
                                                'post_status' => 'publish'
                                ); ?>

                                <?php $list_of_posts = new WP_Query($args); ?>

                                <?php if( $list_of_posts->have_posts() ) : ?>

                                    <?php while ( $list_of_posts->have_posts() ) : $list_of_posts->the_post(); ?>
                                        <a href="<?php echo the_permalink(); ?>">
                                        <div class="card entry-container">

                                            <div class="entry-img">
                                                <?php if ( has_post_thumbnail() ) : ?>
                                                    <?php the_post_thumbnail(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div> <!-- .entry-container -->
                                        </a>
                                    <?php endwhile; ?>

                                    <!-- End of the inside loop for posts within the show! -->
                            </div>
                        </div> <!-- .card -->

                            <?php else : ?>
                                <?php get_template_part( 'content', 'none'); ?>
                            <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                    <?php wp_reset_query(); ?>
                    <?php endforeach; ?>

            </div><!--Inner Container-->

<?php endif; ?>



<!-- Content Single.php Section -->
<!-- Members Section -->
<hr class="suggest-sep centerMargins">

<?php $catID = get_cat_ID('team'); ?>
<?php $args = array('parent' => $catID,'number' => 5); ?>
<?php $categories = get_categories($args); ?> 
<div class="singleRow suggest-entry">
    <h3 class="showTitle">Members</h3>
    <?php foreach($categories as $catName): ?>
        <a href="<?php echo get_site_url() . '/category/' . get_cat_name($catName->parent) . '/' . $catName->slug; ?>">
            <div class="card entry-container">
                <div class="entry-img">    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail(); ?>
                    <?php endif; ?>
                </div>
            </div> <!-- .entry-container -->
        </a><!-- End of the loop-->
    <?php wp_reset_postdata(); ?>
    <?php wp_reset_query(); ?>
    <?php endforeach; ?>
</div>


<!-- Header Section Side Menu -->
	<div id="rightSideMenu" class="rightSideMenu">
	 			<?php
		            wp_nav_menu( array(
		                'menu'              => 'primary',
		                'theme_location'    => 'primary',
		                'depth'             => 2,
		                'container'         => false,
		                'menu_class'        => 'rsMenu',
		                'fallback_cb'       => '',
		                'walker'            => '')
		            );
	        	?>       	

	        	</div>


.rightSideMenu{
    position: fixed;
    right: -300px;
    width: 300px;
    background-color: #aaa;
    display: block;
    height: 100%;
    z-index: 9999;
    padding-top: 20px;
    color: #D3BD40;
}

.rsMenu > li{
    list-style: none;
    width: 200px;
    display: block;
    padding-bottom: 20px;
}

.rsMenu > ul{
    list-style: none;
}



.rsMenu > li a {
    list-style: none;
    display: block;
    width: 300px;
    height: 50px;
    left: 0;
    padding-left: 60px;
    margin-left: -60px;
    vertical-align: middle;

}

.rsMenu > a{
    list-style: none;
    display: block;
    margin-left: -50px;
}
.rsMenu > li a:hover {
    background-color: #D3BD40;
}

<!-- End of Side Menu Section -->


<!--About Us Section to Add in later -->
<div class="visbox">
        <div class="visstate">
        <h1>The Seven Gems</h1>
            <h3>#CYPHERLIVE</h3>
            <h3>THE INTENSIVE</h3>
            <h3>THE FILM HACK-A-THON</h3>
            <h3>THE GALLERY</h3>
            <h3>THE FILM FEAST</h3>
            <h3>THE PRIVATE SCREENING</h3>
            </div>
            </div>


    <div class="visbox">
      <div class="visstate">
        <h1 style="padding-bottom: 20px;">The Formula</h1>
        <h4 style="text-decoration: underline">Artist Community</h3>
        <p style="padding-bottom: 15px;">A live and digital community, safe for members to share & pitch ideas, plus youth mentoring programs and exclusive invites to VIP events.
        </p>
        <h4 style="text-decoration: underline">Development</h3>
        <p style="padding-bottom: 15px;">Counseling, coverage, table reads, staged readings, PR, and marketing plans.
        </p>
        <h4 style="text-decoration: underline">Production</h3>
        <p style="padding-bottom: 15px;">Access to production teams, strategists, and trade discounts (rentals).
        </p>
        <h4 style="text-decoration: underline">Distribution & Exhibition</h3>
        <p style="padding-bottom: 15px;">Access to a network of aggregators to showcase your brand and monetize content (Digital development, publicists, social media/marketing strategists, web designers, graphic artists, tech support, analytics, and event hosting).
        </p>
      </div>
     </div>
     
     
<!--End of About Us Section to add in -->            

<!-- Team Page Original Sections -->
<?php foreach($categories as $catName): ?>
                  <div class="card partnersAllMod">
                      <?php echo '<h3 class="showTitle">' . $catName->cat_name . '</h3>'; ?>
                      
                      <div class="slideContainer member">
                        

                            <!-- Start of the inside loop for posts within the show! -->                            
                                <?php $args = array(
                                                'category_name' => $catName->cat_name,
                                                'post_type' => 'post',
                                                'post_status' => 'publish'
                                ); ?>

                                <?php $list_of_posts = new WP_Query($args); ?>

                                <?php if( $list_of_posts->have_posts() ) : ?>

                                    <?php while ( $list_of_posts->have_posts() ) : $list_of_posts->the_post(); ?>
                                        <a href="<?php echo the_permalink(); ?>">
                                        <div class="card entry-container memberCard">

                                            <div class="entry-img">
                                                <?php if ( has_post_thumbnail() ) : ?>
                                                    <?php the_post_thumbnail(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div> <!-- .entry-container -->
                                        </a>
                                    <?php endwhile; ?>

                                    <!-- End of the inside loop for posts within the show! -->
                            </div>

                        </div> <!-- .card -->

                            <?php else : ?>
                                <!--php get_template_part( 'content', 'none'); ?>-->
                            <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                    <?php wp_reset_query(); ?>
                    <?php endforeach; ?>

<!-- End of Team-Page Section -->