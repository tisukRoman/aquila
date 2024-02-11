<?php
/*
 * Single Post Template
 *
 * @package Aquila
 */

$post_id = get_the_id();
$hide_page_title = get_post_meta($post_id, "_hide_page_title", true);

?>

<?php get_header(); ?>

<?php if($hide_page_title === 'no'): ?>
  <header>
    <h1>
      <?php the_title() ?>
    </h1>
  </header>
<?php endif; ?>

Post

<?php get_footer(); ?>
