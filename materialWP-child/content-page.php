<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package materialwp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( is_front_page() ) : ?>
    <div class="card false-height">
        <div class="entry-container">
            <div class="entry-content">
                <ul class="cc-slideshow">
                    <li>
                        <span>Image 01</span>
                        <div>
                            <h3>re-lax-a-tion</h3>
                        </div>
                    </li>
                    <li>
                        <span>Image 02</span>
                        <div>
                            <h3>Fun Time</h3>
                        </div>
                    </li>
                    <li>
                        <span>Image 03</span>
                        <div>
                            <h3>Testing #3</h3>
                        </div>
                    </li>
                    <li>
                        <span>Image 04</span>
                        <div>
                            <h3>Solitude</h3>
                        </div>
                    </li>
                    <li>
                        <span>Image 05</span>
                        <div>
                            <h3>Have an awesome day!</h3>
                        </div>
                    </li>
                    <li>
                        <span>Image 06</span>
                        <div>
                            <h3>Here we go!</h3>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div id="primary" class="card col-md-12">
                <div class="row centerMe">
                    <div class="col-md-4 featured"><p>Hey hey hey</p></div>
                    <div class="col-md-4 featured"><p>Hey hey hey</p></div>
                </div>
                <div class="row centerMe">
                    <div class="col-md-6 featured"><p>Hey hey hey</p></div>
                    <div class="col-md-5 featured"><p>Hey hey hey</p></div>
                </div>
                <div class="row centerMe">
                    <div class="col-md-4 featured"><p>Hey hey hey</p></div>
                    <div class="col-md-4 featured"><p>Hey hey hey</p></div>
                    <div class="col-md-3 featured"><p>Hey hey hey</p></div>
                </div>
    </div>
    
    <?php else : ?>
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
                    <?php the_content(); ?>
                    <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . __( 'Pages:', 'materialwp' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div><!-- .entry-content -->

			<!--<footer class="entry-footer">
				/**<?php edit_post_link( __( 'Edit', 'materialwp' ), '<span class="edit-link">', '</span>' ); ?>*/
			</footer> .entry-footer -->
		</div> <!-- .entry-container -->
	</div> <!-- .card -->
    
    <?php endif; ?>

</article><!-- #post-## -->
