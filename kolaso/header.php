<?php
/**
 * The template for displaying header
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 * @author     Ayman Fikry <ayman@zytheme.com>
 */
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php 
		wp_head(); 
	?>
</head>
<body <?php body_class(kolaso_get_layout_class());?>>
	<?php 
		kolaso_get_preloading(); 
	?>
	<div id="wrapper" class="wrapper clearfix">

	<?php
		kolaso_get_header();
		kolaso_get_pagetitle();