<?php

/**
 * @package HelloDummyPlugin
 */
/*
   Plugin Name: Hello Dummy Plugin
   Description: Dummy test plugin
   Version: 1.0.0
   Author: Hugo Silva
   Text Domain: hello-dummy-plugin
  */

// Security method
defined('ABSPATH') or die('You don\'t access to this plugin peasant 👮‍♂️');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));

// Initialize services inside Init class
if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
