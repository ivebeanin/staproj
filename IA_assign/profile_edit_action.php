<?php
session_start();
include('config.php');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Check if logged-in
if (!isset($_SESSION["UID"])) {
    header("location:profile.php");
}

// This block is called when the Submit button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $program = $_POST["program"];
    $mentor = $_POST["mentor"];
    $motto = $_POST["motto"];

    // Assuming 'userID' is the unique identifier for the user, modify it accordingly
    $userID = $_SESSION["UID"];

    // Output variables for debugging
    var_dump($username, $program, $mentor, $motto, $userID);

    // Update the user profile in the database
    $updateSql = "UPDATE profile SET username='$username', program='$program', mentor='$mentor', motto='$motto' WHERE userID='$userID'";

    // Output the update query for debugging
    echo "Update Query: $updateSql<br>";

    if (mysqli_query($conn, $updateSql)) {
        echo "Form data updated successfully!<br>";
        echo '<a href="profile.php">Back</a>';
    } else {
        echo "Error updating form data: " . mysqli_error($conn) . "<br>";
        echo '<a href="javascript:history.back()">Back</a>';
    }
}

// Close DB connection
mysqli_close($conn);
?>

