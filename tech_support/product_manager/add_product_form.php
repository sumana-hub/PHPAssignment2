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
            <li><a href="../index.php">Home</a></li> 
        </ul>
    </nav>
</header>
<main>
    <!-- The form action points to the add_product.php script -->
    <br>
    <form action="add_product.php" method="post"> <!-- Form to add a new product -->
        <div id="data"> <!-- Container for form inputs -->
            <div class="labs"> <!-- Label and input for product code -->
                <label for="code">Product code:</label> <!-- Label for the product code input -->
                <input type="text" name="code" required> <!-- Input for product code; added required attribute -->
                <br><br>
            </div>

            <div class="labs"> <!-- Label and input for product name -->
                <label for="name">Product name:</label> <!-- Label for the product name input -->
                <input type="text" name="name" required> <!-- Input for product name; added required attribute -->
                <br><br>
            </div>

            <div class="labs"> <!-- Label and input for product version -->
                <label for="version">Product version:</label> <!-- Label for the product version input -->
                <input type="text" name="version" required> <!-- Input for product version; added required attribute -->
                <br><br>
            </div>

            <div class="labs" id="date"> <!-- Label and input for release date -->
                <label for="date">Release date:</label> <!-- Label for the release date input -->
                <input type="date" name="date" required> <!-- Input for release date; added required attribute -->
                <br><br>
            </div>

            <div class="labs">
                <input type="submit" value="Add"> <!-- Submit button to add the product -->
            </div>
            <br>
        </div>
    </form>
    <a href="index.php">View product list</a> <!-- Link to view the product list -->
</main>

<?php include '../view/footer.php'; ?> <!-- Include footer -->
</body>
</html>
