<?php
// Include the database connection file
require('../model/database.php');

// Fetch products from the database
$queryProducts = 'SELECT * FROM products'; // SQL query to select all products
$statement = $db->prepare($queryProducts); // Prepare the SQL statement
$statement->execute(); // Execute the prepared statement
$products = $statement->fetchAll(); // Fetch all products as an associative array
$statement->closeCursor(); // Close the cursor to free up resources
?>

<!DOCTYPE html>
<html>
<head>
    <title>SportsPro Technical Support</title>
    <link rel="stylesheet" type="text/css" href="../main.css"> 
</head>

<body>
<header>
    <h1>SportsPro Technical Support</h1> 
    <p>Sports management software for the sports enthusiast</p> 
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li> <!-- Navigation link to Home -->
        </ul>
    </nav>
</header>
<main>
    <table>
      <tr>
        <th>Code</th> <!-- Table header for product code -->
        <th>Product Name</th> <!-- Table header for product name -->
        <th>Version</th> <!-- Table header for product version -->
        <th>Release Date</th> <!-- Table header for release date -->
        <th>&nbsp;</th> <!-- Empty header for delete button -->
      </tr>
        <!-- Loop through each product and display in table rows -->
        <?php foreach($products as $product): ?> 
         <tr>
          <td><?php echo $product['productCode']; ?></td> <!-- Display product code -->
          <td><?php echo $product['name']; ?></td> <!-- Display product name -->
          <td><?php echo $product['version']; ?></td> <!-- Display product version -->
          <td><?php echo date("Y-m-d", strtotime($product['releaseDate'])); ?></td> <!-- Format and display release date -->

          <td>
            <form action="delete_product.php" method="post"> <!-- Form for deleting a product -->
            <input type="hidden" name="code" value="<?php echo $product['productCode']; ?>"/>  <!-- Hidden input for product code -->
            <input type="submit" value="Delete"/> <!-- Submit button to delete product -->
            </form>
          </td>
         </tr>
        <?php endforeach; ?> 
    </table>
    <p class="option"><a href="add_product_form.php">Add product</a></p> <!-- Link to Add Product Form -->
</main>
    
<?php include '../view/footer.php'; ?> <!-- Include footer -->
</body>
</html>
