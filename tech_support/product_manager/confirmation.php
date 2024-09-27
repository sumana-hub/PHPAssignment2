<?php
session_start(); // Start the session to access session variables

// Retrieve the user's name and product details from session variables
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'User'; // Default to 'User' if not set
$product_name = isset($_SESSION['product']) ? $_SESSION['product'] : 'Product'; // Default to 'Product' if not set
?>

<!DOCTYPE html>
<html>
<head>
    <title>SportsPro Technical Support - Product Confirmation</title>
    <link rel="stylesheet" type="text/css" href="../main.css" /> 
</head>
<body>
    <?php include("../view/header.php"); ?> 
    <main>
      <h1>Product Confirmation</h1> 
      <p>Thank you, <?php echo htmlspecialchars($user_name); ?>, 
          for adding the product "<?php echo htmlspecialchars($product_name); ?>". 
          We look forward to working with your product.</p> <!-- Display a thank you message with user and product details -->
      <p><a href="index.php">View Product List</a></p> <!-- Link to view the product list -->
    </main>
    <?php include("../view/footer.php"); ?> 
</body>
</html>
