<?php

// store form values as variable
$pbID = $_POST['pb_Id'];

//include db configuration file
include_once("config.php");

// delete record
$del = "DELETE FROM `phonebook`.`contacts` WHERE `contacts`.`pb_Id` = $pbID";

// success/error alert
if ($conn->query($del) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

//close db connection
$conn->close();
?>