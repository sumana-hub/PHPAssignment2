<?php
require('../model/database.php'); // Include the database connection file

// Get the product code from the form input using filter_input for security
$productCode = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);

if ($productCode && !empty($productCode)) { // Check if the product code is valid and not empty
    // Prepare the SQL DELETE statement to remove the product by its code
    $query = "DELETE FROM products WHERE productCode = :code";
    $statement = $db->prepare($query); // Prepare the query using a PDO statement
    $statement->bindValue(':code', $productCode); // Bind the product code to the SQL query

    try {
        // Try executing the DELETE statement
        $statement->execute(); // Execute the query to delete the product
        $statement->closeCursor(); // Close the cursor after execution
        
        // Redirect to the product list page after successful deletion
        header("Location: index.php");
        exit;

    } catch (PDOException $e) { // Catch any PDO exception that occurs during execution
        // Display an error message if something goes wrong with the query
        echo "Error executing query: " . $e->getMessage();
        exit;
    }
} else {
    // Display an error if no product code was received or if it was invalid
    echo "Error: No product code received or code is invalid.";
    exit;
}
?>
