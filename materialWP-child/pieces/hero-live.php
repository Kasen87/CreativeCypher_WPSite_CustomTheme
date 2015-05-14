<?php $targetText = 'http';
    $description = get_the_content();
    $description = explode($targetText, $description);
    $descContent = $description[0];
    $heroContent = $targetText . $description[1];
    $heroContent = apply_filters('the_content', $heroContent);
    $descContent = apply_filters('the_content', $descContent);
?>

<div class="heroBodyBG">
    <div class="outerContentCont">
        <div class="innerContainer">
            <div class="live-hero">
                <?php echo $heroContent; ?>
            </div>
        </div>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="card">
            <div class="innerContainer">
                <div class="fullShowDescription">
                    <header class="entry-header">
                        <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?><hr />
                        <h5><?php echo the_date(); ?>&nbsp;&nbsp;&nbsp;&nbsp;Uploaded by: <?php the_author(); ?></h5>
                    </header>
                    <div class="entry-content">
                        <p><?php echo $descContent; ?></p>
                    </div>
                </div><!-- .fullShowDescription -->
            </div><!-- .innerContainer -->
        </div><!-- .card -->

    