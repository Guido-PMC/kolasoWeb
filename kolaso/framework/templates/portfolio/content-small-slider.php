<div class="col-sm-12 col-md-12 col-lg-8">
    <?php        
    $portolfio_images = get_post_meta(get_the_ID(), '_meta_portolfio_options', true);
    if (isset($portolfio_images['portfolio_gallery']) && $portolfio_images['portfolio_gallery'] !== '') {
        echo '<div id="portfolio-slider" class="carousel owl-carousel carousel-navs portfolio-img" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="true" data-dots="false" data-space="0" data-loop="true" data-speed="800">';
        $gallery = $portolfio_images['portfolio_gallery'];
        if (!empty($gallery)) {
            $ids = explode(',', $gallery);
            foreach ($ids as $id) {
                $attachment = wp_get_attachment_image_src($id, 'full');
                echo '<img src="' . $attachment['0'] . '"/>';
            }
        }
        echo '</div>';
    } else {
        kolaso_post_thumbnail('full');
    }
    ?>
</div><!-- .col-lg-8 end -->
<div class="col-sm-12 col-md-12 col-lg-4">
    <?php
    the_title('<div class="portfolio-title"><h3>', '</h3></div>');
    echo '<div class="portfolio-content">';
    the_content();
    echo '</div>';
    get_portfolio_meta();
    get_portfolio_share();
    ?>
</div><!-- .col-lg-4 end -->

<?php

 // Enqueue Styles and Scripts
 wp_enqueue_script('zyt-owl-carousel');
 wp_enqueue_style('zyt-owl-carousel');

 ?>