<?php
// Step 1: Get the form data that user submitted
$username = $_POST['username'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];

// Step 2: Connect to database
$conn = new mysqli("localhost", "root", "", "contacts");

// Step 3: Check if connection worked
if ($conn->connect_error) {
    die("Cannot connect to database!");
}

// Step 4: Save data to database
$sql = "INSERT INTO contact_form (username, email, feedback) VALUES ('$username', '$email', '$feedback')";

if ($conn->query($sql) === TRUE) {
    // Success - show thank you message
    echo "<h1>Thank You!</h1>";
    echo "<p>Your message has been sent, $username</p>";
    echo "<a href='../pages/contact.html'>Go Back</a>";
} else {
    // Failed - show error
    echo "Error: " . $conn->error;
}

// Step 5: Close database connection
$conn->close();
