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
                            <h3>Hooray!</h3>
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
    <div id="primary" class="col-lg-12">
        <div class="container-fluid">
            <div class="featuredHeading"><h1>Fan-Favorites</h1></div>
                <div class="row featuredRow">
                    <div class="featured featured01">
                        <h4>Special Feature 1</h4>
                    </div>
                    <div class="featured featured02">
                        <h4>Special Feature 2</h4>
                    </div>
                    <div class="featured featured03">
                        <h4>Special Feature 3</h4>
                    </div>
                    <div class="featured featured04">
                        <!--<h4>Special Feature 4</h4>-->
                    </div>
                    <div class="featured featured05">
                        <h4>Special Feature 5</h4>
                    </div>
                    <div class="featured featured06">
                        <h4>Special Feature 6</h4>
                    </div>
                    <div class="featured featured07">
                        <h4>Special Feature 7</h4>
                    </div>
                    <div class="featured featured08">
                        <h4>Special Feature 8</h4>
                    </div>
                </div>
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
