<?php
/**
* Display metadata in single or page.
*
*
* @link       zytheme.com
* @since      1.0.0
*
* @package    Zytheme
* @subpackage Kolaso
*/

?>
<div class="entry-meta">
    <?php 
        $kolaso_single_metadata = kolaso_get_option( 'single_metadata' );
        if (kolaso_get_option( 'single_metadata_switcher' ) == true):
            if ( is_array($kolaso_single_metadata ) && in_array ('author'   , $kolaso_single_metadata)) kolaso_post_author();
            if ( is_array($kolaso_single_metadata ) && in_array ('category' , $kolaso_single_metadata)) kolaso_entry_cat();
            if ( is_array($kolaso_single_metadata ) && in_array ('date'     , $kolaso_single_metadata)) kolaso_posted_on(false);
            if ( is_array($kolaso_single_metadata ) && in_array ('comments' , $kolaso_single_metadata)) kolaso_entry_comments();
            if ( is_array($kolaso_single_metadata ) && in_array ('reading'  , $kolaso_single_metadata)) kolaso_reading_time();
        endif; 
    ?>
</div>