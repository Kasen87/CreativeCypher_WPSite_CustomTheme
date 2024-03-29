<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package materialwp
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'materialwp' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<nav class="<?php if (is_admin_bar_showing()) {
						echo 'navbar navbar-default navbar-fixed-top admin-bar-adjust';
					} else {
						echo 'navbar navbar-default navbar-fixed-top';
					}?>" role="navigation">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>

			<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
    		</div>

    			<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
				 <?php
		            wp_nav_menu( array(
		                'menu'              => 'primary',
		                'theme_location'    => 'primary',
		                'depth'             => 2,
		                'container'         => false,
		                'menu_class'        => 'nav navbar-nav navbar-right',
		                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		                'walker'            => new wp_bootstrap_navwalker())
		            );
	        	?>

	        	<!--<i class="fa fa-bars"></i>-->



	        		<!--<form class="navbar-form navbar-right" role="search" method="get" id="searchform" action="<?php  echo home_url( '/' ); ?>">
	        			<div class="form-control-wrapper">
                        	<input name="s" id="s" type="text" class="form-control col-lg-8" placeholder="<?php  _e('Search','materialwp'); ?>">
                        </div>
                    </form>-->

        		</div> <!-- .navbar-collapse -->
        	</div><!-- /.container -->
        	<div id='rightSideMenuContainer' <?php if(is_admin_bar_showing()){ 
        											echo 'style="top:90px"';
        											}; ?> >
        	<?php wp_nav_menu( 'sort_column=menu_order&menu_class=rsmContent&theme_location=side-menu' ); ?>
        	</div>
		</nav><!-- .navbar .navbar-default -->
	</header><!-- #masthead -->



	<div id="content" class="site-content">
