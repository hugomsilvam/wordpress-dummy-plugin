<?php

namespace Inc\Pages;

class Admin
{

    function register()
    {
        // add an admin page for the plugin 
        add_action('admin_menu', array($this, 'add_menu_admin_page'));
    }

    function index()
    {
        require_once PLUGIN_PATH . 'templates/admin.php';
    }

    function add_menu_admin_page()
    {
        add_menu_page(
            'Dummy Plugin',
            'Dummy Admin',
            'manage_options',
            'dummy_plugin',
            array($this, 'index'),
            'dashicons-carrot',
            200
        );
    }
}
