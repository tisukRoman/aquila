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
            <h1><?php the_title() ?></h1>
            <div><?php the_excerpt() ?></div>
          </div>

        <?php endwhile; ?>

      </div>

    </div>
      
  <?php endif; ?>

  </main>
</div>

<?php get_footer(); ?>
