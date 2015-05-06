<?php $catID = get_cat_ID('featured');
    $args = array('parent' => $catID);
    $categories = get_categories($args); ?>

<div class="card featuredSection">
    <h3>Featured Creations</h3>
    
    <!-- Start of the inside loop for posts within the show! -->                            
        <?php $args = array(
                        'category_name' => $catName->cat_name,
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 8
        ); ?>

        <?php $list_of_posts = new WP_Query($args); ?>
    
        <div class="featuredContainer">
                        
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
