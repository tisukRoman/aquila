<?php
  $menu = \Aquila_Theme\Inc\Menus::get_instance();
  $header_menu_id = $menu->get_menu_id('aquila-header-menu');
  $header_menu = wp_get_nav_menu_items($header_menu_id);
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">

  <div class="site-logo">
    <?php the_custom_logo() ?>
  </div>

  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <?php if(!empty($header_menu) && is_array($header_menu)): ?>

        <ul class="navbar-nav mr-auto">

        <?php foreach($header_menu as $menu_item): ?>
  
          <?php if(!$menu_item->menu_item_parent): ?>

            <?php 
              $child_menu_items = $menu->get_child_menu_items($header_menu, $menu_item->ID);
              $has_children = !empty($child_menu_items) && is_array($child_menu_items);
            ?>
  
            <?php if(!$has_children): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo $menu_item->url ?>"><?php echo $menu_item->title ?></a>
              </li>
            <?php else: ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo $menu_item->title ?>
                </a>
                <ul class="dropdown-menu">
                  <?php foreach ($child_menu_items as $menu_item): ?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo $menu_item->url ?>"><?php echo $menu_item->title ?></a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </li>
            <?php endif; ?>

            
          <?php endif; ?>

        <?php endforeach; ?>

        </ul>

      <?php endif; ?>

    </div>
  </div>
</nav>
