<?php

/*
 * Header tamplate
 *
 * @package Aquila
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php wp_body_open() ?>

<header>
  <?php get_template_part('template-parts/navbar') ?>
</header>
