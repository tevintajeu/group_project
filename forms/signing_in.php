<?php
require_once "../sql/dbconn.php";

$email = $_POST["email"];
$password = $_POST["password"];

// Prepare the SQL statement
$select_data = "SELECT * FROM user WHERE email_address = '$email'";

// Execute the query
$result = $conn->query($select_data);

if ($result->num_rows > 0) {
    // Fetch the row as an associative array
    $row = $result->fetch_assoc();

    // Verify the password
    if (password_verify($password, $row['password'])) {
        // Password is correct
        print "Login successful!\n";
    } else {
        // Password is incorrect
        print "Incorrect password\n";
    }
} else {
    // No matching email found
    echo "Email not found";
}
?>
