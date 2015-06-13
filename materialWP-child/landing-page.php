<?php
/**
 * Template Name: landing-page
 *
 *The template used for displaying page content in page.php
 *
 * @package materialwp
 */
?>
<!--Hero Section-->
<div class="landingHero">
    <div class="fullViewport">
        <video src="<?php echo get_stylesheet_directory_uri(); ?>/videos/CC_Bumper_Static_Web.mp4" width="100%" height="100%" autoplay="true">
        </video>
    </div>
</div>
<!--End Hero Section -->
<!--Lower Content Section-->
<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
    <div class="contentBodyBG">
        <div class="outerContentCont">
            <div class="innerContainer padTopBotBy10">
                <div class="card metricCard centerMargins">
                    <div class="metricsSection">
                            <div class="metricBox">
                                <h1>1.2M</h1>
                                <h3>Monthly Views</h3>
                            </div>
                            <div class="metricBox">
                                <h1>2M</h1>
                                <h3>Favorites</h3>
                            </div>
                            <div class="metricBox">
                                <h1>30K</h1>
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
                <?php get_template_part('pieces/featured', 'section'); ?>
                <!-- Social Media Section, feeds from Twitter, Facebook, Instagram @creativeCypher -->
                <a href="<?php echo get_site_url(); ?>/creations/shows"> <!--Dirty Hardcode, I know... >.< -->
                    <div class="showMore centerMargins">
                        <h4 class="vertical-align">show more</h4>
                    </div>
                </a>
                <!--Start Populating an array with all of the categories-->
                <?php $catID = get_cat_ID('shows'); ?>
                <?php $args = array('parent' => $catID,'number' => 4); ?>
                <?php $categories = get_categories($args); ?> 
                <div class="singleRow">
                    <h3 class="showTitle">more shows</h3>
                    <?php foreach($categories as $catName): ?>
                        <a href="<?php echo get_site_url() . '/category/' . get_cat_name($catName->parent) . '/' . $catName->slug; ?>">
                            <div class="card entry-container">
                                <div class="entry-img">    
                                    <img alt="<?php echo $catName->name; ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/images/creations/shows/entry-imgs/<?php echo $catName->slug; ?>.jpg" />
                                </div>
                            <?php

                            $description = category_description($catName->cat_ID);
                            echo '<div class="entry-desc">';
                            echo '<h3>'.strtolower($catName->name).'</h3><hr />';
                            if ($description != ''){                                
                                echo '<p>'.$description.'</p>';
                                
                            };
                            echo '</div>';

                             ?>
                            </div> <!-- .entry-container -->
                        </a><!-- End of the loop-->
                    <?php wp_reset_postdata(); ?>
                    <?php wp_reset_query(); ?>
                    <?php endforeach; ?>
                </div> <!-- .card -->
            </div><!--End of Inner Container-->
        </div><!--End of OuterContentCont-->
    </div><!--End of ContentBodyBG-->
</article><!--End of Article-->
            <!--</div>-->
    </div>