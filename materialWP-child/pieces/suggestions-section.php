<div class="contentBodyBG">
        <div class="outerContentCont">
            <div class="innerContainer">
                <?php $catID = $myParent->cat_ID; ?>
                <div class="episodes centerMargins padTopBotBy10">
                    <?//php foreach($categories as $catName): ?>
                        <h3 class="showTitle"><?php echo $myParent->name; ?></h3>
                        <div class="seasonContainer suggest-entry">
                        <?php $postArgs = array(
                            'cat' => $myParent->cat_ID,
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page'=> 4
                        ); ?>
                        <?php $postList = new WP_Query($postArgs); ?>
                        <?php if( $postList->have_posts() ) : ?>
                            <?php while ( $postList->have_posts() ) : $postList->the_post(); ?>
                                <a href="<?php the_permalink(); ?>">
                                <div class="card entry-container suggest-entry">
                                    <div class="entry-img">    
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <?php the_post_thumbnail(); ?>
                                        <?php endif; ?>
                                    </div> 
                                    <?php $targetText = 'http';
                                        $description = get_the_content();
                                        $description = explode($targetText, $description);
                                        $descContent = $description[0];
                                        $heroContent = $targetText . $description[1];
                                        $heroContent = apply_filters('the_content', $heroContent);
                                        $descContent = apply_filters('the_content', $descContent);
                                    ?>
                                    <div class="entry-desc">
                                    <h4><?php echo the_title(); ?></h4><hr />
                                        <p><?php echo $descContent; ?></p>
                                    </div>
                                </div> <!-- .entry-container -->
                                </a>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        </div><!-- End of the loop-->
                    <?php wp_reset_postdata(); ?>
                    <?php wp_reset_query(); ?>
                    <?//php endforeach; ?>
                </div>
