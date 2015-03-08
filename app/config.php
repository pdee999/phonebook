<?php

// server information
$servername = "localhost";
$username = "pdrittenhouse";
$password = "password";
$dbname = "phonebook";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>