<?php

// CHANGE THESE TO MATCH YOUR SETUP!
$db_host = "localhost"; // Keep this the same
$db_user = "sa19530"; // This is your essex username without @essex.ac.uk 
$db_pass = "E2qCnQExZp3Sc"; // This is your MySQL password which should have been emailed to you (not your Essex password)
$db_name = "ce154_" . $db_user; // This is the database name, created by appending "ce154_" to your username

// Function to connect to the database
function connect(){
	
	// Set the globals so we can access variables outside of the function
    global $db_host, $db_user, $db_pass, $db_name, $conn;
	
	// Create the database connection using MySQLi Procedural
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

	// Print out a message to say what happened
    if  (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
		//echo "Successfully connected to the MySQL database!<br/><br/>";
	}

    return $conn;
}

// Access PHPMyAdmin here: http://cseemyweb.essex.ac.uk/phpmyadmin to manually create tables and insert data

?>