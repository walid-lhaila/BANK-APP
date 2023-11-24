<?php

define('servername', 'localhost');
define('username', 'root');
define('password', '');
define('db_name', 'bank');

            //Creat Connection
        $cnx = mysqli_connect (servername, username, password);
        if(!$cnx){
            die("Could not connect : "  . mysqli_connect_error());
        }
        // echo "Connected successfully";

        // Create database
        $sql = "CREATE DATABASE IF NOT EXISTS " . db_name;
        if (mysqli_query($cnx, $sql)) {
            // echo "Database created successfully";
        } else {
            echo "Error creating database: " . mysqli_error($cnx);
        }
        
        $cnx = mysqli_connect(servername, username, password, db_name );
        // Close the connection
    
?>
