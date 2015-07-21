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
            <div class="innerContainer">
    
                
                <!--Start Populating an array with all of the categories-->
                  <div class="card centerMargins padTopBotBy10">
                      <!-- Start of the inside loop for posts within the show! -->                            
                            <?php $args = array(
                                    'category_name' => 'blog',
                                    'post_type' => 'post',
                                    'post_status' => 'publish'
                            ); ?>

                            <?php $list_of_posts = new WP_Query($args); ?>

                            <?php if( $list_of_posts->have_posts() ) : ?>

                                    <?php while ( $list_of_posts->have_posts() ) : $list_of_posts->the_post(); ?>
                                            
                                        <div class="card centerMargins blogStyle">
                                            <h2><?php echo strtoupper( get_the_title() ); ?></h2>
                                            <h5>BY: <?php echo strtoupper( get_the_author()); ?> ON <?php echo strtoupper(get_the_date()); ?></h5><hr>

                                            <div class="blogContent">
                                            <a href="<?php echo the_permalink(); ?>">
                                                <div class="centerMargins">
                                                </div>
                                            </a>
                                                <?php the_content(); ?>
                                                <div class="clearBoth"></div>
                                            </div>
                                        </div> <!-- .entry-container -->

                                    <?php endwhile; ?>

                                    <!-- End of the inside loop for posts within the show! -->
                            </div>
                        </div> <!-- .card -->

                            <?php else : ?>
                                <?php get_template_part( 'content', 'none'); ?>
                            <?php endif; ?>
 
                    <?php wp_reset_postdata(); ?>
                    <?php wp_reset_query(); ?>
            </div><!--Inner Container-->
        </div>
    </div> 
</article><!--End of Article-->

