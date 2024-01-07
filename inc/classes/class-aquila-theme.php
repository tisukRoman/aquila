<?php
/*
 * Bootstraps the Theme.
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME {
  use Singleton;

  protected function __construct(){
    Assets::get_instance();

    $this->setup_hooks();
  }

  protected function setup_hooks() {
    add_action('after_setup_theme', [$this, 'setup_theme']);
  }

  public function setup_theme(){
    add_theme_support('title-tag');

    add_theme_support('custom-logo', [
      'header-text' => ['site-title', 'site-description'],
      'height' => 100,
      'width' => 100,
      'flex-width' => true,
      'flex-height' => true,
    ]);
  }
}
