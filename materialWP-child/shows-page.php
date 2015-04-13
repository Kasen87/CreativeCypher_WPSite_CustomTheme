<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package materialwp
 */
?>

<div class="heroBodyBG">
    <div class="outerContentCont">
        <div class="half-hero">
        
        </div>
    </div>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
    <div class="contentBodyBG">
        <div class="outerContentCont">
            <div class="innerContainer">
                
                <!--Start Populating an array with all of the categories-->
                <?php $catID = get_cat_ID('Shows'); ?>
                <?php $args = array(
                                'parent' => $catID
                            ); ?>

                <?php $categories = get_categories($args); ?>
                
                <?php foreach($categories as $catName): ?>
                  <div class="card PR">
                    <?php echo '<h3 class="showTitle">' . $catName->cat_name . '</h3>'; ?>
                      
                        <!-- Start of the inside loop for posts within the show! -->                            
                            <?php $args = array(
                                            'category_name' => $catName->cat_name,
                                            'post_type' => 'post',
                                            'post_status' => 'publish'
                            ); ?>
                        
                            <?php $list_of_posts = new WP_Query($args); ?>
                        
                            <?php if( $list_of_posts->have_posts() ) : ?>
                      
                                <?php while ( $list_of_posts->have_posts() ) : $list_of_posts->the_post(); ?>
                                    <a href="<?php echo the_permalink(); ?>">
                                    <div class="card entry-container">
                                        
                                        <div class="entry-img">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail(); ?>
                                            <?php endif; ?>
                                        </div>
    <!--                                    <header class="entry-header">
                                            <? /*php the_title( '<h3 class="entry-title">', '</h3>' ); */?>
                                        </header> .entry-header 

                                        <div class="content">
                                            <? /*php the_content('<h1 class="entry-content">', '</h1>' ); */?>
                                        </div>-->
                                    </div> <!-- .entry-container -->
                                    </a>
                                <?php endwhile; ?>

                                <!-- End of the inside loop for posts within the show! -->

                    </div> <!-- .card -->
                    
                            <?php else : ?>
                                <?php get_template_part( 'content', 'none'); ?>
                            <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                    <?php wp_reset_query(); ?>
                    <?php endforeach; ?>

            </div><!--Inner Container-->
        </div>
    </div> 
</article><!--End of Article-->

