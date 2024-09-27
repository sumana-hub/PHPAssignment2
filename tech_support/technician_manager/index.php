<?php 
require('../model/database.php');

// Fetch technicians from the database
$query = 'SELECT * FROM technicians';
$statement = $db->prepare($query);
$statement->execute();
$technicians = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
    <title>SportsPro Technical Support - Technician List</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
    <?php include("../view/header.php"); ?>
    <main>
        <h1>Technician List</h1>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>&nbsp;</th> <!-- Delete Button -->
            </tr>
            <?php foreach ($technicians as $tech) : ?>
            <tr>
                <td><?php echo htmlspecialchars($tech['firstName']); ?></td>
                <td><?php echo htmlspecialchars($tech['lastName']); ?></td>
                <td><?php echo htmlspecialchars($tech['email']); ?></td>
                <td><?php echo htmlspecialchars($tech['phone']); ?></td>
                <td><?php echo htmlspecialchars($tech['password']); ?></td>
                <td>
                    <form action="delete_technician.php" method="post">
                        <input type="hidden" name="technicianID" value="<?php echo $tech['techID']; ?>"> <!-- Updated to technicianID -->
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="add_technician_form.php">Add Technician</a></p>
    </main>
    <?php include("../view/footer.php"); ?>
</body>
</html>
