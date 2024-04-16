<?php
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

if (isset($_POST['confirm_delete'])) {
    $sql = "DELETE FROM Rio WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header('Location: admin.php');
    exit();
}

ob_end_flush();
?>

<body class="delete-html">
<div class="delete-container">
    <h2 class="welcoming-text4">Delete Item</h2>
    <div class="item-details">
        <p class="title-text"><strong>Title:</strong> <?php echo $item['Titel']; ?></p>
        <p class="desc-text"><strong>Description:</strong> <?php echo $item['Gerecht']; ?></p>
        <p class="prijs-text"><strong>Price:</strong> $<?php echo $item['Prijs']; ?></p>
    </div>
    <form action="" method="post">
        <button CLASS="delete-btn-confirm" type="submit" name="confirm_delete">ehm, Delete</button>
        <a class="delete-btn-cancel" href="admin.php">Cancel</a>
    </form>
</div>
</body>
</html>

<?php
$pdo = null;
?>
