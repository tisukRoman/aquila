<?php

/*
 * Blog Page
 *
 * @package Aquila
 */

?>

<?php get_header(); ?>

<div id="primary">
  <main id="main" class="site-main mt-5" role="main">

  <?php if(have_posts()): ?>

    <div class="container">
      <?php if(is_home() && !is_front_page()): ?>
        <header class="mb-5">
          <h1 class="page-title screen-reader-text">
            <?php single_post_title() ?>
          </h1>
        </header>
      <?php endif; ?>

      <div class="row">
        <?php while(have_posts()): the_post(); ?>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <?php get_template_part('template-parts/content') ?>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
      
  <?php else: ?>

    <?php get_template_part('template-parts/content', 'none') ?>    
  
  <?php endif; ?>

  </main>
</div>

<?php get_footer(); ?>
