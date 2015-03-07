<?php
// start session
session_start();

// store form values as session variable
if (isset($_POST['Submit'])) {
    $firstName = $_SESSION['firstName'] = $_POST['firstName'];
    $lastName = $_SESSION['lastName'] = $_POST['lastName'];
    $phone = $_SESSION['phoneNumber'] = $_POST['phoneNumber'];
}

// variables for server information
$servername = "localhost";
$username = "pdrittenhouse";
$password = "password";
$dbname = "phonebook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// insert form values into sql table
$sql = "CREATE TABLE `phonebook`.`contacts` (
          pb_Id INT NOT NULL AUTO_INCREMENT,
          firstname TEXT NOT NULL,
          lastname TEXT,
          phone TEXT NOT NULL,
          PRIMARY KEY (pb_Id),
          UNIQUE (pb_Id)
          );

          INSERT INTO `phonebook`.`contacts` (`firstname`, `lastname`, `phone`) VALUES ('$firstName', '$lastName', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . "<p>" . $sql . "</p><p>" . $conn->error . "</p>";
}

$conn->close();
?>