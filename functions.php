<?php
/*
 * Theme Functions.
 *
 * @package Aquila
 */

if(!defined('AQUILA_DIR_PATH')) {
  define('AQUILA_DIR_PATH', untrailingslashit( get_template_directory() ));
}

if(!defined('AQUILA_DIR_URI')) {
  define('AQUILA_DIR_URI', untrailingslashit( get_template_directory_uri() ));
}

require_once AQUILA_DIR_PATH . '/inc/helpers/autoloader.php';

use AQUILA_THEME\Inc\AQUILA_THEME;

$aquila = AQUILA_THEME::get_instance();
