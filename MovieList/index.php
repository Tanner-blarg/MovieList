<?php

require_once 'Model/database.php';
require_once 'Model/moviesDB.php';
require_once 'Model/user.php';
require_once 'Model/userValidation.php';
require_once 'Model/movie.php';
require_once 'Model/validation.php';

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'register';
    }
}

if (!isset($_SESSION['email'])) {
    $_SESSION['email'] = '';
}


switch ($action) {
    case 'home':
        include 'View/home.php';
        break;
    case 'master':
        $movies = moviesDB::getMovies();
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
         if(!isset($email)){
           $email = "";
        }
        if(!isset($password)){
           $password = "";
        }
        include 'View/login.php';
        break;
    case 'register':
        if(!isset($firstName)){
           $firstName = "";
        }
        if(!isset($lastName)){
           $lastName = "";
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
                header('Location: index.php?action=home');
            } catch (Exception $ex) {
                $error_message = 'Troubles connecting to the database.';
            }
        }
        
    case 'login_submit':
        $email = filter_input(INPUT_POST, 'email_login');
        $password = filter_input(INPUT_POST, 'password_login');
        try {
            $is_valid = userValidation::loginConfirmation($email, $password);
        } catch (Exception $e){
        
        }
        if ($is_valid)
        {
            $_SESSION['email'] = $email;
            header('Location: index.php?action=home');
            exit();
        }
        break;
        
    case 'profile':
        include 'View/profile.php';
        break;
    case 'addMovie':
        include 'View/addMovie.php';
        break;
    case 'movieValidation':
        $move_title = filter_input(INPUT_POST,'move_title');
        $movie_type = filter_input(INPUT_POST,'movie_type');
        $where_to_watch = filter_input(INPUT_POST,'where_to_watch');
        $when_was_made = filter_input(INPUT_POST,'when_was_made');
        
        $isValid = validation::withinRange($min =1878, $max = 2021, $when_was_made);
        
        if($isValid){
            try {
                moviesDB::addMovie($move_title, $movie_type, $where_to_watch, $when_was_made);
                header('Location: index.php?action=masterList');
            } catch (Exception $ex) {
                $error_message = 'Troubles connecting to the database.';
            }
        }
        
        break;
}