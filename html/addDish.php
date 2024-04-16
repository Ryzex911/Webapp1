<?php
session_start();

if (!isset($_SESSION['username'])) {
    header( "Location: login.php");
}

require_once("conction.php");
require_once "header.php";

// Add item logic here
if (isset($_POST['add'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO Rio (`Titel`, Gerecht, Prijs) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $description, $price]);
}

?>

<!DOCTYPE html>
<html lang="en">
<body class="add-html">
<div class="add-container">
    <h2 class="welcoming-text2">What would you like to add?</h2>

    <a href="admin.php" class="back-btn">Back to Item List</a>


    <form method="post" action="">
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="description" placeholder="Description" required>
        <input type="text" name="price" placeholder="Price" required>
        <input type="submit" name="add" value="Add Item">
    </form>
</div>
</body>
</html>

<?php
$pdo = null;
?>
