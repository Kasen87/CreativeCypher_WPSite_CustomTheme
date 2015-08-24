<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package materialwp
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
    <div class="contentBodyBG">
        <div class="outerContentCont">
            <div class="innerContainer">
                <!--Use this section for creating the partner posts and attach class based on categories for filtering later-->
                <div class="card memCard">
                <?php

                $partnerCatLists = get_categories(array('parent'=>get_cat_ID('Partners'), 'hide_empty'=>0));
                //this creates the list for selecting to filter
                echo '<div class="centerMargins">';
                echo '<div id="filterNavBtns">';
                echo '<ul id="filterNav">';
                $i = 0;
                foreach($partnerCatLists as $memFilterBtn){
                    if ($i == 0){
                        echo '<li class="current"><a href="#">ALL</a></li>';
                    }else{
                    }
                    echo '<li class=""> <a href="#">'.strtoupper($memFilterBtn->name).'</a></li>';
                    $i++;
                }
                echo '</ul></div>';
                echo '<div class="centerMargins">';
                $partnersArgs = array( 'category_name' => 'Partners',
                                        'post_status' => 'publish',
                                        'posts_per_page' => -1,
                                        'nopaging' => true);
                $partnerPostList = new WP_Query($partnersArgs);
                if ($partnerPostList->have_posts()) {
                    echo '<ul id="partnersPortfolio" class="centerMargins">';

                    while ( $partnerPostList->have_posts() ) {
                        $partnerPostList->the_post();
                        $catClass = 'class="';

                        foreach($partnerCatLists as $partCat) {

                            if( in_category($partCat)){
                                //This is what to do if it is part of the category
                                $catClass .= $partCat->slug.' ';
                            }else{  
                                //Do something here if not in category?
                            }                         
                            //this ends the foreach loop above
                        }
                        $catClass .= '"';

                            $targetText = 'http';
                            $description = get_the_content();

                            if($desction != ''){
                                $description = explode($targetText, $description);
                                $blurbContent = $description[0];
                                $heroContent = $targetText . $description[1];
                                $heroContent = apply_filters('the_content', $heroContent);
                                $description = apply_filters('the_content', $description);
                            }

                            if( get_field("external_link") ){                                    
                                echo '<a href="'.get_field( "external_link" ).'" target="_blank">';
                            }else{
                                echo '<a href="#">';
                            }
                            echo '<li '.$catClass.'>';
                            echo '<div id="portfolio" class="entry-img" alt="'.get_the_title().'">';
                            if (has_post_thumbnail()){
                                the_post_thumbnail();   
                            }else{
                                //Something 
                            }
                            echo '<div class="entry-desc">';
                            echo '<h4>'.strtoupper(get_the_title()).'</h4><hr />';
                                
                            if ($description != ''){
                                echo '<div class="entry-cont">';
                                echo $description;
                                echo '</div>';  
                            } else {
                                //Do nothing basically
                            }
                            echo '</div>'; //Ends entry-desc container
                            echo '</div>';
                            echo '</li></a>';
                        //this should start the next post in the loop, unless there's not a post
                    }

                    echo '</ul>';
                    echo '</div>';
                } else {
                    // no posts found
                }
                echo'</ul>';
                echo '</div>';
                wp_reset_postdata();
                ?>

                
                

                </div>
            </div><!--Inner Container-->
        </div>
    </div> 
</article><!--End of Article-->

