<?php

/*
 * Header tamplate
 *
 * @package Aquila
 */

?>

<!doctype html>

<html <?php language_attributes() ?>>

  <head>
    <title><?php bloginfo('name') ?></title>
    <meta charset="<?php bloginfo('charset') ?>" />
    <meta name="description" content="description">
    <meta name="keywords" content="html tutorial template">

    <?php wp_head() ?>
  </head>

  <body <?php body_class() ?>>

  <?php wp_body_open() ?>

  <header>

    <?php get_template_part('template-parts/navbar') ?>

  </header>
