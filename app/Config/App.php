<?php

namespace Jmk25\Config;

class App
{
    const APP_NAME = 'JMK25';

    public static function baseUrl($path = '')
    {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        
        $host = $_SERVER['HTTP_HOST'];
        $root = ""; 

        if ($host == 'localhost' || $host == '127.0.0.1') {
            $baseUrl = "http://localhost:3000"; 
        } else {
            $baseUrl = $protocol . "://" . $host;
        }

        return $baseUrl . '/' . ltrim($path, '/');
    }
}