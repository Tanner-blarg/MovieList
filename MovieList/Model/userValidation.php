<?php

class userValidation {
    public static function confirm($firstName, $lastName, $email, $password) {
        $error_message = "";
        
        $first_Name = preg_match("/[A-Za-z][A-Za-z0-9]*$/", $firstName);
        $last_Name = preg_match("/[A-Za-z][A-Za-z0-9]*$/", $lastName);
        $password_upper = preg_match('/[A-Z]/', $password);
        $password_lower = preg_match('/[a-z]/', $password);
        $password_digit = preg_match('/[0-9]/', $password);
        $password_special = preg_match('/\W/', $password);
        $password_length = preg_match('/^\S{10,}$/', $password);
        
        if ($first_Name === 0) {
            $error_message = 'Error';
            $error_message_fname = 'First name must start with a letter.';
        }

        if ($last_Name === 0) {
            $error_message = 'Error';
            $error_message_lname = 'Last name must start with a letter.';
        }

        if ($password_length === 0) {
            $error_message = 'Error';
            $error_message_password = 'Password must be at least 10 characters long.';
        }

        if ($password_upper === 0) {
            $error_message = 'Error';
            $error_message_password = 'Password must have at least one uppercase letter';
        }

        if ($password_lower === 0) {
            $error_message = 'Error';
            $error_message_password = 'Password must have at least one lowercase letter';
        }

        if ($password_digit === 0) {
            $error_message = 'Error';
            $error_message_password = 'Password must have at least one digit';
        }

        if ($password_special === 0) {
            $error_message = 'Error';
            $error_message_password = 'Password must have at least one special character';
        }

        if ($email === false) {
            $error_message = 'Error';
            $error_message_email = 'Please enter an accurate email address.';
        }
        try{
            $user = moviesDB::getUserByEmail($email);
            $error_message = 'Error';
            $error_message_email = 'That email already exists.';       
        } catch (Exception $e){
        }
        
        if ($error_message != '') {
            include('View/register.php');
            return false;
        } else {
            return true;
        }  
    }
    
    public static function loginConfirmation($email, $password) {
        $error_message = "";
        if ($email === '') {
            $error_message = 'Error';
            $error_message_email = 'Please enter an email';
        } else {
            try {
            $success = moviesDB::getUserByEmail($email);
            
        } catch (Exception $e) {
            $error_message_email = 'Invalid Email';
            $error_message = 'Error';
        }

        }
        if ($password === '') {
            $error_message = 'Error';
            $error_message_password = 'Please enter a password';
        }
        if ($password != '' && isset($success))
           {          
            try {
                $db_password = moviesDB::getPassword($email);
            if (!password_verify($password, $db_password)) {
                $error_message = 'Error';
                $error_message_password = 'Invalid Password';
            }
        } catch (Exception $ex) {
            $error_message = $ex->getMessage();
            }
        } 

        if ($error_message != '') {
            include('View/login.php');
            return false;
        } else {
            return true;
        }
    }
}

