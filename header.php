<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?>
<!doctype html>
<html class="h-full" <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <?php wp_head(); ?>

</head>

<body class="antialiased h-full">

  <?php get_template_part('template-parts/header/header'); ?>

  <div id="wrapper" class="h-full bg-blue-50">
