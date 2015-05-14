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
            <div class="innerContainer padTopBotBy10">
            <?php $catID = get_cat_ID('shows'); ?>
                <?php $args = array('parent' => $catID); ?>
                <?php $categories = get_categories($args); ?> 
                <div class="fullListing centerMargins">
                    <h3 class="showTitle">All Shows</h3>
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
                </div> <!-- .card -->
            </div>
        </div>
    </div> 
</article><!--End of Article-->

