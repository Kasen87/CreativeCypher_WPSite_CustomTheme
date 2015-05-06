<div class="heroBodyBG">
    <div class="outerContentCont">
        <div class="innerContainer">
            <div class="live-hero">
                <?php the_content(); ?>
            </div>
        </div>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="card">
            <div class="innerContainer">
                <div class="fullShowDescription">
                    <header class="entry-header">
                        <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
                    </header>
                    <div class="entry-content">
                        <!--We need to find a way to import text before of after the youtube embed section-->
                        <p>Information about this particular episode goes here!</p>
                    </div>
                </div><!-- .fullShowDescription -->
            </div><!-- .innerContainer -->
        </div><!-- .card -->