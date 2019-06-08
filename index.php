<?php

include 'database.php';

/**
 * Routing
 */

define('URL', 'http://localhost:8888/portfolio/');

$q = !empty($_GET['q']) ? $_GET['q'] : 'home';

$view = '404';

if ($q == 'home') {
    $view = 'home';
} else if ($q == 'about') {
    $view = 'about';
} else if ($q == 'projects') {
    $view = 'projects';
} else if ($q == 'communication') {
    $view = 'comm';
} else if ($q == 'concept') {
    $view = 'concept';
} else if ($q == 'contact') {
    $view = 'contact';
} else if ($q == 'design') {
    $view = 'design';
} else if ($q == 'developpement') {
    $view = 'dev';
} else if ($q == 'event') {
    $view = 'event';
} 




include './views/pages/' . $view . '.php';
