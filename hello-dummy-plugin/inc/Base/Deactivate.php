<?php

/**
 * @package DummyPlugin
 */

namespace Inc\Base;

class Deactivate
{

    static function deactivate()
    {
        flush_rewrite_rules();
    }
}
