<?php
/*
 * The template part for displaying message when posts not found.
 *
 * @package Aquila
 */
?>

<section class="no-result not-found">
  <header class="page-header">
    <h1 class="page-title">
      <?php _e('Nothing Found', 'aquila') ?>
    </h1>
  </header>

  <div class="page-content">
    <?php if(is_home() && current_user_can('publish_posts')): ?>
      <p>
        <?php printf(wp_kses(
          __('Ready to publish your first post? <a href="%s">Get started here</a>', 'aquila'),
          [
            'a' => [
              'href' => []
            ]
          ]
        ), esc_url(admin_url('post-new.php'))) ?>
      </p>
    <?php elseif(is_search()): ?>
      <p>
        <?php _e('Sorry, but we didn\'t find anything you searched. Try with different word phrase', 'aquila') ?>
        <?php get_search_form() ?>
      </p>
    <?php else: ?>
      <p>
        <?php _e('It seems that we cannot find what you are looking. Try searching...', 'aquila') ?>
        <?php get_search_form() ?>
      </p>
    <?php endif; ?>
  </div>
</section>
