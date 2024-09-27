<!DOCTYPE html>
<html>
<head>
    <title>SportsPro Technical Support - Add Technician</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
    <?php include("../view/header.php"); ?>
    <main>
        <h1>Add Technician</h1><br>
        <form action="add_technician.php" method="post">
            <label>First Name:</label>
            <input type="text" name="firstName"><br><br> 

            <label>Last Name:</label>
            <input type="text" name="lastName"><br><br> 

            <label>Email:</label>
            <input type="email" name="email"><br><br>

            <label>Phone:</label>
            <input type="text" name="phone"><br><br>

            <label>Password:</label>
            <input type="password" name="password"><br><br>

            <input type="submit" value="Add Technician"> <br>
        </form>
        <br>
        <p><a href="index.php">View Technician List</a></p>
    </main>
    <?php include("../view/footer.php"); ?>
</body>
</html>
