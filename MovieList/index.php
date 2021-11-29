<?php

require_once 'Model/database.php';
require_once 'Model/moviesDB.php';
require_once 'Model/user.php';
require_once 'Model/userValidation.php';
require_once 'Model/movie.php';

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'home';
    }
}

if (!isset($_SESSION['email'])) {
    $_SESSION['email'] = '';
}


switch ($action) {
    case 'home':
        $movies = moviesDB::getMovies();
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
        if(!isset($firstName)){
           $firstName = "";
        }
        if(!isset($middleName)){
           $middleName = "";
        }
        if(!isset($lastName)){
           $lastName = "";
        }
        if(!isset($suffix)){
           $suffix = "";
        }
        if(!isset($phoneNumber)){
           $phoneNumber = "";
        }
        if(!isset($dob)){
           $dob = "";
        }
        if(!isset($gender)){
           $gender = "";
        }       
        if(!isset($email)){
           $email = "";
        }
        if(!isset($password)){
           $password = "";
        }
        include 'View/register.php';
        break;
        
        case 'registerConfirm':
        $firstName = filter_input(INPUT_POST,'first_name');
        $lastName = filter_input(INPUT_POST,'last_name');
        $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST,'password');
        
        $isValid = userValidation::confirm($firstName, $lastName, $email, $password);
        
        if($isValid){
            $passwords_hashed = password_hash($password, PASSWORD_BCRYPT);
            $_SESSION['email'] = $email;
            try {
                moviesDB::addUser($firstName, $lastName, $email, $passwords_hashed);
                header('Location: index.php?action=profile');
            } catch (Exception $ex) {
                $error_message = 'Troubles connecting to the database.';
            }
        }
        include 'View/profile.php';
        break;
    case 'profile':
        include 'View/profile.php';
        break;
}