<?php
/*
 * Theme Menus
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Menus {
  use Singleton;

  protected function __construct() {
    $this->setup_hooks();
  }

  public function setup_hooks() {
    add_action('init', [$this, 'register_menus']);
  }

  public function register_menus() {
    register_nav_menus([
      'aquila-header-menu' => __('Header Menu', 'aquila'),
      'aquila-footer-menu' => __('Footer Menu', 'aquila'),
    ]);
  }

  public function get_menu_id($location): int | false {
    $locations = get_nav_menu_locations();

    $menu_id = $locations[$location];

    return !empty($menu_id) ? $menu_id : false;
  }

  public function get_child_menu_items($menu_array, $parent_id): array | false {
    $child_menus = [];

    if(empty($menu_array) || !is_array($menu_array)){
      return false;
    }

    foreach ($menu_array as $menu) {
      if(intval($menu->menu_item_parent) === $parent_id){
        array_push($child_menus, $menu);
      }
    }

    return $child_menus;
  }
}
