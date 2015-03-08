<?php
// start session
session_start();

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

// store form values as session variable
if (isset($_POST['Submit'])) {
    $firstName = $_SESSION['firstName'] = $_POST['firstName'];
    $lastName = $_SESSION['lastName'] = $_POST['lastName'];
    $phone = $_SESSION['phoneNumber'] = $_POST['phoneNumber'];
}

// insert form values into sql table
$sql = "INSERT INTO `phonebook`.`contacts` (`firstname`, `lastname`, `phone`) VALUES ('$firstName', '$lastName', '$phone')";

if ($conn->query($sql) === TRUE) { ?>
    <script>alert("Your contact has been saved!");</script>
<?php
} else { ?>
    <script>alert(" . <?php echo "Error: " . "<p>" . $sql . "</p><p>" . $conn->error . "</p>"; ?> . ");</script>
<?php }

$conn->close();
?>