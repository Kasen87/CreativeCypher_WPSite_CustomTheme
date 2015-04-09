<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package materialwp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="card">
		<div class="entry-img">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail(); ?>
			<?php endif; ?>
		</div>

		<div class="entry-container">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">

			</div><!-- .entry-content -->

            <!--<footer class="entry-footer">-->
                <!--php edit_post_link( __( 'Edit', 'materialwp' ), '<span class="edit-link">', '</span>' ); 
            </footer><!-- .entry-footer -->
        </div> <!-- .entry-container -->
    </div> <!-- .card -->
</article><!-- #post-## -->
