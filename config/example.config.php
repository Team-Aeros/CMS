<?php

const CONFIG = [
    'database' => [
        'dbname' => 'cms',
        'user' => 'root',
        'password' => 'root',
        'host' => 'localhost',
        'driver' => 'pdo_mysql',
    ],

    'site' => [
        'default_language' => 'en_US',
        'default_theme' => 'chrissy'
    ],

    'urls' => [
        'root' => 'http://localhost/CMS'
    ],

    'paths' => [
        'root' => '/your/server/CMS',
        'themes' => '/your/server/CMS/public/themes'
    ]
];