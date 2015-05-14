<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
    <div class="contentBodyBG">
        <div class="outerContentCont">
            <div class="innerContainer">
                <?php $catID = $parents->cat_ID; ?>
                <?php $args = array('parent' => $catID, 'order' => 'desc'); ?>
                <?php $categories = get_categories($args); ?> 
                <div class="episodes centerMargins padTopBotBy10">
                    <?php foreach($categories as $catName): ?>
                    	<h3 class="showTitle"><?php echo $catName->name; ?></h3>
                    	<div class="seasonContainer">
                    	<?php $postArgs = array(
	                        'cat' => $catName->cat_ID,
	                        'post_type' => 'post',
	                        'post_status' => 'publish',
        				); ?>
                    	<?php $postList = new WP_Query($postArgs); ?>
                    	<?php if( $postList->have_posts() ) : ?>
            				<?php while ( $postList->have_posts() ) : $postList->the_post(); ?>
	                            <a href="<?php the_permalink(); ?>">
	                            <div class="card entry-container">
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
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</article>