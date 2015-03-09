<?php

// store form values as variable
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$phone = $_POST['phone'];


//include db configuration file
include_once("config.php");

// insert form values into sql table
$sql = "INSERT INTO `phonebook`.`contacts` (`firstname`, `lastname`, `phone`) VALUES ('$firstName', '$lastName', '$phone')";

// success/error alert
if ($conn->query($sql) === TRUE) {
    echo "Your contact has been saved!";
} else {
    echo "Error: " . "<p>" . $sql . "</p><p>" . $conn->error . "</p>";
}

//close db connection
$conn->close();
?>