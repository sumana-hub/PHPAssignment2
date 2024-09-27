<?php
session_start(); // Start the session to access session variables
require_once('../model/database.php'); // Include the database connection file

// Getting data from the form
$firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING); // Sanitize first name input
$lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING); // Sanitize last name input
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); // Sanitize email input
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING); // Sanitize phone number input
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING); // Sanitize password input

// Validating the inputs
if ($firstName == null || $lastName == null || $email == null || $phone == null || $password == null) {
    $_SESSION['error'] = 'Invalid data. Please make sure all fields are filled.'; // Set error message if validation fails
    header("Location: ../errors/error.php"); // Redirect to error page
    die(); // Stop script execution
}

// Check if the email already exists
$queryCheck = "SELECT COUNT(*) FROM technicians WHERE email = :email"; // Query to check if the email exists
$statementCheck = $db->prepare($queryCheck); // Prepare the statement
$statementCheck->bindValue(':email', $email); // Bind the email to the query
$statementCheck->execute(); // Execute the query
$emailExists = $statementCheck->fetchColumn(); // Fetch the count of existing technicians with the same email
$statementCheck->closeCursor(); // Close the cursor

if ($emailExists) {
    $_SESSION['error'] = 'Email already exists. Please use a different email.'; // Set error message if email already exists
    header("Location: ../errors/error.php"); // Redirect to error page
    die(); // Stop script execution
}

// Adding data to the database
$query = "INSERT INTO technicians (firstName, lastName, email, phone, password) VALUES (:firstName, :lastName, :email, :phone, :password)"; // Query to insert new technician
$statement = $db->prepare($query); // Prepare the statement
$statement->bindValue(':firstName', $firstName); // Bind the first name to the query
$statement->bindValue(':lastName', $lastName); // Bind the last name to the query
$statement->bindValue(':email', $email); // Bind the email to the query
$statement->bindValue(':phone', $phone); // Bind the phone to the query
$statement->bindValue(':password', $password); // Bind the password to the query
$statement->execute(); // Execute the query
$statement->closeCursor(); // Close the cursor

// Confirmation message
$_SESSION['name'] = $firstName . ' ' . $lastName; // Set confirmation message in session
header("Location: confirmation.php"); // Redirect to confirmation page
die(); // Stop script execution
?>
