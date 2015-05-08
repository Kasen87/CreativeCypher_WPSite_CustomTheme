<?php
/**
 * The template for displaying all archive pages.
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
                
<?php $parents = get_category( get_query_var( 'cat') ); ?>
<?php set_query_var('parents', $parents); ?>    
                
<?php if (post_is_in_descendant_category(get_cat_ID('Shows'))) : ?>
    <?php get_template_part('pieces/hero', 'show'); ?>
<?php endif; ?> 
                
                
<?php get_footer(); ?>