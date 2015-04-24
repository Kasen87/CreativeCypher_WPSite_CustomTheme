<?php
/**
 * Template Name: landing-page
 *
 *The template used for displaying page content in page.php
 *
 * @package materialwp
 */
?>


<div class="card false-height lg-Container">
    <video src="<?php echo get_stylesheet_directory_uri();?>/videos/CC_Bumper.mov" width="100%" height="100%" autoplay="true">
    </video>
</div>
    
    <!--<div class="card taglineSep"></div>-->
    
   <!-- <div id="primary" class="lg-Container">-->
        <article id="post-<?php the_ID(); ?>" <?php post_class();?>>
    <div class="contentBodyBG">
        <div class="outerContentCont">
            <div class="innerContainer">
                
                <!--This section will be for featured films, newly updated, that stuff! -->
                <!--Create a category 'featured' that we'll pull from to populate this section -->
                
                        <!--<div class="featuredSection">
                            php $catID = get_cat_ID('featured'); 
                            php $args = array(
                                            'parent' => $catID
                                            ); 
                            php 

                        </div>-->
                
                <div class="card PR">
                    <div class="metricsSection">
                            <div class="metricBox">
                                <h1>1.2M</h1>
                                <h3>Viewers a Month</h3>
                            </div>
                            <div class="metricBox">
                                <h1>2M</h1>
                                <h3>Favorites</h3>
                            </div>
                            <div class="metricBox">
                                <h1>300K</h1>
                                <h3>Subscribers</h3>
                            </div>
                            <div class="metricBox">
                                <h1>40K</h1>
                                <h3>Likes Per Week</h3>
                            </div>
                            <div class="metricBox">
                                <h1>120K</h1>
                                <h3>Daily Viewers</h3>
                            </div>
                            <div class="metricBox">
                                <h1>740</h1>
                                <h3>New Talent</h3>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>

                <!-- Social Media Section, feeds from Twitter, Facebook, Instagram @creativeCypher -->
                
                
                <!--Start Populating an array with all of the categories-->
                <?php $catID = get_cat_ID('Shows'); ?>
                <?php $args = array(
                                'parent' => $catID
                            ); ?>

                <?php $categories = get_categories($args); ?>
                
                <?php foreach($categories as $catName): ?>
                  <div class="card PR">
                      <?php echo '<h3 class="showTitle">' . $catName->cat_name . '</h3>'; ?>
                      
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
        </div>
    </div> 
</article><!--End of Article-->
            <!--</div>-->
    </div>