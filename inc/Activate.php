<?php

namespace Inc;
class Activate {

    public static function activate()
    {
        // Flush rewrite rules
        flush_rewrite_rules();
    }
}