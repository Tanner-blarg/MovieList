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

        $query = 'INSERT INTO users (first_name, last_name, email, password)
              VALUES (:first_name, :last_name, :email, :passwords_hashed)';
        $statement = $db->prepare($query);        
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':passwords_hashed', $password);
        $statement->execute();
        $statement->closeCursor();
    }
    
     public static function getMovies()
    {
        $db = Database::getDB();
        
        $query = 'SELECT * FROM master';
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        
        $tempHold = array();
        foreach ($rows as $row){
        $movie = new movie (
                 $row['movie_num']
                ,$row['movie_title']
                ,$row['movie_type']
                ,$row['where_to_watch']
                ,$row['when_was_made'] );
                $tempHold[] = $movie;
        }
        return $tempHold;
    }
    
    public static function getPassword($email) {
        $db = Database::getDB();

        $query = 'SELECT password from user
                WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        
        return $row['password'];
    }
    
    public static function addMovie($movie_title, $movie_type, $where_to_watch, $when_was_made) {
        $db = Database::getDB();

        $query = 'INSERT INTO master (movie_title, movie_type, where_to_watch, when_was_made)
              VALUES (:movie_title, :movie_type, :where_to_watch, :when_was_made)';
        $statement = $db->prepare($query);        
        $statement->bindValue(':movie_title', $movie_title);
        $statement->bindValue(':movie_type', $movie_type);
        $statement->bindValue(':where_to_watch', $where_to_watch);
        $statement->bindValue(':when_was_made', $when_was_made);
        $statement->execute();
        $statement->closeCursor();
    }
    
}