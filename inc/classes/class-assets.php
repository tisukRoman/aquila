<?php
/*
 * Enqueue theme assets
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Assets {
  use Singleton;

  protected function __construct() {
    $this->setup_hooks();
  }

  protected function setup_hooks(){

    // actions
    add_action('wp_enqueue_scripts', [$this, 'register_styles']);
    add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
  }

  public function register_styles(){
    wp_enqueue_style('bootstrap', AQUILA_DIR_URI . '/assets/vendor/bootstrap.css', [], '5.3', 'all');
    wp_enqueue_style('main', AQUILA_DIR_URI . '/style.css', ['bootstrap'], filemtime(AQUILA_DIR_PATH . '/style.css'), 'all');
  }

  public function register_scripts(){
    wp_enqueue_script('bootstrap', AQUILA_DIR_URI . '/assets/vendor/bootstrap.js', ['jquery'], '5.3', true);
    wp_enqueue_script('main', AQUILA_DIR_URI . '/assets/js/main.js', ['bootstrap'], filemtime(AQUILA_DIR_PATH . '/assets/js/main.js'), true);
  }
}
