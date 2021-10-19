<?php
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'home';
    }
}



switch ($action) {
    case 'home':
        include 'View/home.php';
        break;
    case 'master':
        include 'View/masterList.php';
        break;
    case 'hate':
        include 'View/hateList.php';
        break;
    case 'watch':
        include 'View/watchlist.php';
        break;
    case 'wish':
        include 'View/wishlist.php';
        break;
}