<?php

namespace Inc\Base;

use \Inc\Base\BaseController;

class SettingsLinks extends BaseController
{
    function register()
    {
        // add settings filter on plugins page
        add_filter('plugin_action_links_' . $this->plugin, array($this, 'settings_link'));
    }

    function settings_link($links)
    {
        $settingsLink = '<a href="admin.php?page=dummy_plugin">Settings</a>';
        array_push($links, $settingsLink);
        return $links;
    }
}
