<?php

function theme_enqueue_styles(){
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
    wp_register_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js' );
    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), '', true);
    wp_enqueue_script( 'jquery-ui-datepicker', array('jquery'), '', true);

    $translation_array = array( 'templateURL' => get_stylesheet_directory_uri() );
    wp_localize_script('custom-js', 'object_name', $translation_array);
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');

/**
*
* Tests if any of a post's assigned categories are descendants of target categories
*
* @param int|array $cats -> The target categories. Integer ID or array of integer IDs
* @param int|object $_post -> The post. Omit to test the current post in the Loop or main query
* @return bool -> True if at least 1 of the post's categories is a descendant of any of the target categories
* @see get_term_by() -> You can get a category by name or slug, then pass ID to this function
* @uses get_term_children() -> Passes $cats
* @uses in_category() -> Passes $_post (can be empty)
* @version 2.7
* @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
*/

if( ! function_exists( 'post_is_in_descendant_category' ) ) {
    function post_is_in_descendant_category($cats, $_post = null) {
        foreach ( (array) $cats as $cat ) {
            //get_term_children() accepts integer ID only
            $descendants = get_term_children( (int) $cat, 'category' );
            if ($descendants && in_category( $descendants, $_post ) )
                return true;
        }
        return false;
    }
    
    

}

if( ! function_exists( 'wpb_add_google_fonts' ) ) {
    function wpb_add_google_fonts() {
        wp_register_style('wpb-googleFonts',
                          'http://fonts.googleapis.com/css?family=Montserrat:400,700');
                            wp_enqueue_style('wpb-googleFonts');
    }
    
    add_action('wp_print_styles', 'wpb_add_google_fonts');
}



?>