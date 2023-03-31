<div class="col-sm-12 col-md-12 col-lg-8">
    <div id="portfolioMasonry" class="row portfolio-masonry">
        <?php
        $portolfio_images = get_post_meta(get_the_ID(), '_meta_portolfio_options', true);
        if (isset($portolfio_images['portfolio_gallery']) && $portolfio_images['portfolio_gallery'] !== ''):
            $gallery = $portolfio_images['portfolio_gallery'];
            if (!empty($gallery)):
                $ids = explode(',', $gallery);

                foreach ($ids as $id) {
                    $attachment = wp_get_attachment_image_src($id, 'kolaso_portfolio_800x800');

                    echo '<div class="col-sm-12 col-md-6 col-lg-6 portfolio-item">';
                    echo '<div class="portfolio-item-container">';
                    echo '<div class="portfolio-img">';
                    echo '<img src="' . $attachment['0'] . '" alt="' . get_the_title($id) . '"/>';
                    echo ' <div class="portfolio-hover portfolio-hover-fade">';
                    echo ' <div class="portfolio-action">';
                    echo '  <div class="portfolio-zoom">';
                    echo '<a class="img-gallery-item" href="' . $attachment['0'] . '" title="' . get_the_title($id) . '"></a>';
                    echo '    </div>';
                    echo ' </div><!-- .work-action end -->';
                    echo ' </div><!-- .work-hover end -->';
                    echo '</div><!-- .work-img end -->';
                    echo ' </div>';
                    echo '  </div>';
                }
            endif;
        else:
            kolaso_post_thumbnail('full');
        endif;
        ?>
    </div><!-- .row end -->
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
wp_enqueue_script('zyt-isotope' );
wp_enqueue_script('zyt-imagesloaded' );
wp_enqueue_script('zyt-magnific' );
wp_enqueue_style('zyt-magnific');
?>
