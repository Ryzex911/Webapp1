<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

require_once("conction.php");
require_once "header.php";

if (!isset($_GET['id'])) {
    header('Location: admin.php');
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM Rio WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$item = $stmt->fetch();

if (!$item) {
    header('Location: admin.php');
    exit();
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "UPDATE Rio SET Titel = ?, Gerecht = ?, Prijs = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $description, $price, $id]);

    header('Location: admin.php');
    exit();
}
?>

    <body class="editdish-html">
    <div class="edit-container">
        <h2 class="welcoming-text3">Edit Item</h2>

        <form action="" method="post" class="editdish-form">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" value="<?php echo $item['Titel']; ?>"><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description"><?php echo $item['Gerecht']; ?></textarea><br>
            <label for="price">Price:</label><br>
            <input type="text" id="price" name="price" value="<?php echo $item['Prijs']; ?>"><br><br>
            <input type="submit" name="submit" value="Update">
        </form>
    </div>

    </body>


<?php
ob_end_flush();
