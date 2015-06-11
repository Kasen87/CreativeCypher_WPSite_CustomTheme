<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package materialwp
 */
?>

<?php get_template_part('pieces/hero', 'generic'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
    <div class="contentBodyBG">
        <div class="outerContentCont">
            <div class="innerContainer">
                <!--Use this section for creating the member posts and attach class based on categories for filtering later-->
                <div class="card memCard">
                <?php

                $memberCatLists = get_categories(array('parent'=>get_cat_ID('team'), 'hide_empty'=>0));
                //this creates the list for selecting to filter
                echo '<div class="centerMargins">';
                echo '<div id="filterNavBtns">';
                echo '<ul id="filterNav">';
                $i = 0;
                foreach($memberCatLists as $memFilterBtn){
                    if ($i == 0){
                        echo '<li class="current"><a href="#">ALL</a></li>';
                    }else{
                    }
                    echo '<li class=""> <a href="#">'.strtoupper($memFilterBtn->name).'</a></li>';
                    $i++;
                }
                echo '</ul></div>';
                echo '<div class="">';
                $memberPostList = new WP_Query('category_name=team');
                if ($memberPostList->have_posts()) {
                    echo '<ul id="membersPortfolio" class="centerMargins">';

                    while ( $memberPostList->have_posts() ) {
                        $memberPostList->the_post();
                        $catClass = 'class="';

                        foreach($memberCatLists as $memCat) {

                            if( in_category($memCat)){
                                //This is what to do if it is part of the category
                                $catClass .= $memCat->slug.' ';
                            }else{  
                                //Do something here if not in category?
                            }                         
                            //this ends the foreach loop above
                        }
                        $catClass .= 'card"';

                        
                            echo '<li '.$catClass.'>';
                            echo '<div id="portfolio" class="entry-img" alt="'.get_the_title().'">';
                            if (has_post_thumbnail() ){
                                the_post_thumbnail();   
                            }else{
                                //Something 
                            }
                            
                            //$targetText = '[ext]';
                            $description = get_the_content();
                            //$description = explode($targetText, $description);
                            //$blurbContent = $description[0];
                            //$heroContent = $targetText . $description[1];
                            //$heroContent = apply_filters('the_content', $heroContent);
                            $description = apply_filters('the_content', $description);

                            if ($description != ''){
                                echo '<div class="entry-desc">';
                                echo '<h3>'.the_title().'</h3><hr />';
                                echo '<p>'.$description.'</p>';
                                echo '</div>';
                            } else {

                            }
                            echo '</div>';
                            echo '</li>';
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

