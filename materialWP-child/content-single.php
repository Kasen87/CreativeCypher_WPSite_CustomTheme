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

<?php if (in_category( 'Shows' ) || post_is_in_descendant_category(get_cat_ID('Shows'))) : ?>

    <!--Pull In The Header -->
    <?php get_template_part('pieces/hero', 'live'); ?>  <!-- This opens two divs that need to be closed by the end of this file -->
    <?php $myParent = get_the_category(); ?>
    <?php set_query_var('myParent', $myParent[0]); ?>
    <?php get_template_part('pieces/suggestions', 'section'); ?>

    <hr class="suggest-sep centerMargins">

    <?php $catID = get_cat_ID('shows'); ?>
    <?php $args = array('parent' => $catID,'number' => 4); ?>
    <?php $categories = get_categories($args); ?> 
    <div class="singleRow suggest-entry">
        <h3 class="showTitle">MORE SHOWS</h3>
        <?php foreach($categories as $catName): ?>
            <a href="<?php echo get_site_url() . '/category/' . get_cat_name($catName->parent) . '/' . $catName->slug; ?>">
                <div class="card entry-container">
                    <div class="entry-img">    
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail(); ?>
                        <?php endif; ?>
                    </div>
                </div> <!-- .entry-container -->
            </a><!-- End of the loop-->
        <?php wp_reset_postdata(); ?>
        <?php wp_reset_query(); ?>
        <?php endforeach; ?>
        </div>




<?php elseif (in_category( 'films' ) || post_is_in_descendant_category(get_cat_ID('films'))) : ?>

    <!--Pull In The Header -->
    <?php get_template_part('pieces/hero', 'live'); ?>  <!-- This opens two divs that need to be closed by the end of this file -->

<?php elseif (in_category( 'music' ) || post_is_in_descendant_category(get_cat_ID('music'))) : ?>
  
    <!--Pull In The Header -->
    <?php get_template_part('pieces/hero', 'live'); ?>  <!-- This opens two divs that need to be closed by the end of this file -->
    <?php $myParent = get_the_category(); ?>
    <?php set_query_var('myParent', $myParent[0]); ?>
    <?php get_template_part('pieces/suggestions', 'section'); ?>

    <hr class="suggest-sep centerMargins">

    <?php $catID = get_cat_ID('music'); ?>
    <?php $args = array('parent' => $catID,'number' => 4); ?>
    <?php $categories = get_categories($args); ?> 
    <div class="singleRow suggest-entry">
        <h3 class="showTitle">MORE MUSIC</h3>
        <?php foreach($categories as $catName): ?>
            <a href="<?php echo get_site_url() . '/category/' . get_cat_name($catName->parent) . '/' . $catName->slug; ?>">
                <div class="card entry-container">
                    <div class="entry-img">    
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail(); ?>
                        <?php endif; ?>
                    </div>
                </div> <!-- .entry-container -->
            </a><!-- End of the loop-->
        <?php wp_reset_postdata(); ?>
        <?php wp_reset_query(); ?>
        <?php endforeach; ?>
        </div>

<?php elseif (in_category( 'art' ) || post_is_in_descendant_category(get_cat_ID('gallery'))) : ?>

<?php else : ?>
    <!--If it's not any of the above files, then call the 404 page-->
    <?php get_template_part('content', 'none'); ?>

<?php endif; ?>   



<!--Below divs end the three from Suggestions sections-->
        </div>
    </div>
</div>

</article><!-- #post-## -->
