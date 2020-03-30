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

defined('ABSPATH') or die('You don\'t access to this plugin peasant 👮‍♂️');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

function activate()
{
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate');


function deactivate()
{
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate');

// Initialize services inside Init class
if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
