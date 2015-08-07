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
                <!--Use this section for creating the member posts and attach class based on categories for filtering later-->
                <div class="card memCard">
                    <h1 style="text-align:center">LEADERSHIP</h1>

                    <div class="leaderSection">
                    <hr />
                        <?php 
                            $catID = get_cat_ID('leadership');
                            $args = array('parent' => $catID);
                            $categories = get_categories($args); 
                        ?>
                        
                            <?php foreach($categories as $catName): ?>
                            <?php
                                $leaderArgs = array(
                                'cat' => $catName->cat_ID,
                                'post_type' => 'post',
                                'post_status' => 'publish');
                                $leaderPost = new WP_Query($leaderArgs);
                            if ($leaderPost->have_posts() ) :
                                while ($leaderPost->have_posts() ) : $leaderPost->the_post(); ?>
                                <div class="card entry-container <?php if($catName->slug == 'ceo'){ echo "ceo";}; ?>">
                                    <div class="entry-img">    
                                        <?php if (has_post_thumbnail()){
                                            the_post_thumbnail();   
                                        }else{
                                         echo '<img alt="'.$catName->name.'" src="'.get_stylesheet_directory_uri().'/images/leadership/'.$catName->slug.'.jpg" />';
                                        }; ?>  
                                    </div>

                                <?php
                                    $description = get_the_content();
                                    $description = apply_filters('the_content', $description);
                                    echo '<div class="entry-desc">';
                                    echo '<h3>'.strtoupper(get_the_title()).' , '.strtoupper($catName->name).'</h3><hr />';
                                    echo '<div class="entry-cont">';
                                    if ($description != ''){                                
                                        echo '<p>'.$description.'</p>';                                
                                    };
                                    echo '</div>';
                                    echo '<div class="socialMediaIcons">';
                                    if( get_field("twitter") ){                                    
                                        echo '<a href="'.get_field( "twitter" ).'" target="_blank""><i class="fa fa-twitter first"></i></a>';
                                    }
                                    if( get_field("facebook") ){                                    
                                        echo '<a href="'.get_field( "facebook" ).'" target="_blank""><i class="fa fa-facebook"></i></a>';
                                    }
                                    if( get_field("instagram") ){                                    
                                        echo '<a href="'.get_field( "instagram" ).'" target="_blank""><i class="fa fa-instagram"></i></a>';
                                    }
                                    if( get_field("linkedin") ){                                    
                                        echo '<a href="'.get_field( "linkedin" ).'" target="_blank""><i class="fa fa-linkedin"></i></a>';
                                    }
                                    if( get_field("external_link") ){                                    
                                        echo '<a href="'.get_field( "external_link" ).'" target="_blank""><i class="fa fa-external-link"></i></a>';
                                    }
                                    echo '</div>';
                                    echo '</div>';
                                    ?>  
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <!--Reset the post data and query-->
                            <?php wp_reset_postdata(); ?>
                            <?php wp_reset_query(); ?>
                            <?php endforeach; ?>
                    </div>

                    <h1 style="text-align:center">DIRECTORS</h1>
                    <div class="directorSection">
                    <hr />
                        <?php 
                            $catID = get_cat_ID('leadDirectors');
                            $args = array('parent' => $catID);
                            $categories = get_categories($args); 
                        ?>
                        
                            <?php foreach($categories as $catName): ?>
                            <?php
                                $leaderArgs = array(
                                'cat' => $catName->cat_ID,
                                'post_type' => 'post',
                                'post_status' => 'publish');
                                $leaderPost = new WP_Query($leaderArgs);
                            if ($leaderPost->have_posts() ) :
                                while ($leaderPost->have_posts() ) : $leaderPost->the_post(); ?>
                                <div class="card entry-container">
                                    <div class="entry-img">
                                        <?php if (has_post_thumbnail()){
                                            the_post_thumbnail();   
                                        }else{
                                         echo '<img alt="'.$catName->name.'" src="'.get_stylesheet_directory_uri().'/images/leadership/'.$catName->slug.'.jpg" />';
                                        }; ?>  
                                    </div>

                                <?php
                                    $description = get_the_content();
                                    $description = apply_filters('the_content', $description);                                    
                                    echo '<div class="entry-desc">';
                                    echo '<h4>'.strtoupper(get_the_title()).' , '.strtoupper($catName->name).'</h4><hr />';
                                    echo '<div class="entry-cont">';
                                    if ($description != ''){                                
                                        echo '<p>'.$description.'</p>';                                
                                    };
                                    echo '</div>';
                                    echo '<div class="socialMediaIcons">';
                                    echo '<a href=""><i class="fa fa-twitter first"></i></a>';
                                    echo '<a href=""><i class="fa fa-facebook"></i></a>';
                                    echo '<a href=""><i class="fa fa-instagram"></i></a>';
                                    echo '<a href=""><i class="fa fa-linkedin"></i></a>';
                                    echo '<a href=""><i class="fa fa-external-link"></i></a>';
                                    echo '</div>';
                                    echo '</div>';
                                    ?>  
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <!--Reset the post data and query-->
                            <?php wp_reset_postdata(); ?>
                            <?php wp_reset_query(); ?>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div><!--Inner Container-->
        </div>
    </div> 
</article><!--End of Article-->

