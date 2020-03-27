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


// How classes work on a Custom plugin
class HelloDummyPlugin
{
    function __construct()
    {
    }

    // Define plugin actions on a class
    function activate()
    {
        // Just for testing
        echo 'plugin is activated';
    }

    function deactivate()
    {
        // Just for testing
        echo 'plugin is deactivated';
    }

    function uninstall()
    {
    }
}

if (class_exists('HelloDummyPlugin')) {
    $helloDummyPlugin = new HelloDummyPlugin();
}

// Hook the class plugin actions using wordpress hooks

// Activation
register_activation_hook(__FILE__, array($helloDummyPlugin, 'activate'));

//Deactivation
register_deactivation_hook(__FILE__, array($helloDummyPlugin, 'deactivate'));

//Uninstall
