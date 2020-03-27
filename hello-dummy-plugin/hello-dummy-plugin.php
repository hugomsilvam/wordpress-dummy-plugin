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

// Security methods

// Method 1
// if(!defined('ASBPATH')) {
//     die('You don\'t access to this plugin peasant 👮‍♂️');
// }

// Method 2
defined('ABSPATH') or die('You don\'t access to this plugin peasant 👮‍♂️');

// Method 3
// if (! function_exists('add_action')) {
//     echo 'You don\'t access to this plugin peasant 👮‍♂️';
//     exit;
// }
