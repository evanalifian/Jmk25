<?php
use Jmk25\Config\App;

if (!function_exists('base_url')) {
    function base_url($path = '') {
        return App::baseUrl($path);
    }
}