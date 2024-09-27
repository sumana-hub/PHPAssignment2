<?php
require('../model/database.php'); // Include the database connection file

// Get the technician ID from the POST request
$technicianID = filter_input(INPUT_POST, 'technicianID', FILTER_VALIDATE_INT); // Validate the technician ID

if ($technicianID == null || $technicianID == false) {
    echo "Invalid technician ID."; // Error message for invalid ID
    exit; // Stop script execution
}

// Delete the technician from the database
$query = "DELETE FROM technicians WHERE techID = :technicianID"; // Query to delete technician
$statement = $db->prepare($query); // Prepare the statement
$statement->bindValue(':technicianID', $technicianID); // Bind the technician ID to the query
$statement->execute(); // Execute the query
$statement->closeCursor(); // Close the cursor

// Redirect back to the technician list
header("Location: index.php"); // Redirect to technician list
exit; // Stop script execution
?>
