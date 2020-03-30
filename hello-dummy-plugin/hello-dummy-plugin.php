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

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Inc\Activate;
use Inc\Deactivate;

if (!class_exists('HelloDummyPlugin')) {

    // How classes work on a Custom plugin
    class HelloDummyPlugin
    {
        public $pluginName;

        function __construct()
        {
            // $this->create_post_type();
            $this->pluginName = plugin_basename(__FILE__);

            // generated a CPT
            $this->custom_post_type();
        }

        // Register the enqueed scripts and admin pages
        function register()
        {

            add_action('admin_enqueue_scripts', array($this, 'enqueue'));

            // add an admin page for the plugin
            add_action('admin_menu', array($this, 'add_admin_pages'));

            // add settings filter on plugins page
            add_filter("plugin_action_links_$this->pluginName", array($this, 'settings_link'));
        }

        function activate()
        {
            Activate::activate();
        }

        function deactivate()
        {
            Deactivate::deactivate();
        }

        protected function create_post_type()
        {
            add_action('init', array($this, 'custom_post_type'));
        }

        // Define a custom post type (CPT = are content types like posts and pages)
        function custom_post_type()
        {
            register_post_type('book', ['public' => true, 'label' => 'Books']);
        }

        // Add scripts (js) and styles (css) to the plugin
        function enqueue()
        {
            // enqueue style scripts
            wp_enqueue_style('my-plugin-style', plugins_url('/assets/dummy.styles.css', __FILE__));
            wp_enqueue_script('my-plugin-script', plugins_url('/assets/dummy.script.js', __FILE__));
        }

        function settings_link($links)
        {
            $settingsLink = '<a href="admin.php?page=dummy_plugin">Settings</a>';
            array_push($links, $settingsLink);
            return $links;
        }

        function add_admin_pages()
        {
            add_menu_page(
                'Dummy Plugin',
                'Dummy Admin',
                'manage_options',
                'dummy_plugin',
                array($this, 'admin_index'),
                'dashicons-carrot',
                200
            );
        }

        function admin_index()
        {
            require_once plugin_dir_path(__FILE__) . '/templates/admin.php';
        }
    }
}

$helloDummyPlugin = new HelloDummyPlugin();
// Now the plugin has registered the scripts
$helloDummyPlugin->register();

// Hook the class plugin actions using wordpress hooks
// Activation
register_activation_hook(__FILE__, array($helloDummyPlugin, 'activate'));

//Deactivation
register_deactivation_hook(__FILE__, array($helloDummyPlugin, 'deactivate'));
