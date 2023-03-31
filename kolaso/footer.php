<?php
/**
 * The template for displaying footer
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 * @author     Ayman Fikry <ayman@zytheme.com>
 */
 
    kolaso_footer();
?>
</div><!-- #wrapper -->
<?php
    if(kolaso_get_option( 'header_show_sidearea' ))  kolaso_module_sidearea_warp();
    if(kolaso_get_option( 'header_show_search' ) )  kolaso_module_search_warp();
    kolaso_footer_backtop();
    kolaso_footer_scripts();
    wp_footer();
?>
</body>
</html>