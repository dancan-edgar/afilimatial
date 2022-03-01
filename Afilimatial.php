<?php


/**
 * @package Afilimatial
 * @author Ampeire Edgar
 * @license GPL V2 or later
 */

/*
 * Plugin Name: Afilimatial
 * Plugin URI: https://github.com/dancan-edgar/afilimatial.git
 * Description: Afilimatial enables you to cature the current category from the current page.
 * Version: 1.0.0
 * Author: Ampeire Edgar
 * Author URI: https://github.com/dancan-edgar
 * License: GPL V2 or higher
 * Text Domain: afilimatial
 */

/*
Afilimatial is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Afilimatial is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Afilimatial. If not, see https://www.gnu.org/licenses/old-licenses/gpl-2.0.html}.
*/

defined('ABSPATH')  or die("You dont have access to this file");

if( ! function_exists('add_action')){
    die("You dont have access to this file");
}

if(file_exists(dirname(__FILE__) . '/vendor/autoload.php')){
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Inc\Activate;
use Inc\Deactivate;

if(! class_exists('Afilimatial')){

    class Afilimatial {

        function register(){

            add_shortcode('cur_category',array($this,'current_category'));
        }

        function activate(){
            // Flush rewrite rules
            flush_rewrite_rules();
        }

        function deactivate(){
            // Flush rewrite rules
            flush_rewrite_rules();
        }

        function current_category(){

            global $wp;

            $link = home_url($wp->request);

            $pattern = "/\/([a-z]|-|[0-9])+\//i";

            $category = preg_match($pattern, $link, $matches);

            $category_cleaned = str_replace('/', '', $matches[0]);

            return $category_cleaned;
        }

    }

    $afilimart = new Afilimatial();

    $afilimart->register();

    // Activation hook
    register_activation_hook(__FILE__,array($afilimart,'activate'));

    // Deactivation hook
    register_activation_hook(__FILE__,array($afilimart,'deactivate'));
}
