<?php
session_start(); // Start the session to access session variables
?>
<!DOCTYPE html>
<html>
<head>
    <title>Technician Manager - Confirmation</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <?php include("../view/header.php");  ?>
    <main>
        <h1>Technician Confirmation</h1> 
        <p> Thank you, <?php echo htmlspecialchars($_SESSION["name"]); ?>, for
            adding the technician's information. <!-- Display the name of the technician added -->
            We look forward to working with you.
        </p>
        <p><a href="index.php">Back to Home</a></p> 
    </main>
    <?php include("../view/footer.php");  ?>
</body>
</html>
