<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package materialwp
 */
?>

<?php get_template_part('pieces/hero', 'generic'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
    <div class="contentBodyBG">
        <div class="outerContentCont">
            <div class="innerContainer padLowerX10">
                
                <!--Need to place a featured section in here-->
                <?php get_template_part('pieces/featured', 'section'); ?>                
                    <a href=""><div class="showMore centerMargins">
                        <h4 class="vertical-align">Show More</h4>
                    </div></a>
                <!--Start Populating an array with all of the categories-->
                <?php $catID = get_cat_ID('shows'); ?>
                <?php $args = array(
                                'parent' => $catID,
                                'number' => 1
                            ); ?>
                <?php $categories = get_categories($args); ?> 
                
                <?php foreach($categories as $catName): ?>
                    <?php set_query_var('catName', $catName); ?>
                    <?php get_template_part('pieces/single', 'row'); ?>
                    <?php wp_reset_postdata(); ?>
                    <?php wp_reset_query(); ?>
                <?php endforeach; ?>
            </div><!--Inner Container-->
        </div>
    </div> 
</article><!--End of Article-->

