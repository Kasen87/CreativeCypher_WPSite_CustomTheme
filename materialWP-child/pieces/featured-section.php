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
                        'posts_per_page' => 10
        ); ?>

        <?php $list_of_posts = new WP_Query($args); ?>
    
        <div class="featuredContainer padLowerX10">
                        
        <?php if( $list_of_posts->have_posts() ) : ?>
            <?php $c = 0; ?>
            <?php while ( $list_of_posts->have_posts() ) : $list_of_posts->the_post(); ?>
            <?php $class = ''; ?>
            <?php $c++;
                if ($c == 1) $class .= 'primaryFeatured';
                if ($c == 2) : ?>
                    <div class="card entry-container adSpace">
                            
                    </div>
                <?php endif; ?>
                <a href="<?php echo the_permalink(); ?>">
                <div class="card entry-container <?php echo $class; ?>">

                    <div class="entry-img">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail(); ?>
                        <?php endif; ?>
                    </div>
                </div> <!-- .entry-container -->
                </a>
            <?php endwhile; ?>
            <!-- End of the inside loop for posts within the show! -->
            <div class="clearBoth"></div>
    </div>
 </div> <!-- .card -->


        <?php else : ?>
            <?php get_template_part( 'content', 'none'); ?>
        <?php endif; ?>

<?php wp_reset_postdata(); ?>
<?php wp_reset_query(); ?>
