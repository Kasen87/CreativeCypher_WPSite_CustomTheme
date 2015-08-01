<?php 
$args = array(
    'tag_in' => array('featured'),
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 7
);

$list_of_posts = new WP_Query($args); ?>

<div class="card featuredSection">
    <h4>FEATURED CREATIONS</h4>
        <div class="featuredContainer padTopBotBy10">
                        
        <?php if( $list_of_posts->have_posts() ) : ?>
            <?php $c = 0; ?>
            <?php while ( $list_of_posts->have_posts() ) : $list_of_posts->the_post(); ?>
            <?php $class = ''; ?>
            <?php $c++; ?>
                

            <?php if ($c == 1){
                  $class .= 'primaryFeatured'; 
                }; 
                if ($c == 2){
                    echo '<div class="card entry-container adSpace"></div>';
                }; ?><!--Check to see if there is an adblocker in place first -->
                <a href="<?php echo the_permalink(); ?>">
                <div class="card entry-container <?php echo $class; ?>">

                    <div class="entry-img">
                        <?php //if ( has_post_thumbnail() ) : ?>
                            <?php //the_post_thumbnail(); ?>
                        <?php //endif; ?>
                    </div>
                    <?php //$targetText = '[ext]';
                    $description = get_the_content();
                    //$description = explode($targetText, $description);
                    //$blurbContent = $description[0];
                    //$heroContent = $targetText . $description[1];
                    //$heroContent = apply_filters('the_content', $heroContent);
                    $description = apply_filters('the_content', $description);

                    if ($description != ''){
                        echo '<div class="entry-desc">';
                        echo '<h3>'.strtoupper(get_the_title()).'</h3><hr />';
                        echo $description;
                        echo '</div>';
                    } else {

                    }?>
                </div> <!-- .entry-container -->
                </a>
            <?php endwhile; ?>
            <?php unset($c); ?>
            <!-- End of the inside loop for posts within the show! -->
            <div class="clearBoth"></div>
    </div>
 </div> <!-- .card -->


        <?php else : ?>
            <?php get_template_part( 'content', 'none'); ?>
        <?php endif; ?>

<?php wp_reset_postdata(); ?>
<?php wp_reset_query(); ?>
