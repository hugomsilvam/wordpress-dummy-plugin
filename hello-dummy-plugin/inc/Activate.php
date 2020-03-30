<?php

/**
 * @package DummyPlugin
 */

namespace Inc;

class Activate
{

    static function activate()
    {
        flush_rewrite_rules();
    }
}
