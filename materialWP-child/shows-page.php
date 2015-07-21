<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package materialwp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
    <div class="contentBodyBG">
        <div class="outerContentCont">
            <div class="innerContainer padTopBotBy10">
            <?php $catID = get_cat_ID('shows'); ?>
                <?php $args = array('parent' => $catID); ?>
                <?php $categories = get_categories($args); ?> 
                <div class="fullListing centerMargins">
                    <h3 class="showTitle">ALL SHOWS</h3>
                    <?php foreach($categories as $catName): ?>
                        <a href="<?php echo get_site_url() . '/category/' . get_cat_name($catName->parent) . '/' . $catName->slug; ?>">
                            <div class="card entry-container">
                                <div class="entry-img">    
                                    <img alt="<?php echo $catName->name; ?>" src="<?php echo get_stylesheet_directory_uri(); ?>/images/creations/shows/entry-imgs/<?php echo $catName->slug; ?>.jpg" />

                                </div>
                            <?php

                            $description = category_description($catName->cat_ID);
                            echo '<div class="entry-desc showDesc">';
                            echo '<h3>'.strtoupper($catName->name).'</h3><hr />';
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
            </div>
        </div>
    </div> 
</article><!--End of Article-->

