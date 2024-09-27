<?php
session_start();
$error_message = isset($_SESSION['error']) ? $_SESSION['error'] : 'An unknown error occurred.';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
    <style>
        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php include("../view/header.php"); ?>
    <main>
        <h1>Error</h1>
        <p class="error-message"><?php echo htmlspecialchars($error_message); ?></p> <br>
        <p><a href="../product_manager/add_product_form.php">Back to Add Product Form</a></p><br>
        <p><a href="../technician_manager/add_technician_form.php">Back to Add Technician Form</a></p><br>
    </main>
    <?php include("../view/footer.php"); ?>
</body>
</html>
