<div class="card PR">
    <?php echo '<a class="showLink" href="' . get_category_link($catName->cat_ID) . '"><h3 class="showTitle">' . $catName->cat_name . '</h3></a>'; ?>
    
    <!-- Start of the inside loop for posts within the show! -->                            
        <?php $args = array(
                        'category_name' => $catName->cat_name,
                        'post_type' => 'post',
                        'post_status' => 'publish'
        ); ?>

        <?php $list_of_posts = new WP_Query($args); ?>
    
        <div class="slideContainer" <?php echo 'width="' . $list_of_posts->post_count*250 . 'px"'; ?>> <!--Works to create width properly, but doesn't effect the div the way I'd like to-->
                        
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
