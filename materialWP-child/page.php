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
                
<!--Landing Page Section-->
        <?php if ( is_front_page() ): ?>
                <?php get_template_part( 'landing', 'page'); ?>
                
<!--Creations Section-->
        <?php elseif (is_page('shows') ): ?>
                <?php get_template_part( 'shows', 'page' ); ?>
        <?php elseif (is_page('films') ): ?>
                <?php get_template_part( 'films', 'page' ); ?>
        <?php elseif (is_page('music') ): ?>
                <?php get_template_part( 'music', 'page' ); ?>
        <?php elseif (is_page('gallery') ): ?>
                <?php get_template_part( 'gallery', 'page' ); ?>
        <?php elseif (is_page('blog') ): ?>
                <?php get_template_part( 'blog', 'page' ); ?>
                
<!--Creators section -->
        <?php elseif (is_page('about') ): ?>
                <?php get_template_part( 'about', 'page' ); ?>               
        <?php elseif (is_page('team') ): ?>
                <?php get_template_part( 'team', 'page' ); ?>
        <?php elseif (is_page('partners') ): ?>
                <?php get_template_part( 'partners', 'page' ); ?>
                
<!--Create Section -->
         <?php elseif (is_page('create') ): ?>
                <?php get_template_part( 'create', 'page' ); ?>               
                
                <?php else : ?>
                                
                <?php endif; ?>

            </main><!-- #main -->
        </div><!-- #primary -->

<?/*php get_sidebar(); */?>
<?php get_footer(); ?>
