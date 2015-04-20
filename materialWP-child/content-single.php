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
        <div class="half-hero">
            <div class="video-hero">
                <?php the_content(); ?>
            </div>    
        </div>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="card">
		<div class="fullShowDescription">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

				<div class="entry-meta">
					<?php materialwp_posted_on(); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->

			<div class="entry-content">
                <?php the_content(); ?>
				
			</div><!-- .entry-content -->
        </div>
    </div>
<?php else : ?>

    <!--If it's not any of the above files, then call the 404 page-->
    <?php get_template_part('content', 'none'); ?>

<?php endif; ?>



			<footer class="entry-footer">
				<?php materialwp_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div> <!-- .entry-container -->
	</div> <!-- .card -->
</article><!-- #post-## -->
