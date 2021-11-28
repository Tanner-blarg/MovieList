<?php

class moviesDB{
    
    public static function getUserByEmail($email) {
        $db = Database::getDB();

        $query = 'SELECT * from customers
                  WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
       
          $user = new user (
          $row['first_name'],
          $row['last_name'],
          $row['email'],
          $row['password']);
          
          return $user;      
    }
    
     public static function addUser($first_name, $last_name, $email, $password) {
        $db = Database::getDB();

        $query = 'INSERT INTO customers (first_name, last_name, email, password)
              VALUES (:first_name, :last_name, :email, :passwords_hashed)';
        $statement = $db->prepare($query);        
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':middle_name', $middle_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':suffix', $suffix);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':dob', $dob);
        $statement->bindValue(':gender', $gender);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':passwords_hashed', $password);
        $statement->execute();
        $statement->closeCursor();
    }
    
}