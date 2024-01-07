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

  public function get_menu_id($location){
    return get_nav_menu_locations()[$location];
  }
}
