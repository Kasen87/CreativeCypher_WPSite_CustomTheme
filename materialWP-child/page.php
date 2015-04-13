<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package materialwp
 */

get_header(); ?>

<div class="container">
	<div class="row">
        
        <div id="primary" class="col-lg-12">
            <main id="main" class="site-main" role="main">
  
        <?php if ( is_front_page() ): ?>
                <?php get_template_part( 'landing', 'page'); ?>
        <?php elseif (is_page('team') ): ?>
                <?php get_template_part( 'press-releases', 'page' ); ?>
        <?php elseif (is_page('shows') ): ?>
                <?php get_template_part( 'shows', 'page' ); ?>

                
                <?php else : ?>
                                
                <?php endif; ?>

            </main><!-- #main -->
        </div><!-- #primary -->

<?/*php get_sidebar(); */?>
<?php get_footer(); ?>
