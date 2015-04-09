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
                    <div class="card PR">
                        <?php $args = array(
                                        'category_name' => 'Press Releases',
                                        'post_type' => 'post',
                                        'post_status' => 'publish'
                        ); ?>

                        <?php $list_of_posts = new WP_Query($args); ?>

                        <?php if( $list_of_posts->have_posts() ) : ?>

                            <?php /* The Loop */ ?>

                            <?php while ( $list_of_posts->have_posts() ) : $list_of_posts->the_post(); ?>
                                <?php //Display content of posts ?>

                        
                                    <div class="card entry-container">
                                        <div class="entry-img">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail(); ?>
                                            <?php endif; ?>
                                        </div>
                                        <header class="entry-header">
                                            <?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
                                        </header><!-- .entry-header -->

                                        <div class="content">
                                            <?php the_content('<h1 class="entry-content">', '</h1>' ); ?>
                                        </div>

                                    </div> <!-- .entry-container -->
                            <?php endwhile; ?>


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

