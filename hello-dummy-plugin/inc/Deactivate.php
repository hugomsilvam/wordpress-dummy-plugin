<?php

/**
 * @package DummyPlugin
 */

namespace Inc;

class Deactivate
{

    static function deactivate()
    {
        flush_rewrite_rules();
    }
}
