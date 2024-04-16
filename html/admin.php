<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

require_once("conction.php");
require_once "header.php";

$sql = "SELECT id, Titel, Gerecht, Prijs FROM Rio";
$stmt = $pdo->query($sql);
?>

<body class="admin-items">
<div class="items-container">
    <h2 class="welcoming-text">Welcome to the admin panel of Flaming burger</h2>

    <a href="logout.php" class="logout-btn">Logout</a>

    <h3>Items List</h3>
    <a href="addDish.php" class="add-btn">Add Item</a>

    <table class="items-table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php

        if ($stmt) {
            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>" . ($row['Titel']) . "</td>";
                echo "<td>" . ($row['Gerecht']) . "</td>";
                echo "<td>$" . $row['Prijs'] . "</td>";
                echo "<td><a href='EditDish.php?id=" . $row['id'] . "' class='edit-btn'>Edit</a></td>";
                echo "<td><a href='deleteDish.php?id=" . $row['id'] . "' class='delete-btn'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No items found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>

<?php

$pdo = null;
?>
