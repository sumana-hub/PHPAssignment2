<?php
session_start(); // Start the session to access session variables
require_once('../model/database.php'); // Include the database connection file

// Getting data from the form
$code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING); // Sanitize product code input
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING); // Sanitize product name input
$version = filter_input(INPUT_POST, 'version', FILTER_SANITIZE_STRING); // Sanitize product version input
$release = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING); // Sanitize release date input

// Validating the inputs
if ($code == null || $name == null || $version == null || $release == null) {
    $_SESSION['error'] = 'Invalid data. Please make sure all fields are filled.'; // Set error message if validation fails
    header("Location: ../errors/error.php"); // Redirect to error page
    die(); // Stop script execution
}

// Check if the product already exists
$queryCheck = "SELECT COUNT(*) FROM products WHERE productCode = :code"; // Query to check if the product code exists
$statementCheck = $db->prepare($queryCheck); // Prepare the statement
$statementCheck->bindValue(':code', $code); // Bind the product code to the query
$statementCheck->execute(); // Execute the query
$productExists = $statementCheck->fetchColumn(); // Fetch the count of existing products with the same code
$statementCheck->closeCursor(); // Close the cursor

if ($productExists) {
    $_SESSION['error'] = 'Product code already exists. Please use a different code.'; // Set error message if product code already exists
    header("Location: ../errors/error.php"); // Redirect to error page
    die(); // Stop script execution
}

// Adding data to the database
$query = "INSERT INTO products (productCode, name, version, releaseDate) VALUES (:code, :name, :version, :releaseDate)"; // Query to insert new product
$statement = $db->prepare($query); // Prepare the statement
$statement->bindValue(':code', $code); // Bind the product code to the query
$statement->bindValue(':name', $name); // Bind the product name to the query
$statement->bindValue(':version', $version); // Bind the product version to the query
$statement->bindValue(':releaseDate', $release); // Bind the release date to the query
$statement->execute(); // Execute the query
$statement->closeCursor(); // Close the cursor

// Confirmation message
$_SESSION['product'] = $name . ', version of (' . $version . ')'; // Set confirmation message in session
header("Location: confirmation.php"); // Redirect to confirmation page
die(); // Stop script execution
?>
