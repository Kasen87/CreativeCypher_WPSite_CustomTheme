<?php
/**
 * @package materialwp
 */
?>

<!--Create the if then structure in PHP here-->
<!--If the content being shown is a child of "shows" and "show-name-here" then create a hero section that is the embedded video-->
<!--Else if the display is the child of the "Team" category, then create a the layout Keith Created for the page-->
                <!--This would ideally not send you to another page, troy wants a drop down section that covers the current page instead of sending you to another one-->
<!--Else display the normal post style, which needs to be modified a bit to fit with Creative Cyphers Styles -->

<!--Big things to keep in mind, for most of the single page content, remove the arrows at the bottom that goes to the next post. Try to utilize the same css selectors here as well -->

<!--We'll want to create seperate segments in php for later use! -->




<?php if (in_category( 'shows' ) || post_is_in_descendant_category(get_cat_ID('shows'))) : ?>

<div class="heroBodyBG">
    <div class="outerContentCont">
        <div class="video-hero">
            <?php the_content(); ?>
        </div>    

<!--Create the video section where the hero img would usually go -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="card">
        <div class="innerContainer">
		<div class="fullShowDescription">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

			</header><!-- .entry-header -->

			<div class="entry-content">
                <!--We need to find a way to import text before of after the youtube embed section-->
                <p>Information about this particular episode goes here!</p>
				
			</div><!-- .entry-content -->
        </div>
        </div>
    </div>
<?php elseif (in_category( 'films' ) || post_is_in_descendant_category(get_cat_ID('films'))) : ?>
  
<div class="heroBodyBG">
    <div class="outerContentCont">
        <div class="video-hero">
            <?php the_content(); ?>
        </div>    

<!--Create the video section where the hero img would usually go -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="card">
        <div class="innerContainer">
		<div class="fullShowDescription">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

			</header><!-- .entry-header -->

			<div class="entry-content">
                <!--We need to find a way to import text before of after the youtube embed section-->
                <p>Information about this particular episode goes here!</p>
				
			</div><!-- .entry-content -->
        </div>
        </div>
    </div> 
    
<?php else : ?>
    <!--If it's not any of the above files, then call the 404 page-->
    <?php get_template_part('content', 'none'); ?>

<?php endif; ?>

    
    <!--Recommended/next Shows to watch! -->
    
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
                      
                      <div class="slideContainer">
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
                    <?php endforeach; ?>

            </div><!--Inner Container-->


			<footer class="entry-footer">
				<?php materialwp_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div> <!-- .entry-container -->
	</div> <!-- .card -->
</article><!-- #post-## -->
