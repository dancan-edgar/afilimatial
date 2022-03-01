<?php

/**
 * Trigger this file on plugin unistall
 * @package Afilimatial
 */


if( ! defined('WP_UNINSTALL_PLUGIN')){
    die("You have no access to this file");
}

remove_shortcode('cur_category');