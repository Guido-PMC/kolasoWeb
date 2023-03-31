<?php
/**
 * The template for displaying loop content
 *
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 * @author     Ayman Fikry <ayman@zytheme.com>
 */

if(kolaso_archive_layout() == 'blog-standard'):
    get_template_part( 'framework/templates/loops/loop', 'standard' );
else:
    get_template_part( 'framework/templates/loops/loop', 'grid' );
endif;