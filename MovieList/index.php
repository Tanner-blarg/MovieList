<?php

require_once 'Model/database.php';
require_once 'Model/user.php';

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'home';
    }
}
//list of things needed in database
//movie database:
//Movie Title, Movie type, where to watch, when was made,
//user database
//idnum?, Name, email, password, admin{manual},


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
    case 'login':
        include 'View/login.php';
        break;
    case 'register':
        include 'View/register.php';
        break;
    case 'profile':
        include 'profile.php';
        break;
}