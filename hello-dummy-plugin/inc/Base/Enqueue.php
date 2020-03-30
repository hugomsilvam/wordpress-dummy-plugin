<?php

namespace Inc\Base;

use Inc\Base\BaseController;

class Enqueue extends BaseController
{

    function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    //Add scripts (js) and styles (css) to the plugin
    function enqueue()
    {
        // enqueue style scripts
        wp_enqueue_style('my-plugin-style', $this->plugin_url . '/assets/dummy.styles.css');
        wp_enqueue_script('my-plugin-script', $this->plugin_url . '/assets/dummy.script.js');
    }
}
