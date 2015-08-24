<?php 
$args = array(
    'tag' => 'featured',
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 7
);

$list_of_posts = new WP_Query($args); ?>

<div class="card featuredSection">
    <h4>RECENT HAPPENINGS</h4>
        <div class="featuredContainer padTopBotBy10">
                        
        <?php if( $list_of_posts->have_posts() ) : ?>
            <?php $c = 0; ?>
            <?php while ( $list_of_posts->have_posts() ) : $list_of_posts->the_post(); ?>
            <?php $class = ''; ?>
            <?php $c++; ?>
                

            <?php if ($c == 1){
                  $class .= 'primaryFeatured'; 
                }; 
                //if ($c == 2){
                    //echo '<div class="card entry-container adSpace"></div>';
                //}; ?><!--Check to see if there is an adblocker in place first -->
                <a href="<?php echo the_permalink(); ?>">
                <div class="card entry-container <?php echo $class; ?>">

                    <div class="entry-img">
                        <?php 
                        if ( has_post_thumbnail() )
                            the_post_thumbnail();
                        ?>
                    </div>
                    <?php 
                    $targetText = 'http';
                    $description = get_the_content();                   //pull the content from the post
                    $description = explode($targetText, $description);  //Break it at the target delimiter (http)
                    $blurbContent = $description[0];                    //Store the part before it in the first array element
                    $description = apply_filters('the_content', $blurbContent); //Apply the wordpress "content" filter to that result

                    $featCategory = get_the_category();
                    echo '<div class="entry-desc">';    //Start the class
                    if( ! empty( $featCategory) ){
                        if($featCategory[0] == 'Uncategorized'){
                        echo '<h4>'.strtoupper($featCategory[1]->name).'</h4>';
                        }
                    }
                    echo '<h3>'.strtoupper(get_the_title()).'</h3>';  //Grab the title of the post and make it uppercase

                    echo '<hr />';
                    if ($description != ''){            //If there's a description then...
                        echo $description;
                    } else {

                    }
                    echo '</div>';  //End the entry-desc div earlier
                    ?>
                </div> <!-- .entry-container -->
                </a>
            <?php endwhile; ?>
            <?php unset($c); ?>
            <!-- End of the inside loop for posts within the show! -->
            <div class="clearBoth"></div>
    </div>
  <!-- .card FeaturedSection end div back in the landing page code -->


        <?php else : ?>
            <?php get_template_part( 'content', 'none'); ?>
        <?php endif; ?>

<?php wp_reset_postdata(); ?>
<?php wp_reset_query(); ?>
