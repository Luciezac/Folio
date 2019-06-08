<?php

include 'database.php';

/**
 * Routing
 */

define('URL', 'http://localhost/lucie-port/');

$q = !empty($_GET['q']) ? $_GET['q'] : 'home';

$view = '404';

if ($q == 'home') {
    $view = 'home';
} else if ($q == 'about') {
    $view = 'about';
} else if ($q == 'projects') {
    $view = 'projects';
} 


include './views/pages/' . $view . '.php';
