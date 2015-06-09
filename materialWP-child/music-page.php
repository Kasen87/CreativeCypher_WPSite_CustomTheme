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
            <?php $catID = get_cat_ID('music'); ?>
                <?php $args = array('parent' => $catID); ?>
                <?php $categories = get_categories($args); ?> 
                <div class="fullListing centerMargins">
                    <h3 class="showTitle">all music</h3>
                    <?php foreach($categories as $catName):
                    $musicArgs = array(
                                'cat' => $catName->cat_ID,
                                'post_type' => 'post',
                                'post_status' => 'publish');
                     $musicPost = new WP_Query($musicArgs);
                     if ($musicPost->have_posts() ) :
                        while ($musicPost->have_posts() ) : $musicPost->the_post(); ?>

                        <a href="<?php the_permalink(); ?>">
                            <div class="card entry-container">
                                <div class="entry-img">    
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php endif; ?>
                                </div>
                            <?php $targetText = 'http';
                                        $description = get_the_content();
                                        $description = explode($targetText, $description);
                                        $descContent = $description[0];
                                        $heroContent = $targetText . $description[1];
                                        $heroContent = apply_filters('the_content', $heroContent);
                                        $descContent = apply_filters('the_content', $descContent);
                                    ?>
                                    <div class="entry-desc">
                                    <h4><?php echo the_title(); ?></h4><hr />
                                        <p><?php echo $descContent; ?></p>
                                    </div>
                            </div> <!-- .entry-container -->

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </a><!-- End of the loop-->
                    <?php wp_reset_postdata(); ?>
                    <?php wp_reset_query(); ?>
                    <?php endforeach; ?>
                </div> <!-- .card -->
            </div>
        </div>
    </div> 
</article><!--End of Article-->

