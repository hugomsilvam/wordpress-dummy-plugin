<?php

/**
 * Trigger this file on Plugin Uninstall admin event
 * 
 * @package HelloDummyPlugin
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

// Clear database data created by this plugin
$books = get_posts(array('post_type' => 'book', 'numberposts' => -1));
foreach ($books as $book) {
    wp_delete_post($book->ID, true);
}
